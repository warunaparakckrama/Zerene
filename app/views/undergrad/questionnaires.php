<?php $currentPage = 'questionnaires'; ?>
<?php
    $questionnaire = $data['questionnaire'];
    $response = $data['response'];
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
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Questionnaires</p></div>
                </div>

                <div>
                    <p class="p-regular-green">Available Questionnaires</p>
                    <div class="card-white-scroll" style="height: 215px;">
                        <?php foreach ($data['questionnaire'] as $questionnaire) : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG;?>quiz.svg" alt="quiz" class="">
                                <div>
                                    <a href="<?php echo URLROOT;?>undergrad/quiz_view/<?php echo $questionnaire->questionnaire_id?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $questionnaire->questionnaire_name?></p></a>
                                    <p class="p-regular-grey" style="font-size: 15px;">Questionnaire suits for <b><?php echo $questionnaire->questionnaire_type?> conditions</b></p>
                                </div>
                                <div class="btn-container">
                                    <a href="<?php echo URLROOT;?>undergrad/quiz_view/<?php echo $questionnaire->questionnaire_id?>" style="text-decoration: none;"><button class="button-main">Start Questionnaire</button></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
        
                    <p class="p-regular-green">Completed Questionnaires</p>
                    <div class="card-white-scroll" style="height: 215px;">
                        <?php foreach ($data['response'] as $response) : ?>
                            <?php foreach ($data['questionnaire'] as $questionnaire) : ?>
                                <?php if ($response->questionnaire_id === $questionnaire->questionnaire_id) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG;?>quiz.svg" alt="quiz" class="">
                                        <div>
                                            <a href="" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $questionnaire->questionnaire_name;?></p></a>
                                            <?php
                                                $dateTime = new DateTime($response->attempted_at);
                                                $formattedDateTime = $dateTime->format('jS M, y \a\t h:iA');
                                            ?>
                                            <p class="p-regular-grey" style="font-size: 15px;"><?php echo $formattedDateTime;?></p>
                                        </div>
                                        <div class="btn-container">
                                            <a href="<?php echo URLROOT;?>undergrad/answer_view/<?php echo $response->response_id;?>" style="text-decoration: none;"><button class="button-main">View Answers</button></a>
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