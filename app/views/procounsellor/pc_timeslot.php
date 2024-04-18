<?php 
    $currentPage = 'pc_timeslot'; 
    $timeslot = $data['timeslot'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name']; ?> | Timeslots</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Timeslots</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <p class="p-regular-green">Create Timeslot</p>
                <div class="card-white">
                    <div class="card-green">
                        <div>
                            <form action="<?php echo URLROOT; ?>Procounsellor/addTimeslots/<?php echo $_SESSION['user_id']; ?>" method="POST" id="timeslotForm">
                                <label for="slot_date">Date : </label>
                                <input type="date" id="" name="slot_date" class="date" value="">
                                <span class="error-message"><?php echo $data['slot_date_err']; ?></span>

                                <label for="slot_start">Start : </label>
                                <input type="time" id="" name="slot_start" class="time" value="">
                                <span class="error-message"><?php echo $data['slot_start_err']; ?></span>

                                <label for="slot_finish">Finish : </label>
                                <input type="time" id="" name="slot_finish" class="time" value="">
                                <span class="error-message"><?php echo $data['slot_finish_err']; ?></span>

                                <label for="slot_type">Type : </label>
                                <select name="slot_type" class="type">
                                    <option value="online">Online</option>
                                    <option value="physical">Physical</option>
                                </select>
                                <span class="error-message"><?php echo $data['slot_type_err']; ?></span>

                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Create</button>
                                    <button class="button-danger" type="button" onclick="cancelCreate()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-white">
                    <p class="p-regular">Created</p>
                    <?php if (isset($data['timeslot']) && !empty($data['timeslot'])) : ?>
                        <?php
                        // Grouping timeslots by date
                        $groupedTimeslots = [];
                        foreach ($data['timeslot'] as $timeslot) {
                            $slotid = $timeslot->slot_id;
                            $date = date('l', strtotime($timeslot->slot_date));
                            $formattedDate = date('Y-m-d', strtotime($timeslot->slot_date));
                            $start_time = date('h:ia', strtotime($timeslot->slot_start));
                            $end_time = date('h:ia', strtotime($timeslot->slot_finish));
                            $formattedTimeRange = "$start_time - $end_time";
                            $groupedTimeslots[$formattedDate][$date][$slotid][] = $formattedTimeRange;
                        }

                        // Displaying grouped timeslots
                        foreach ($groupedTimeslots as $formattedDate => $days) {
                            echo "<div class='card-green-2'>";
                            foreach ($days as $day => $slots) {
                                echo "<div>";
                                echo "<p class='p-regular-grey' style='font-size: 20px;'>$day</p>";
                                echo "<p class='p-regular-grey' style='font-size: 15px;'>$formattedDate</p>";
                                echo "</div>";
                                echo "<div class='btn-container-2'>";
                                foreach ($slots as $slotid => $timeRanges){

                                    foreach ($timeRanges as $timeRange) {
                                        echo '<a href="' . URLROOT . 'Procounsellor/pc_view_timeslot/' . $slotid . '" class="button-main no-underline">' . $timeRange . '</a>';
                                    }
                                }
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        ?>

                    <?php else : ?>
                        <p>No timeslots created yet.</p>
                    <?php endif; ?>
                </div>




                <div class="card-white">
                    <p class="p-regular">Reserved</p>
                    <div class="card-green-2">
                        <div>
                            <p class="p-regular-grey" style="font-size: 20px;">Monday</p>
                            <p class="p-regular-grey" style="font-size: 15px;">2024-01-29</p>
                        </div>
                        <div class="btn-container-2">
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function cancelCreate() {
            document.getElementById('timeslotForm').reset();
        }
    </script>

</body>