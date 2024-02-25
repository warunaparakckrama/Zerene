<?php $currentPage = 'view_timeslotpc'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Timeslots </title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Timeslots</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div class="card-white">
                <p class="p-regular">Timeslots Available</p>
                <?php if (isset($data['timeslot']) && !empty($data['timeslot'])) : ?>
                    <?php
                    // Grouping timeslots by date
                    $groupedTimeslots = [];
                    foreach ($data['timeslot'] as $timeslot) {
                        $date = date('l', strtotime($timeslot->slot_date));
                        $formattedDate = date('Y-m-d', strtotime($timeslot->slot_date));
                        $start_time = date('h:ia', strtotime($timeslot->slot_start));
                        $end_time = date('h:ia', strtotime($timeslot->slot_finish));
                        $formattedTimeRange = "$start_time - $end_time";
                        $groupedTimeslots[$formattedDate][$date][] = [
                            'timeRange' => $formattedTimeRange,
                            'user' => isset($timeslot->created_by) ? $timeslot->created_by : 'Unknown', // Check if user_name exists
                            'reserved' => isset($timeslot->reserved_by) ? $timeslot->reserved_by : null, // Check if reserved_by exists
                            'id' => isset($timeslot->id) ? $timeslot->id : null, // Check if id exists
                        ];
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
                            foreach ($timeRanges as $timeSlot) {
                                $isReserved = !empty($timeSlot['reserved']);
                                $reserveButtonText = $isReserved ? 'Cancel Reservation' : 'Reserve';

                                // Check if 'id' property exists before accessing it
                                $timeslotId = isset($timeSlot['id']) ? $timeSlot['id'] : '';

                                echo " <button class='button-main' data-timeslot-id='{$timeslotId}' data-reserved='{$isReserved}'>
                        {$timeSlot['timeRange']} - {$timeSlot['user']}
                      </button>";
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
        </div>
    </section>
</body>

</html>