<?php $currentPage = 'ac_timeslots'; ?>

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
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Timeslots</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Create New </p>
                    <div class="card-green-6">
                        <div>
                            <form action="<?php echo URLROOT;?>Academic/addTimeslots/<?php echo $user_id=$_SESSION['user_id'];?>" method="POST">
                                <label for="slot_date">Date : </label>
                                <input type="date" id="" name="slot_date" class="">
                                <label for="slot_start">Start : </label>
                                <input type="time" id="" name="slot_start" class="">
                                <label for="slot_finish">Finish : </label>
                                <input type="time" id="" name="slot_finish" class="">
                                <label for="slot_type">Type : </label>
                                <select name="slot_type" class="">
                                    <option value="online" <?php echo ($data['slot_type'] === 'online') ? 'selected' : ''; ?> >Online</option>
                                    <option value="physical" <?php echo ($data['slot_type'] === 'physical') ? 'selected' : ''; ?>>Physical</option>
                                </select>
                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Create</button>
                                    <button class="button-danger" type="reset" >Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- <div class="card-white">
                    <p class="p-regular">Created</p>
                    <?php foreach ($data['timeslot'] as $timeslot): ?>
                        <div class="card-green-2">
                            <div>
                                <p class="p-regular-grey" style="font-size: 20px;">Monday</p>
                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo $timeslot->slot_date?></p>
                            </div>
                            <div class="btn-container-2">
                                
                                <button class="button-main"><?php echo $timeslot->slot_time?></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> -->

                <div class="card-white">
                    <p class="p-regular">Created</p>
                    <?php
                    // Grouping timeslots by date
                    $groupedTimeslots = [];
                    foreach ($data['timeslot'] as $timeslot) {
                        $date = date('l', strtotime($timeslot->slot_date)); // Get the day name (e.g., Monday)
                        $formattedDate = date('Y-m-d', strtotime($timeslot->slot_date));
                        $start_time = date('h:ia', strtotime($timeslot->slot_start));
                        $end_time = date('h:ia', strtotime($timeslot->slot_finish));
                        $formattedTimeRange = "$start_time - $end_time";
                        // $time = date('h:ia', strtotime($timeslot->slot_time));
                        $groupedTimeslots[$formattedDate][$date][] = $formattedTimeRange;
                    }

                    // Displaying grouped timeslots
                    foreach ($groupedTimeslots as $formattedDate => $days) {
                        echo "<div class='card-green-2'>";
                        foreach ($days as $day => $timeRanges) {
                            echo "<div>";
                            echo "<p class='p-regular-grey' style='font-size: 20px;'>$day</p>";
                            echo "<p class='p-regular-grey' style='font-size: 15px;'>$formattedDate</p>";
                            echo "</div>";
                            echo "<div class='btn-container-2'>";
                            foreach ($timeRanges as $timeRange) {
                                echo "<button class='button-main'>$timeRange</button>";
                            }
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                    ?>
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
</body>