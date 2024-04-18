<?php
    $currentPage = 'timeslots';
    $counsellor = $data['counsellor'];
    $undergrad = $data['undergrad']; 
    $doctor = $data['doctor'];
    $direct = $data['direct'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS; ?>main.css">
    <link rel="stylesheet" href="<?= CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?= IMG; ?>favicon.svg" type="image/x-icon">
    <title><?= SITENAME; ?> | Timeslots </title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Timeslots</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <p class="p-regular-green">Academic Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Academic' && $undergrad->faculty === $counsellor->faculty) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="<?php echo URLROOT;?>Undergrad/timeslots_view/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo$counsellor->university. ' | '.$counsellor->faculty;?></p>
                            </div>
                            <div class="btn-container">
                                <a href="<?php echo URLROOT;?>Undergrad/timeslots_view/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">View Timeslots</button></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Professional Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Professional' && $undergrad->university === $counsellor->university) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="<?php echo URLROOT;?>Undergrad/timeslots_view/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo $counsellor->university.' | '.$counsellor->faculty;?></p>
                            </div>
                            <div class="btn-container">
                                <a href="<?php echo URLROOT;?>Undergrad/timeslots_view/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">View Timeslots</button></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Psychiatrists</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['direct'] as $direct) : ?>
                        <?php foreach($data['doctor'] as $doctor) : ?>
                            <?php if ($direct->to_user_id == $doctor->user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-profile">
                                    <div>
                                        <a href="<?php echo URLROOT;?>Undergrad/timeslots_view/<?php echo $doctor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $doctor->first_name.' '.$doctor->last_name;?></p></a>
                                        <p class="p-regular-grey" style="font-size: 15px;">University in charge: <?php echo $doctor->uni_in_charge?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT;?>Undergrad/timeslots_view/<?php echo $doctor->user_id;?>" style="text-decoration: none;"><button class="button-main">View Timeslots</button></a>
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