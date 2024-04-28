<?php
    $currentPage = 'doc_questionnaires';
    $doctor = $data['doctor'];
    $undergrad = $data['undergrad'];
    $questionnaire = $data['questionnaire'];
    $response = $data['response'];
    $direct = $data['direct'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Questionnaires</title>
</head>

<body>
    <section class='sec-1'>
        <div>
            <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>
        <div class="grid-1">

            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Questionnaires</p> </div>
            </div>

            <div>
                <p class="p-regular-green">Recently Submitted</p>
                <div class="card-white-scroll" style="height: 500px;">
                    <?php foreach($data['direct'] as $direct) :?>
                        <?php foreach($data['response'] as $response) :?>
                            <?php foreach($data['undergrad'] as $undergrad) :?>
                                <?php foreach($data['questionnaire'] as $questionnaire) :?>
                                    <?php if($direct->ug_user_id == $response->user_id && $response->user_id == $undergrad->user_id && $response->questionnaire_id == $questionnaire->questionnaire_id) :?>
                                        <div class="card-green">
                                            <img src="<?php echo IMG; ?>ug.svg" alt="profile pic" class="card-profile">
                                            <div>
                                                <a href="<?php echo URLROOT;?>Doctor/doc_quiz_review/<?php echo $response->response_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username;?></p></a>
                                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university.' '.$undergrad->faculty;?></p>
                                                <?php $dateTime = new DateTime($response->attempted_at); $formattedDateTime = $dateTime->format('jS M, y \a\t h:iA');?>
                                                <p class="p-regular-green" style="font-size: 15px;"><?php echo $questionnaire->questionnaire_name.' | '.$formattedDateTime;?></p>
                                            </div>
                                            <div class="btn-container">
                                                <a href="<?php echo URLROOT;?>Doctor/doc_quiz_review/<?php echo $response->response_id;?>" style="text-decoration: none;"><button class="button-main">Review</button></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</body>