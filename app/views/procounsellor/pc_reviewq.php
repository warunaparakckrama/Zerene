<?php 
    $currentPage = 'pc_questionnaires'; 
    $undergrad = $data['undergrad'];
    $questionnaire = $data['questionnaire'];
    $response = $data['response'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Counsellor</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Questionnaires</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <p class="p-regular-green">Recently Submitted</p>
                <div class="card-white-scroll" style="height: 500px;">
                    <?php foreach ($data['response'] as $response) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad) : ?>
                            <?php foreach ($data['questionnaire'] as $questionnaire) : ?>
                                <?php if ($response->user_id === $undergrad->user_id && $response->questionnaire_id === $questionnaire->questionnaire_id) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="profile pic" class="card-profile">
                                        <div>
                                            <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username;?></p>
                                            <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university.' '. $undergrad->faculty;?></p>
                                            <?php $dateTime = new DateTime($response->attempted_at); $formattedDateTime = $dateTime->format('jS M, y \a\t h:iA');?>
                                            <p class="p-regular-green" style="font-size: 15px;"><?php echo $questionnaire->questionnaire_name.' | '.$formattedDateTime;?></p>
                                        </div>
                                        <div class="btn-container">
                                            <button class="button-main">Review</button>
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