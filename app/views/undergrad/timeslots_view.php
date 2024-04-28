<?php 
    $currentPage = 'timeslots';
    $timeslot = $data['timeslot'];

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
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS; ?>main.css">
    <link rel="stylesheet" href="<?= CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?= IMG; ?>favicon.svg" type="image/x-icon">
    <title><?= SITENAME; ?> | Timeslots </title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Timeslots</p></div>
            </div>

            <div>
                <?php if (!empty($futureTimeslots)) {
                    echo "<p class='p-regular-green'>Upcoming Timeslots</p>";
                    echo "<div class='card-white-scroll-timeslot'>";
                        foreach ($futureTimeslots as $formattedDate => $data) {
                            $dayName = $data['day'];
                            // echo "<div>";
                                echo "<div class='card-green-timeslot'>";
                                    echo "<p class='p-regular-green' style='font-size: 15px;'>$dayName</p>";
                                    echo "<p class='p-regular-grey' style='font-size: 15px;'>$formattedDate</p>";
                                echo "</div>";
                            // echo "</div>";
                            
                            // echo "<div>";
                                echo "<div class='card-green-scroll-timeslot'>";
                                    echo "<div class='btn-container-2'>";
                                        // Sort timeslots by start time
                                        usort($data['timeslots'], 'sortTimeslotsByStartTime');
                                        foreach ($data['timeslots'] as $timeslot) {
                                            $start_time = date('h:ia', strtotime($timeslot->slot_start));
                                            $end_time = date('h:ia', strtotime($timeslot->slot_finish));
                                            $formattedTimeRange = "$start_time - $end_time";
                                            $slot_type = ucfirst($timeslot->slot_type);
                                            if ($timeslot->slot_status == 'reserved') {
                                                echo "<a href='". URLROOT. "Undergrad/cancelTimeslot/$timeslot->slot_id' style='text-decoration: none;'><button class='button-second-timeslot' onclick='confirmCancel(event)'>$formattedTimeRange<br>$slot_type</button></a>";
                                            } elseif ($timeslot->slot_status == 'pending') {
                                                echo "<button class='button-cancel-timeslot' disabled>$formattedTimeRange<br>(Unavaiable)</button>";
                                            } else {
                                                echo "<a href='". URLROOT ."Undergrad/reserveTimeslot/$timeslot->slot_id' style='text-decoration: none;'><button class='button-timeslot' onclick='confirmReserve(event)'>$formattedTimeRange<br>$slot_type</button></a>";
                                            }
                                        }
                                    echo "</div>";
                                echo "</div>";
                            // echo "</div>";
                        }
                    echo "</div>";
                    } else {
                        echo "<p class='p-regular-green'>No upcoming timeslots</p>";
                    }
                ?>

            </div>
        </div>
    </section>

    <script>
        function confirmReserve(event) {
            event.preventDefault(); // Prevent the default action of the link
            if (confirm("You're about to reserve the timelsot. Continue?")) {
                // If the user confirms the edit, proceed with the link action
                window.location.href = event.target.parentElement.href; // Redirect to the link URL
            } else {
                // If the user cancels, do nothing or handle as needed
            }
        }

        function confirmCancel(event){
            event.preventDefault(); // Prevent the default action of the link
            if (confirm("You're about to cancel the reservation. Continue?")) {
                // If the user confirms the edit, proceed with the link action
                window.location.href = event.target.parentElement.href; // Redirect to the link URL
            } else {
                // If the user cancels, do nothing or handle as needed
            }
        }
    </script>
</body>