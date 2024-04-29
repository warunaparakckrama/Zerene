<?php
 $currentPage = 'pc_undergrad'; 
 $undergrad = $data['undergrad'];
 $counsellor = $data['counsellor'];
 $request = $data['request'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Undergraduates</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Undergraduates</p></div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Your Faculty</p>
                <div class="card-white-scroll" style="height: 300px;">
                    <?php foreach ($data['undergrad'] as $undergrad) : ?>
                        <?php if ($undergrad->faculty === $counsellor->faculty) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG; ?>ug.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="<?php echo URLROOT;?>Procounsellor/pc_ug_profile/<?php echo $undergrad->user_id;?>"class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username;?></p></a>
                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university.' '.$undergrad->faculty;?></p>
                            </div>
                            <div class="btn-container">
                                <a href="<?php echo URLROOT;?>Procounsellor/pc_ug_profile/<?php echo $undergrad->user_id;?>" style="text-decoration: none;"><button class="button-main">View Profile</button></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Other Faculties</p>
                <div class="card-white-scroll"  style="height: 300px;">
                    <?php foreach($data['request'] as $request) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad) : ?>
                            <?php if ($undergrad->faculty !== $counsellor->faculty && $undergrad->user_id == $request->from_user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>ug.svg" alt="profile pic" class="card-profile">
                                    <div>
                                        <a href="<?php echo URLROOT;?>Procounsellor/pc_ug_profile/<?php echo $undergrad->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username;?></p></a>
                                        <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university.' '.$undergrad->faculty;?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT;?>Procounsellor/pc_ug_profile/<?php echo $undergrad->user_id;?>" style="text-decoration: none;"><button class="button-main">View Profile</button></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

    </section>
</body>
