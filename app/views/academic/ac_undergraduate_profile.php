<?php $currentPage = 'undergraduate_profile';?>
<?php 
    $undergraduate = $data['undergraduate'];
    $id = $data['id'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | undergraduate_profile</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Undergraduate Profile</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Profile Details</p>
                    <div class="card-green-2">
                        
                            <div>
                                <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile picture" class="card-profile-2">
                            </div>
                            <div>
                                <p class="p-regular" style=" margin-bottom: -10px;"><?php echo $undergraduate->username;?></p>
                                <p class="p-regular" style="color: var(--zerene-grey);"><?php echo $undergraduate->university. ' | '.$undergraduate->faculty;?></p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px; margin-bottom: 5px;"><?php echo $undergraduate->email;?></p>
                                <div style="display: flex; flex-direction: row; gap: 10px;">
                                   
                                        
                                </div>
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
