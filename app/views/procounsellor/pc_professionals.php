<?php $currentPage = 'pc_professionals'; ?>
<?php $counsellor = $data['counsellor']; ?>
<?php $doctor = $data['doctor']; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Professionals</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Professionals</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <p class="p-regular-green">Professional Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Professional' && $counsellor->user_id !== $_SESSION['user_id']) : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG; ?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                                <div>
                                    <a href="" class="a-name"><p class="p-regular-green" style="margin-bottom: -5px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                    <p class="p-regular" style="color:var(--zerene-grey); font-size: 15px"><?php echo $counsellor->university.' '.$counsellor->faculty;?></p>
                                </div>
                                <div class="btn-container">
                                    <a href="<?php echo URLROOT;?>procounsellor/pc_chatroom/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">message</button></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Academic Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Academic') : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG; ?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                                <div>
                                    <a href="" class="a-name"><p class="p-regular-green" style="margin-bottom: -5px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                    <p class="p-regular" style="color:var(--zerene-grey); font-size: 15px"><?php echo $counsellor->university.' '.$counsellor->faculty;?></p>
                                </div>
                                <div class="btn-container">
                                <a href="<?php echo URLROOT;?>procounsellor/pc_chatroom/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">message</button></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Psychiatrists</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['doctor'] as $doctor) : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG; ?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                                <div>
                                    <a href="" class="a-name"><p class="p-regular-green" style="margin-bottom: -5px;"><?php echo $doctor->first_name.' '.$doctor->last_name;?></p></a>
                                    <p class="p-regular" style="color:var(--zerene-grey); font-size: 15px"><?php echo $doctor->hospital;?></p>
                                    <p class="p-regular" style="color:var(--zerene-grey); font-size: 15px">(University in Charge: <?php echo $doctor->uni_in_charge;?>)</p>
                                </div>
                                <div class="btn-container">
                                <a href="<?php echo URLROOT;?>procounsellor/pc_chatroom/<?php echo $doctor->user_id;?>" style="text-decoration: none;"><button class="button-main">message</button></a>
                                </div>
                            </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </section>


</body>