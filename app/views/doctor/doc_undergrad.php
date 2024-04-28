<?php
    $currentPage = 'doc_undergrad';
    $undergrad = $data['undergrad'];
    $counsellor = $data['counsellor'];
    $direct = $data['direct']; 
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>

    <body>
        <section class='sec-1'>
        <div>
        <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>

            <div class="grid-1">
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Undergraduates</p></div>
                </div>

                <div>
                    <p class="p-regular-green">Directed Undergraduates</p>
                    <div class="card-white-scroll" style="height: 500px;">
                        <?php foreach($data['direct'] as $direct) : ?>
                            <?php foreach($data['undergrad'] as $undergrad) : ?>
                                <?php foreach($data['counsellor'] as $counsellor) :?>
                                    <?php if($undergrad->user_id === $direct->ug_user_id && $counsellor->user_id === $direct->from_user_id) : ?>
                                        <div class="card-green">
                                            <img src="<?php echo IMG;?>ug-avatar1.svg" alt="profile pic" class="card-profile">
                                            <div>
                                                <a href="<?php echo URLROOT;?>doctor/doc_ug_profile/<?php echo $undergrad->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username;?></p></a>
                                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university.' '.$undergrad->faculty;?></p>
                                                <p class="p-regular-green" style="font-size: 15px;">Directed by:<?php echo ' '.$counsellor->first_name.' '.$counsellor->last_name;?></p>
                                            </div>
                                            <div class="btn-container">
                                                <a href="<?php echo URLROOT;?>doctor/doc_ug_profile/<?php echo $undergrad->user_id;?>" style="text-decoration: none;"><button class="button-main">View Profile</button></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

        </section>
    </body>
</html>