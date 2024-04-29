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
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Create Timeslot</p>
                <div class="card-white">
                    <div class="card-green-7">
                        <form action="<?php echo URLROOT; ?>Procounsellor/addTimeslots/<?php echo $_SESSION['user_id']; ?>" method="POST" id="timeslotForm">
                            <label for="slot_date">Date : </label>
                            <input type="date" id="" name="slot_date" class="date" value="" required><br>

                            <label for="slot_start">Start : </label>
                            <input type="time" id="" name="slot_start" class="time" value="" required>

                            <label for="slot_finish">Finish : </label>
                            <input type="time" id="" name="slot_finish" class="time" value="" required><br>

                            <label for="slot_interval">Interval : </label>
                            <select name="slot_interval" class="interval">
                                <option value="30">30 minutes</option>
                                <option value="60">1 hour</option>
                            </select>

                            <label for="slot_type">Type : </label>
                            <select name="slot_type" class="type">
                                <option value="online">Online</option>
                                <option value="physical">Physical</option>
                            </select>

                            <div class="btn-container-2">
                                <button class="button-main" type="submit">Create</button>
                                <button class="button-danger" type="button" onclick="cancelCreate()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-white">
                    <p class="p-regular">Created Timeslots</p>
                    <?php if (isset($data['timeslot']) && !empty($data['timeslot'])) : ?>
                        <?php
                        // Grouping timeslots by date and separating them into two arrays: pastTimeslots and futureTimeslots
                        $pastTimeslots = [];
                        $futureTimeslots = [];
                        $today = date('Y-m-d');
                        foreach ($data['timeslot'] as $timeslot) {
                            $formattedDate = date('Y-m-d', strtotime($timeslot->slot_date));
                            $dayName = date('l', strtotime($timeslot->slot_date));
                            if ($formattedDate < $today) {
                                $pastTimeslots[$formattedDate]['day'] = $dayName;
                                $pastTimeslots[$formattedDate]['timeslots'][] = $timeslot;
                            } else {
                                $futureTimeslots[$formattedDate]['day'] = $dayName;
                                $futureTimeslots[$formattedDate]['timeslots'][] = $timeslot;
                            }
                        }

                        // Sort future timeslots by date in ascending order
                        ksort($futureTimeslots);

                        // Sort past timeslots by date in descending order
                        krsort($pastTimeslots);

                        // Function to sort timeslots by start time
                        function sortTimeslotsByStartTime($a, $b)
                        {
                            return strtotime($a->slot_start) - strtotime($b->slot_start);
                        }

                        // Displaying future timeslots
                        if (!empty($futureTimeslots)) {
                            echo "<div class='card-green-scroll' style='height: 300px'>";
                            echo "<p class='p-regular-green' style='font-size: 20px;'>Upcoming Timeslots</p>";
                            foreach ($futureTimeslots as $formattedDate => $data) {
                                $dayName = $data['day'];
                                echo "<div class='card-green-2'>";
                                echo "<div>";
                                echo "<p class='p-regular-grey' style='font-size: 20px;'>$dayName</p>";
                                echo "<p class='p-regular-grey' style='font-size: 18px;'>$formattedDate</p>";
                                echo "</div>";
                                echo "<div class='btn-container-2'>";
                                // Sort timeslots by start time
                                usort($data['timeslots'], 'sortTimeslotsByStartTime');
                                foreach ($data['timeslots'] as $timeslot) {
                                    $start_time = date('h:ia', strtotime($timeslot->slot_start));
                                    $end_time = date('h:ia', strtotime($timeslot->slot_finish));
                                    $formattedTimeRange = "$start_time - $end_time";
                                    $slot_type = ucfirst($timeslot->slot_type);
                                    if ($timeslot->slot_status === 'reserved') {
                                        echo '<a href="' . URLROOT . 'Procounsellor/pc_view_timeslot/' . $timeslot->slot_id . '" class="button-second no-underline">' . $formattedTimeRange . '<br>Reserved</a>';
                                    } elseif ($timeslot->slot_status === 'pending') {
                                        echo '<a href="' . URLROOT . 'Procounsellor/pc_view_timeslot/' . $timeslot->slot_id . '" class="button-second-timeslot no-underline">' . $formattedTimeRange . '<br>Requested to Cancel</a>';
                                    } else {
                                        echo '<a href="' . URLROOT . 'Procounsellor/pc_view_timeslot/' . $timeslot->slot_id . '" class="button-main no-underline">' . $formattedTimeRange . '<br>'. $slot_type. '</a>';
                                    }
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }

                        // Displaying past timeslots
                        if (!empty($pastTimeslots)) {
                            echo "<div class='card-green-scroll' style='height: 300px'>";
                            echo "<p class='p-regular-green' style='font-size: 20px;'>Old Timeslots</p>";
                            foreach ($pastTimeslots as $formattedDate => $data) {
                                $dayName = $data['day'];
                                echo "<div class='card-green-2'>";
                                echo "<div>";
                                echo "<p class='p-regular-grey' style='font-size: 20px;'>$dayName</p>";
                                echo "<p class='p-regular-grey' style='font-size: 18px;'>$formattedDate</p>";
                                echo "</div>";
                                echo "<div class='btn-container-2'>";
                                // Sort timeslots by start time
                                usort($data['timeslots'], 'sortTimeslotsByStartTime');
                                foreach ($data['timeslots'] as $timeslot) {
                                    $start_time = date('h:ia', strtotime($timeslot->slot_start));
                                    $end_time = date('h:ia', strtotime($timeslot->slot_finish));
                                    $formattedTimeRange = "$start_time - $end_time";
                                    if ($timeslot->slot_status === 'reserved') {
                                        echo '<a href="' . URLROOT . 'Procounsellor/pc_view_timeslot/' . $timeslot->slot_id . '" class="button-second no-underline">' . $formattedTimeRange . '<br>Reserved</a>';
                                    } elseif ($timeslot->slot_status === 'pending') {
                                        echo '<a href="' . URLROOT . 'Procounsellor/pc_view_timeslot/' . $timeslot->slot_id . '" class="button-second-timeslot no-underline">' . $formattedTimeRange . '<br>Ask to Cancel</a>';
                                    } else {
                                        echo '<a href="' . URLROOT . 'Procounsellor/pc_view_timeslot/' . $timeslot->slot_id . '" class="button-main no-underline">' . $formattedTimeRange . '</a>';
                                    }
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        ?>

                    <?php else : ?>
                        <p>No timeslots created yet.</p>
                    <?php endif; ?>
                </div>




                <!-- <div class="card-white">
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
                </div> -->
            </div>
        </div>
    </section>

    <script>
        function cancelCreate() {
            document.getElementById('timeslotForm').reset();
        }
    </script>

</body>