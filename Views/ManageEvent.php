<?php
include_once('./Libs/index.php');
include_once('./connectDB.php');
?>

<body>

    <div class="event-container">
        <h1 class="mn-title">Manage Event</h1>
        <hr class="orange-line">

        <!-- Search box -->
        <div class="table-function">
            <form action="./Process/event.php?function=searchEvent" class="search" method="POST">
                <div class="search-cover">
                    <input type="text" class="search-box" name="eventSearch" placeholder="Search Event" title="You can search by event title or location">
                </div>
                <input type="submit" class="btn-search" value="Search">
            </form>
            <input type="submit" class="btn-add-right js-add-event" value="Add New Event">
        </div>
        <!-- End Search box -->

        <!-- Begin Table -->
        <div class="main-table">
            <table class="table-admin">
                <tr class="table-head">
                    <th class="head-row">Title</th>
                    <th class="head-row">Date</th>
                    <th class="head-row">Time Start</th>
                    <th class="head-row">Time End</th>
                    <th class="head-row">Location</th>
                    <th class="head-row">Description</th>
                    <th class="head-row">Figure Event</th>
                    <th class="head-row">Score</th>
                </tr>

                <?php

                $sql = "SELECT * FROM event order by event_id desc";
                if (isset($_GET['func']) && $_GET['func'] == 'filter') {
                    $sql = $_GET['sql'];
                }
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                ?>
                    <tr class="table-body">
                        <td class="body-row"><a style="color: blue; font-weight: bold; text-decoration: none" href="?page=event&&eventId=<?php echo $row["event_id"]; ?>" class="choose-user js-update-event"><?php echo $row["event_title"]; ?></a></td>
                        <td class="body-row"><?php echo $row["date"]; ?></td>
                        <td class="body-row"><?php echo $row["time_start"]; ?></td>
                        <td class="body-row"><?php echo $row["time_end"]; ?></td>
                        <td class="body-row"><?php echo $row["location"]; ?></td>
                        <td class="body-row" style="width: 300px"><?php echo $row["description"]; ?></td>
                        <td class="body-row"><img class="imgevent" src="./Assets/Image/<?php echo $row["image"]; ?>" alt="event image"></td>
                        <td class="body-row"><?php echo $row["score"]; ?></td>
                    </tr>
                <?php
                }
                ?>
                <!-- <tr class="table-body">
                    <td class="body-row">None</td>
                    <td class="body-row">None</td>
                    <td class="body-row">None</td>
                    <td class="body-row">None</td>
                    <td class="body-row">None</td>
                    <td class="body-row">None</td>
                    <td class="body-row">None</td>
                    <td class="body-row">None</td>
                </tr> -->
            </table>
        </div>
        <!-- End Table -->

        <!-- Modal add event -->
        <div class="modal-add-container js-modal-add">
            <div class="modal-content js-modal-content-add">
                <div class="modal-head">
                    <h2 class="modal-label">Add New Event</h2>
                    <a class="modal-close js-modal-close-add-event">X</a>
                </div>
                <form action="./Process/event.php?function=addEvent" class="modal-body" id="eventadd" method="POST" enctype="multipart/form-data">
                    <div class="modal-input">
                        <input type="text" id="eventtitle" name="eventtitle" class="modal-input-box" placeholder="Title">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="date" id="eventdate" name="eventdate" class="modal-input-box" placeholder="Date" title="Date of the event">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="time" id="eventtimestart" name="eventtimestart" class="modal-input-box" placeholder="Time Start" title="Time start of the event">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="time" id="eventtimeend" name="eventtimeend" class="modal-input-box" placeholder="Time End" title="Time end of the event (estimated)">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="eventlocation" name="eventlocation" class="modal-input-box" placeholder="Location">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="eventdescription" name="eventdescription" class="modal-input-box" placeholder="Description">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="eventscore" name="eventscore" class="modal-input-box" placeholder="Score">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <!-- <input type="text" id="eventimage" class="modal-input-box" placeholder="Figure">
                        <span class="alert-error-modal-image"></span>
                        <input type="button" class="btn-choose-file" value="Choose File"> -->
                        <input type="file" name="eventimage" id="eventimage" class="btn-choose-file" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" class="btn-add-modal" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--End modal add event  -->

        <script>
            function open_eventUpdate_modal() {
                const UpdateEvents = document.querySelectorAll('.js-update-event') //sellect the class used to use js
                const modalclose = document.querySelector('.js-modal-close-update-event')
                const ModalContent = document.querySelector('.js-modal-content-update')
                const modal = document.querySelector('.js-modal')
                modal.classList.add('open')
            }
        </script>

        <!-- Start modal update and delete -->
        <div class="modal-container js-modal">
            <div class="modal-content js-modal-content-update">
                <div class="modal-head">
                    <h2 class="modal-label">Update Event</h2>
                    <a class="modal-close js-modal-close-update-event">X</a>
                </div>
                <form action="./Process/event.php?function=updateEvent" class="modal-body" id="eventupdate" enctype="multipart/form-data" method="POST">
                    <?php if (isset($_GET['eventId'])) {
                        echo '<script type="text/javascript">',
                        'open_eventUpdate_modal();',
                        '</script>';
                        $id = $_GET['eventId'];
                        $result = mysqli_query($conn, "SELECT * FROM event where event_id='$id'");
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    } ?>
                    <div class="modal-input">
                        <input type="hidden" id="eventID" name="eventID" value="<?php echo $row['event_id'] ?>">
                        <input type="text" id="updatetitle" name="updatetitle" class="modal-input-box" placeholder="Title" value="<?php echo $row['event_title'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="date" id="updatedate" name="updatedate" class="modal-input-box" placeholder="Date" title="Date of the event" value="<?php echo $row['date'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="time" id="updatetimestart" name="updatetimestart" class="modal-input-box" placeholder="Time Start" title="Time start of the event" value="<?php echo $row['time_start'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="time" id="updatetimeend" name="updatetimeend" class="modal-input-box" placeholder="Time End" title="Time end of the event (estimated)" value="<?php echo $row['time_end'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="updatelocation" name="updatelocation" class="modal-input-box" placeholder="Location" value="<?php echo $row['location'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="updatedescription" name="updatedescription" class="modal-input-box" placeholder="Description" value="<?php echo $row['description'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="updatescore" name="updatescore" class="modal-input-box" placeholder="Score" value="<?php echo $row['score'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>

                    <div class="modal-input">
                        <!-- <input type="text" class="modal-input-box" placeholder="Figure">
                        <input type="button" class="btn-choose-file" value="Choose File"> -->
                        <input type="file" name="updateimage" id="updateimage" class="btn-choose-file" accept="image/*" title="Choose an event image">
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" class="btn-update" value="Update">
                        </div>
                        <div class="btn-footer">
                            <!-- <input type="submit" class="btn-delete" value="Delete"> -->
                            <a style="text-align: center; text-decoration: none" class="btn-delete" href="./Process/event.php?function=deleteEvent&&id=<?php echo $row['event_id'] ?>" onclick="return confirm('Information related to this event will also be deleted. Are you sure to delete?')">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End modal -->
    </div>


    <!-- Script modal update -->
    <script src="./Assets/js/Validation.js"></script>
    <script src="./Assets/js/ModalManageEvent.js"></script>
    <script src="./Assets/js/ManageAdmin.js"></script>
    <!-- End Script modal update -->

</body>