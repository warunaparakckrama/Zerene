<?php
    $undergrad = $data['undergrad'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name'];?> | Profile</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Profile</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <p class="p-regular-green">Account Details</p>
                <div class="card-white-profile">
                    <div class="subgrid-profile">
                        <div class="card-green-profile-1">
                            <p class="p-regular-green">General</p>
                            <div style="font-size: 15px;">
                                <div style="display: flex;"><p class="p-regular-grey">Username:&nbsp;</p><p class="p-regular-green"><?php echo $undergrad->username;?></p></div>
                                <div style="display: flex;"><p class="p-regular-grey">Email:&nbsp;</p><p class="p-regular-green"><?php echo $undergrad->email;?></p></div>
                                <div style="display: flex;"><p class="p-regular-grey">University:&nbsp;</p><p class="p-regular-green"><?php echo $undergrad->university;?></p></div>
                                <div style="display: flex;"><p class="p-regular-grey">Faculty:&nbsp;</p><p class="p-regular-green"><?php echo $undergrad->faculty;?></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script src="<?php echo JS;?>profile-picture.js"></script>
</body>