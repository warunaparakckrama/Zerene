<?php $currentPage = 'ac_undergrads';?>
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
                <div class="subgrid-3"></div>
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
    
                
            </div>

        </div>

    </section>
</body>
