<?php $currentPage = 'questionnaires'; ?>
<?php 
    $questionnaire = $data['questionnaire'];
    $undergrad = $data['undergrad'];
    $counsellor = $data['counsellor'];
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | Questionnaires</title>
    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
            </div>

            <div class="grid-1">

                <div class="subgrid-1">
                        <p class="p-title" style="font-size: 40px;"><?php echo $questionnaire->questionnaire_name;?></p>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <div class="card-green-4">
                            <div>
                                <p class="p-regular-green" style="font-size: 30px;">Good Job!</p>
                                <p class="p-regular-green" style="font-size: 15px;">You just completed the <b><?php echo $questionnaire->questionnaire_name;?></b> questionnaire!</p>
                                <p class="p-regular-green" style="font-size: 15px; margin-bottom: 20px;">Based on your answers, below are some recommendations for Counsellors.</p>
                                <a href="<?php echo URLROOT;?>undergrad/questionnaires" style="text-decoration: none;"><button class="button-main">Back to questionnaires</button></a>
                            </div>
                        </div>
                    </div>
    
                    <p class="p-regular-green">Recommended Counsellors</p>
                    <div class="card-white-scroll" style="height: 300px;">
                        <?php foreach ($data['counsellor'] as $counsellor) : ?>
                            <?php if ($undergrad->faculty === $counsellor->faculty) : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-profile">
                                <div>
                                    <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                    <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo$counsellor->coun_type;?> Counsellor</p>
                                    <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo$counsellor->university. ' | '.$counsellor->faculty;?></p>
                                </div>
                                <div class="btn-container">
                                    <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $counsellor->coun_id;?>" style="text-decoration: none;"><button class="button-main">Message Request</button></a>
                                    <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">View Profile</button></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                
            </div>
        </section>
    </body>