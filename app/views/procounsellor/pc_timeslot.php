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
                    <p class="p-regular"><?php echo isset($data['edit_mode']) && $data['edit_mode'] ? 'Edit' : 'Create'; ?> Timeslot</p>
                    <div class="card-green-6">
                        <div>
                            <form action="<?php echo URLROOT; ?>Procounsellor/addOrUpdateTimeslot/<?php echo $_SESSION['user_id']; ?>" method="POST" id="timeslotForm">
                                <input type="hidden" name="edit_slot_id" value="<?php echo isset($data['edit_slot_id']) ? $data['edit_slot_id'] : ''; ?>">
                                <label for="slot_date">Date : </label>
                                <input type="date" id="" name="slot_date" class="" value="<?php echo isset($data['edit_timeslot']) ? $data['edit_timeslot']->slot_date : ''; ?>">
                                <label for="slot_start">Start : </label>
                                <input type="time" id="" name="slot_start" class="" value="<?php echo isset($data['edit_timeslot']) ? $data['edit_timeslot']->slot_start : ''; ?>">
                                <label for="slot_finish">Finish : </label>
                                <input type="time" id="" name="slot_finish" class="" value="<?php echo isset($data['edit_timeslot']) ? $data['edit_timeslot']->slot_finish : ''; ?>">
                                <label for="slot_type">Type : </label>
                                <select name="slot_type" class="">
                                    <option value="online" <?php echo (isset($data['edit_timeslot']) && $data['edit_timeslot']->slot_type === 'online') ? 'selected' : ''; ?>>Online</option>
                                    <option value="physical" <?php echo (isset($data['edit_timeslot']) && $data['edit_timeslot']->slot_type === 'physical') ? 'selected' : ''; ?>>Physical</option>
                                </select>

                                <div class="btn-container-2">
                                    <button class="button-main" type="submit"><?php echo isset($data['edit_mode']) && $data['edit_mode'] ? 'Update' : 'Create'; ?></button>
                                    <button class="button-danger" type="reset" onclick="toggleForm()">Cancel</button>
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
                                echo "<button class='button-main' style='background-color: #D3CDFF;' onclick='editTimeslot($timeslot->slot_id, \"$timeslot->slot_date\", \"$timeslot->slot_start\", \"$timeslot->slot_finish\", \"$timeslot->slot_type\")'>Edit</button>";
                                echo "<form action='" . URLROOT . "Procounsellor/deleteTimeslot/{$timeslot->slot_id}' method='POST'>";
                                echo "<button type='submit' class='button-danger' onclick='return confirm(\"Are you sure you want to delete this timeslot?\")'>Delete</button>";
                                echo "</form>";
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

    <script>
        function editTimeslot(slot_id, slot_date, slot_start, slot_finish, slot_type) {
            document.getElementById('edit_slot_id').value = slot_id;
            document.getElementById('slot_date').value = slot_date;
            document.getElementById('slot_start').value = slot_start;
            document.getElementById('slot_finish').value = slot_finish;
            document.getElementById('slot_type').value = slot_type;

            // Set edit mode to true
            document.getElementById('edit_mode').value = '1';
        }

        function toggleForm() {
            document.getElementById('timeslotForm').reset();
            document.getElementById('edit_mode').value = '0';
        }
    </script>

</body>