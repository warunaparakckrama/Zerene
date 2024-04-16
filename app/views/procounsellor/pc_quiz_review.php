<?php 
    $currentPage = 'pc_questionnaires'; 
    $questionnaire = $data['questionnaire'];
    $response = $data['response'];
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
                <p class="p-regular-green">Questionnaire</p>
                <div class="card-white">
                    <div class="card-green">
                        <div>
                            <img src="<?php echo IMG;?>quiz.svg" alt="quiz-image">
                        </div>
                        <div style="font-size: 15px;">
                            <p class="p-regular-green">Questionnaire Name: <b><?php echo $questionnaire->questionnaire_name;?></b></p>
                            <p class="p-regular-green">Questionnaire Type: <b><?php echo $questionnaire->questionnaire_type;?></b></p>
                            <p class="p-regular-green">Number of Questions: <b><?php echo $questionnaire->num_of_questions;?></b></p>
                            <p class="p-regular-green">Number of Answers: <b><?php echo $questionnaire->num_of_answers;?></b></p>
                        </div>
                        <div class="btn-container">
                            <a href="" style="text-decoration: none;"><button class="button-main">View Questionnaire</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>