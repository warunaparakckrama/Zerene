<?php $currentPage = 'pc_timeslot'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name']; ?> | Timeslots</title>
</head>
<style>
    .no-underline {
        text-decoration: none;
    }
</style>
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
                <div class="card-white">
                    <p class="p-regular">Create New </p>
                    <div class="card-green-6">
                        <div>
                            <form action="<?php echo URLROOT; ?>Procounsellor/addTimeslots/<?php echo $user_id = $_SESSION['user_id']; ?>" method="POST">
                                <label for="slot_date">Date : </label>
                                <input type="date" id="" name="slot_date" class="">
                                <label for="slot_start">Start : </label>
                                <input type="time" id="" name="slot_start" class="">
                                <label for="slot_finish">Finish : </label>
                                <input type="time" id="" name="slot_finish" class="">
                                <label for="slot_type">Type : </label>
                                <select name="slot_type" class="">
                                    <option value="online" <?php echo ($data['slot_type'] === 'online') ? 'selected' : ''; ?>>Online</option>
                                    <option value="physical" <?php echo ($data['slot_type'] === 'physical') ? 'selected' : ''; ?>>Physical</option>
                                </select>
                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Create</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

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
                    } ?>

                    <?php foreach ($groupedTimeslots as $formattedDate => $days) : ?>
                        <div class='card-green-2'>
                            <?php foreach ($days as $day => $timeRanges) : ?>
                                <div>
                                    <p class='p-regular-grey' style='font-size: 20px;'><?php echo $day; ?></p>
                                    <p class='p-regular-grey' style='font-size: 15px;'><?php echo $formattedDate; ?></p>
                                </div>
                                <div class='btn-container-2'>
                                    <?php foreach ($timeRanges as $timeRange) : ?>
                                        <div class='btn-container-2'>
                                            <a href="<?php echo URLROOT; ?>Procounsellor/deleteTimeslots/<?php echo $timeslot->slot_id; ?>" class='button-danger no-underline' onclick="return confirm('Are you sure you want to delete this timeslot?')">Delete</a>
                                            <a href="<?php echo URLROOT; ?>Procounsellor/updateTimeslots/<?php echo $timeslot->slot_id; ?>" class='button-main no-underline'>Edit</a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>


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