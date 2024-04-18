<?php 
    $currentPage = 'timeslots';
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
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <p class="p-regular-green">Available Timeslots</p>
                <div class="card-white-scroll" style="height: 500px;">
                    <?php if (isset($data['timeslots']) && !empty($data['timeslots'])) : ?>
                        <?php
                        // Grouping timeslots by date
                        $groupedTimeslots = [];
                        foreach ($data['timeslots'] as $timeslot) {
                            $date = date('l', strtotime($timeslot['slot_date']));
                            $formattedDate = date('Y-m-d', strtotime($timeslot['slot_date']));
                            $start_time = date('h:ia', strtotime($timeslot['slot_start']));
                            $end_time = date('h:ia', strtotime($timeslot['slot_finish']));
    
                            // ... Rest of your existing code ...
                            $formattedTimeRange = "$start_time - $end_time";
                            $groupedTimeslots[$formattedDate][$date][] = [
                                'timeRange' => $formattedTimeRange,
                                'faculty' => isset($timeslot['faculty']) ? $timeslot['faculty'] : 'Unknown',
                                'creator' => isset($timeslot['counselor_name']) ? $timeslot['counselor_name'] : 'Unknown',
                                'id' => isset($timeslot['id']) ? $timeslot['id'] : null,
                            ];
                        }
    
                        // Displaying grouped timeslots
                        foreach ($groupedTimeslots as $formattedDate => $days) :
                        ?>
                            <div class='card-green-2'>
                                <?php foreach ($days as $day => $timeRanges) : ?>
                                    <div>
                                        <p class='p-regular-grey' style='font-size: 20px;'><?= $day ?></p>
                                        <p class='p-regular-grey' style='font-size: 15px;'><?= $formattedDate ?></p>
                                    </div>
                                    <div class='btn-container-2'>
                                        <?php foreach ($timeRanges as $timeSlot) :
                                            $timeslotId = isset($timeSlot['id']) ? $timeSlot['id'] : '';
                                        ?>
                                            <button class='button-third' data-timeslot-id='<?= $timeslotId ?>'>
                                                <?= "{$timeSlot['timeRange']} | Faculty: {$timeSlot['faculty']} | Creator: {$timeSlot['creator']}" ?>
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No timeslots created yet.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </section>
</body>