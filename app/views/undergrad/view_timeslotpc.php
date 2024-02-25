<?php $currentPage = 'view_timeslotpc'; ?>

<!DOCTYPE html>
<html lang="en">

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

                        // ... Rest of your existing code ...
                        $formattedTimeRange = "$start_time - $end_time";
                        $groupedTimeslots[$formattedDate][$date][] = [
                            'timeRange' => $formattedTimeRange,
                            'user' => isset($timeslot->created_by) ? $timeslot->created_by : 'Unknown',
                            'reserved' => isset($timeslot->reserved_by) ? $timeslot->reserved_by : null,
                            'id' => isset($timeslot->id) ? $timeslot->id : null,
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
                                        $isReserved = !empty($timeSlot['reserved']);
                                        $reserveButtonText = $isReserved ? 'Cancel Reservation' : 'Reserve';
                                        $timeslotId = isset($timeSlot['id']) ? $timeSlot['id'] : '';
                                    ?>
                                        <button class='button-third' data-timeslot-id='<?= $timeslotId ?>' data-reserved='<?= $isReserved ?>'>
                                            <?= "{$timeSlot['timeRange']}   |   {$timeSlot['user']}" ?>
                                        </button>
                                        <form  action='<?= URLROOT . "/undergrad/reserveTimeslot/{$timeslotId}" ?>' method='post'>
                                            <?php if ($isReserved) : ?>
                                                <p>Reserved by: <?= $timeSlot['user'] ?></p>
                                                <button type='submit' class='button-main' name='cancelReservation' value='1'>Cancel Reservation</button>
                                            <?php else : ?>
                                                <button type='submit' class='button-main' name='reserveTimeslot' value='1'>Reserve</button>
                                            <?php endif; ?>
                                        </form>
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
    </section>
</body>

</html>
