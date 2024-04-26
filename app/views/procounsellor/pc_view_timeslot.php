<?php $currentPage = 'pc_view_timeslot'; ?>

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
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">View Timeslot</p>
                </div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Timeslot Details</p>
                    <div class="card-green-7">
                        <div>
                            <p>Date: <?php echo $data['timeslot']->slot_date; ?></p>
                            <p>Start Time: <?php echo $data['timeslot']->slot_start; ?></p>
                            <p>Finish Time: <?php echo $data['timeslot']->slot_finish; ?></p>
                            <p>Type: <?php echo $data['timeslot']->slot_type; ?></p>
                            <div class="btn-container-2">
                                <form action="<?php echo URLROOT; ?>Procounsellor/deleteTimeslot/<?php echo $data['timeslot']->slot_id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete the timeslot?')">
                                    <button type="submit" class="button-danger no-underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-white">
                    <p class="p-regular">Edit Timeslot</p>
                    <div class="card-green-7">
                            <form action="<?php echo URLROOT; ?>Procounsellor/editTimeslot/<?php echo $data['timeslot']->slot_id; ?>" method="POST" id="timeslotForm">
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
                                        <button class="button-danger" type="button" onclick="cancelEdit()">Cancel Edit</button>
                                    </div>
                                    <div>
                                        <button class="button-main" type="button" onclick="goBack()">Back</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
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