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
                                <input type="date" id="" name="slot_date" class="dropbtn">
                                <label for="slot_time">Time : </label>
                                <input type="time" id="" name="slot_time" class="dropbtn">
                                <label for="slot_type">Type : </label>
                                <select name="slot_type" class="dropbtn">
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

                </div><br>
                <div class="card-white">
                    <p class="p-regular">Created</p>
                    <div class="card-green-2">
                        <div>
                            <p class="p-regular-grey" style="font-size: 20px;">Monday</p>
                            <p class="p-regular-grey" style="font-size: 15px;">2024-01-29</p>
                        </div>
                        <div class="btn-container-2">
                            <button class="button-main">2.00-2.30pm</button>
                            <button class="button-main">2.00-2.30pm</button>
                            <button class="button-main">2.00-2.30pm</button>
                            <button class="button-main">2.00-2.30pm</button>
                            <button class="button-main">2.00-2.30pm</button>
                            <button class="button-main">2.00-2.30pm</button>
                        </div>
                    </div>
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