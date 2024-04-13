<?php $currentPage = 'professionals';?>
<?php 
    $counsellor = $data['counsellor'];
    $doctor = $data['doctor'];
    $id = $data['id'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Professionals</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Professional Profile</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Profile Details</p>
                    <div class="card-green-2">
                        <?php if ($counsellor !== null && $id === $counsellor->user_id) : ?>
                            <div>
                                <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile picture" class="card-profile-2">
                            </div>
                            <div>
                                <p class="p-regular" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p>
                                <p class="p-regular" style="color: var(--zerene-grey);"><?php echo $counsellor->university. ' | '.$counsellor->faculty;?></p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px; margin-bottom: 5px;"><?php echo $counsellor->email;?></p>
                                <div style="display: flex; flex-direction: row; gap: 10px;">
                                    <button class="button-main">Message Request</button>
                                    <button class="button-main">Send a Request Letter</button>
                                </div>
                            </div>
                        <?php elseif ($doctor !== null && $id === $doctor->user_id) : ?>
                            <div>
                                <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile picture" class="card-profile-2">
                            </div>
                            <div>
                                <p class="p-regular" style=" margin-bottom: -10px;"><?php echo $doctor->first_name.' '.$doctor->last_name;?></p>
                                <p class="p-regular-grey" style="">Psychiatrist in charge on <?php echo $doctor->uni_in_charge?></p>
                                <p class="p-regular-grey" style="font-size: 15px; margin-bottom: 5px;"><?php echo $doctor->email;?> | <?php echo $doctor->contact_num;?></p>
                                <div style="display: flex; flex-direction: row; gap: 10px;">
                                    <button class="button-main">Message Request</button>
                                    <button class="button-main">Send a Request Letter</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
    
                <div class="card-white">
                    <p class="p-regular">Time Slots</p>
                    <div class="card-green-2">
                        <div>
                            <p class="p-regular-grey">Wednesday</p>
                            <p class="p-regular-grey" style="font-size: 15px;">3rd Jan. 2024</p>
                        </div>
                        <div class="btn-container-2">
                            <button class="button-second">1.20-1.50pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-main">2.40-3.10pm</button>
                            <button class="button-second">3.20-3.50pm</button>
                            <button class="button-main">4.00-4.30pm</button>
                            <button class="button-second">4.40-5.00pm</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</body>
