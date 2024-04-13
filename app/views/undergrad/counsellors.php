<!-- <!DOCTYPE html>
<html lang="en"> -->
<?php $currentPage = 'counsellors'; ?>
<?php $counsellor = $data['counsellor']; ?>
<?php $undergrad = $data['undergrad']; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Counsellors</title>
</head>
<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Counsellors</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>
            
            <div>
                <p class="p-regular-green">Academic Counsellors</p>
                <div class="card-white-scroll">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Academic' && $undergrad->faculty === $counsellor->faculty) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                <p class="p-regular" style="color: var(--zerene-grey);"><?php echo$counsellor->faculty;?></p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $counsellor->university;?></p>
                            </div>
                            <div class="btn-container">
                                <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $counsellor->coun_id;?>" style="text-decoration: none;"><button class="button-main">Request</button></a>
                                <button class="button-main">Timeslots</button>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                
                <p class="p-regular-green">Professional Counsellors</p>
                <div class="card-white-scroll">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Professional' && $undergrad->university === $counsellor->university) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                <p class="p-regular" style="color: var(--zerene-grey);"><?php echo$counsellor->faculty;?></p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $counsellor->university;?></p>
                            </div>
                            <div class="btn-container">
                                <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $counsellor->coun_id;?>" style="text-decoration: none;"><button class="button-main">Request</button></a>
                                <button class="button-main">Timeslots</button>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </section>
</body>
<!-- </html> -->