<?php 
$currentPage = 'ac_timeslots'; 
$timeslot = $data['timeslot'];
$reserve = $data ['reserve'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name']; ?> | View Timeslot</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <p class="p-title" style="font-size: 40px;">View Timeslot</p>
                <div><img src="<?php echo IMG; ?>counsellor-sb.svg" alt="ug avatar" width="30" height="30" style="float: inline-end;"></div>
            </div>

            <div>
            <?php if ($timeslot->slot_status === 'reserved' || $timeslot->slot_status === 'pending') : ?>
                <div class="card-white">
                    <p class="p-regular-green">Reserve Details</p>
                    <div class="card-green-7">
                        <div>
                            <p class="p-regular-green" style="font-size: 15px;">Date: <?php echo $data['timeslot']->slot_date; ?></p>
                            <p class="p-regular-green" style="font-size: 15px;">Reserved Timeslot: <?php echo $data['timeslot']->slot_start; ?> - <?php echo $data['timeslot']->slot_finish; ?></p>
                            <p class="p-regular-green" style="font-size: 15px;">Reserved By: <?php echo $data['reserve']->ug_user_id; ?></p>
                            <p class="p-regular-green" style="font-size: 15px;">Type: <?php echo $data['timeslot']->slot_type; ?></p><br>
                           <div class="btn-container-2">
                           <?php if ($data['timeslot']->slot_status == 'pending') : ?>                 
                                        <p><?php echo $data['reserve']->ug_user_id; ?> User has requested to cancel the reservation:</p>
                                        <a href="<?php echo URLROOT; ?>Academic/changeSlotStatus/<?php echo $data['reserve']->slot_id; ?>" style="text-decoration: none;">
                                            <button class="button-main">Allow</button>
                                        </a>
                                    <?php elseif ($data['timeslot']->slot_status == 'reserved') : ?>
                                        <!-- No button rendering needed for reserved status -->
                                    <?php else : ?>
                                        <button class="button-second" disabled>Allowed</button>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <p class="p-regular-green">Timeslot Details</p>
                <div class="card-white">
                    <div class="card-green-7">
                        <div>

                            <p class="p-regular-green" style="font-size: 15px;">Date: <?php echo $data['timeslot']->slot_date; ?></p>
                                <p class="p-regular-green" style="font-size: 15px;">Start Time: <?php echo $data['timeslot']->slot_start; ?></p>
                                <p class="p-regular-green" style="font-size: 15px;">Finish Time: <?php echo $data['timeslot']->slot_finish; ?></p>
                                <p class="p-regular-green" style="font-size: 15px; margin-bottom: 10px;">Type: <?php echo $data['timeslot']->slot_type; ?></p>
                                <div class="btn-container-2">
                                    <form action="<?php echo URLROOT; ?>Academic/deleteTimeslot/<?php echo $data['timeslot']->slot_id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete the timeslot?')">
                                        <button type="submit" class="button-danger no-underline">Delete</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
                <p class="p-regular-green">Edit Timeslot</p>
                <div class="card-white">
                        <div class="card-green-7">
                            <form action="<?php echo URLROOT; ?>Academic/editTimeslot/<?php echo $data['timeslot']->slot_id; ?>" method="POST" id="timeslotForm">
                                <label for="slot_date">Date : </label>
                                <input type="date" id="slot_date" name="slot_date" class="date" value="<?php echo $data['timeslot']->slot_date; ?>" required>

                                <label for="slot_start">Start : </label>
                                <input type="time" id="slot_start" name="slot_start" class="time" value="<?php echo $data['timeslot']->slot_start; ?>" required>

                                <label for="slot_finish">Finish : </label>
                                <input type="time" id="slot_finish" name="slot_finish" class="time" value="<?php echo $data['timeslot']->slot_finish; ?>" required>

                                <label for="slot_type">Type : </label>
                                <select name="slot_type" id="slot_type" class="type">
                                    <option value="online" <?php echo ($data['timeslot']->slot_type === 'online') ? 'selected' : ''; ?>>Online</option>
                                    <option value="physical" <?php echo ($data['timeslot']->slot_type === 'physical') ? 'selected' : ''; ?>>Physical</option>
                                </select>

                                <div class="btn-container-4">
                                    <div class="btn-container-2">
                                        <button class="button-main" type="submit">Update</button>
                                        <button class="button-danger" type="button" onclick="cancelEdit()">Cancel</button>
                                    </div>
                                    <div class="btn-container">
                                        <button class="button-main" type="button" onclick="goBack()">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script>
        function cancelEdit() {
            document.getElementById('timeslotForm').reset();
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>