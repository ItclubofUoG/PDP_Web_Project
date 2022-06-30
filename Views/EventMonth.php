<?php
include_once('./Libs/index.php');
include_once('./connectDB.php');
?>


<body>
    <div class="et-container">
        <h2 class="et-title">Monthly Events</h2>
        <div class="et-block">

            <?php if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $eventSQL = "SELECT * FROM event where event_id = $id";
                $eventResult = mysqli_query($conn, $eventSQL);
                $row = mysqli_fetch_array($eventResult, MYSQLI_ASSOC);
            ?>
                <!-- Description detail popup information of the event -->
                <div id="et-des-container">
                    <div id="et-des-block">
                        <div class="et-des-head">
                            <h3 class="et-des-title">Description</h3>
                            <i class="fa-solid fa-xmark" id="et-close"></i>
                        </div>
                        <div class="et-des-body">
                            <p class="et-des-info" style="text-align: justify;">
                                <?php echo $row['description'] ?>

                                <!-- Event description by GET id from link data -->
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <script>
                function open_modal() {
                    $("#et-des-container").css("opacity", "1");
                    $("#et-des-container").css("pointer-events", "all");
                    $("#et-des-container").css("transition", "0.3s");
                    $("#et-des-block").css("top", "50px");
                    $("#et-des-block").css("transition", "all 0.3s ease-in-out");
                }
            </script>
            <?php
            if (isset($_GET['id'])) {
                echo '<script type="text/javascript">',
                'open_modal();',
                '</script>';
            }
            $sql = "SELECT * FROM `event` WHERE event_id>0 order by event_id desc";
            $result = mysqli_query($conn, $sql);
            $no = 1;
            while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {

            ?>

                <!-- The Backend need to using a variable to count the numerical order: example: n=1-->

                <!-- If this number is n%2 != 0, that show the piece has the figure LEFT below. 
                
                 If this number is n%2 == 0, that show the piece has the figure RIGHT below.    -->

                <?php if ($no % 2 != 0) { ?>

                    <!-- The event piece has picture left -->
                    <div class="et-piece">
                        <img src="./Assets/Image/<?php echo $row['image'] ?>" alt="450x300" class="et-figure p1">
                        <div class="et-piece-info p2">
                            <div class="et-detail">Title: <b><?php echo $row['event_title'] ?></b></div>
                            <div class="et-detail">Date: <b><?php echo date('d-m-Y', strtotime($row['date'])) ?></b></div>
                            <div class="et-detail">Time: <b><?php echo $row['time_start'] ?></b></div>
                            <div class="et-detail">Location: <b><?php echo $row['location'] ?></b></div>
                            <div class="et-detail">Score: <b><?php echo $row['score'] ?></b></div>
                            <div class="et-detail">Description: <b><?php echo 'Event description there...' ?></b></div>

                            <!-- The Button GET $id on the link href to show description in the popup description of each event -->
                            <a class="et-more-info" href="?page=home&&id=<?php echo $row['event_id'] ?>">Show more</a>
                            <!-- <div class="et-detail">Score: <b><?php echo $row['score'] ?></b></div> -->
                        </div>
                    </div>
                <?php } else { ?>

                    <!-- The event piece has picture right -->
                    <div class="et-piece">
                        <img src="./Assets/Image/<?php echo $row['image'] ?>" alt="450x300" class="et-figure p3">
                        <div class="et-piece-info p4">
                            <div class="et-detail">Title: <b><?php echo $row['event_title'] ?></b></div>
                            <div class="et-detail">Date: <b><?php echo date('d-m-Y', strtotime($row['date'])) ?></b></div>
                            <div class="et-detail">Time: <b><?php echo $row['time_start'] ?></b></div>
                            <div class="et-detail">Location: <b><?php echo $row['location'] ?></b></div>
                            <div class="et-detail">Score: <b><?php echo $row['score'] ?></b></div>
                            <div class="et-detail">Description: <b><?php echo 'Event description there...' ?></b></div>

                            <!-- The Button GET $id on the link href to show description in the popup description of each event -->
                            <a class="et-more-info" href="?page=home&&id=<?php echo $row['event_id'] ?>">Show more</a>
                            <!-- <div class="et-detail">Score: <b><?php echo $row['score'] ?></b></div> -->
                        </div>
                    </div>
            <?php }
                $no++;
            } ?>

        </div>
    </div>
</body>
<script src="./Assets/js/MonthlyEvent.js"></script>