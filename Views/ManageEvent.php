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
            <form action="" class="search" method="POST">
                <div class="search-cover">
                    <input type="text" class="search-box" name="eventSearch" placeholder="Search Event" title="You can search by event title or location">
                </div>
                <input type="submit" class="btn-search" name="searching" value="Search">
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
                    <th class="head-row">Score Plus</th>
                </tr>

                <?php

                if (isset($_POST['searching'])) {
                    $search = $_POST['eventSearch'];
                    $result = mysqli_query($conn, "select count(event_id) as total from event where event_title LIKE '%$search%' AND event_id>0");
                } else {
                    //find the total records
                    $result = mysqli_query($conn, 'select count(event_id) as total from event where event_id>0');
                }
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                //find limit and current page
                $current_page = isset($_GET['pages']) ? $_GET['pages'] : 1;
                $limit = 4;  // set the limit of line in page
                //calculate total page and start page
                $total_page = ceil($total_records / $limit);
                //limit the page from 1 to end
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }

                //find start page
                $start = ($current_page - 1) * $limit;
                $sql = "SELECT * FROM event WHERE event_id>0 order by event_id desc LIMIT $start, $limit";

                //search
                if (isset($_POST['searching'])) {
                    $search = $_POST['eventSearch'];
                    $sql = "SELECT * FROM event WHERE event_title LIKE '%$search%' order by event_id desc LIMIT $start, $limit";
                }
                // filter
                if (isset($_GET['func']) && $_GET['func'] == 'filter') {
                    $sql = $_GET['sql'] . " LIMIT $start, $limit";
                }


                $res_event = mysqli_query($conn, "SELECT * FROM event WHERE event_id>0");
                if (mysqli_num_rows($res_event) > 0) {
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                ?>
                        <tr class="table-body">
                            <td class="body-row"><a style="color: blue; font-weight: bold; text-decoration: none" href="?page=event&&eventId=<?php echo $row["event_id"]; ?>" class="choose-user js-update-event"><?php echo $row["event_title"]; ?></a></td>
                            <td class="body-row"><?php echo $row["date"]; ?></td>
                            <td class="body-row"><?php echo $row["time_start"]; ?></td>
                            <td class="body-row"><?php echo $row["time_end"]; ?></td>
                            <td class="body-row"><?php echo $row["location"]; ?></td>
                            <td class="body-row row-lock-tb" style="width: 300px"><?php echo 'Event description there...'; ?>
                                <a class="btn-update-des-ad" href="admin.php?page=description&&id=<?php echo $row["event_id"]; ?>">Update</a>
                            </td>
                            <td class="body-row"><img class="imgevent" src="./Assets/Image/<?php echo $row["image"]; ?>" alt="event image"></td>
                            <td class="body-row"><?php echo $row["score"]; ?></td>
                            <td class="body-row"><?php echo $row["scorePlus"]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                <?php } ?>

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
                    <!-- <div class="modal-input-des">
                        <textarea required cols="30" rows="10" type="text" id="eventdescription" name="eventdescription" class="modal-input-box-des" placeholder="Description"></textarea>
                        <span class="alert-error-modal"></span>
                    </div> -->
                    <div class="modal-input">
                        <input type="number" min="0" max="100" id="eventscore" name="eventscore" class="modal-input-box" placeholder="Score">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="number" min="0" max="100" id="eventscoreplus" name="eventscoreplus" class="modal-input-box" placeholder="Score Plus">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <!-- <input type="text" id="eventimage" class="modal-input-box" placeholder="Figure">
                        <span class="alert-error-modal-image"></span>
                        <input type="button" class="btn-choose-file" value="Choose File"> -->
                        <input type="file" name="eventimage" onchange="CheckSizeImage('#eventimage', '#eventadd','.alert-error-modal', '.modal-input', 'Invalid Image (Size 940*400)', '.alert-error-modal')" id="eventimage" class="btn-choose-file" accept="image/*" required>
                        <span class="alert-error-modal"></span>
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
        <!-- trung commint  -->

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
                <form action="./Process/event.php?function=updateEvent" class="modal-body" id="eventupdate" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
                    <?php
                    if (isset($_GET['eventId'])) {
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
                    <!-- <div class="modal-input-des">
                        <textarea required cols="30" onblur="CheckRequired('#updatedescription', '#eventupdate','.alert-error-modal', '.modal-input-des', 'This feild can not be empty', '.alert-error-modal')" rows="10" type="text" id="updatedescription" name="updatedescription" class="modal-input-box-des" placeholder="Description"> <?php echo $row['description'] ?></textarea>
                        <span class="alert-error-modal"></span>
                    </div> -->
                    <div class="modal-input">
                        <input type="number" min="0" max="100" id="updatescore" min="0" max="1000" name="updatescore" class="modal-input-box" placeholder="Score" value="<?php echo $row['score'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="number" min="0" max="100" id="updatescoreplus" min="0" max="1000" name="updatescoreplus" class="modal-input-box" placeholder="Score Plus" value="<?php echo $row['scorePlus'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">

                        <input src="./Assets/image/<?php echo $row['image'] ?>" width="500" height="600" type="file" name="updateimage" value="<?php echo $row['image'] ?>" onchange="CheckSizeImage('#updateimage', '#eventupdate','.alert-error-modal', '.modal-input', 'Invalid Image (Size 940*400)', '.alert-error-modal')" id="updateimage" class="btn-choose-file" accept="image/*" title="Choose an event image">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" class="btn-update" value="Update">
                        </div>
                        <div class="btn-footer">
                            <!-- <input type="submit" class="btn-delete" value="Delete"> -->
                            <a style="text-align: center; text-decoration: none; font-size: 14px;" class="btn-delete" href="./Process/event.php?function=deleteEvent&&id=<?php echo $row['event_id'] ?>" onclick="return confirm('Information related to this event will also be deleted. Are you sure to delete?')">Delete</a>
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
    <script src="./Assets/js/validator.js"></script>
    <!-- End Script modal update -->

    <!-- pagination page started here -->
    <div class="pag-outline">
        <div class="pag-block">
            <!-- display prev when not stay in page 1 -->
            <?php if ($current_page > 1 && $total_page > 1) {
                echo '   <a href="admin.php?page=event&&pages=' . ($current_page - 1) . '">Prev |</a>';
            } ?>
            <div class="pag-item">
                <?php
                //loop the between 
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $current_page) {
                        echo '<span class="pag-number" style="border: 2px solid blue; background-color:#ccc;">' . $i . '</span> | ';
                    } else {
                        echo '<a class="pag-hplink" href="admin.php?page=event&&pages=' . $i . '"><div class="pag-number">' . $i . '</div></a> |';
                    }
                }
                ?>
            </div>
            <?php
            //display btn next when it not be the end page
            if ($current_page < $total_page && $total_page > 1) {
                echo '<a href="admin.php?page=event&&pages=' . ($current_page + 1) . '">Next</a>';
            } ?>
        </div>
    </div>
</body>