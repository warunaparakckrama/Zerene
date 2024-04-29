<?php
$currentPage = 'pc_questionnaires';
$questionnaire = $data['questionnaire'];
$response = $data['response'];
$question = $data['question'];
$answer = $data['answer'];
$undergrad = $data['undergrad'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Questionnaire</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Questionnaires</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>
            <div>
                <p class="p-regular-green"><?php echo $questionnaire->questionnaire_name ?> (<?php echo $undergrad->username ?>)</p>
                <div class="card-white-scroll" style="height: 550px;">
                    
                        <div>
                            <?php foreach ($data['question'] as $i => $question) : ?>
                                <div class="card-green-3">
                                <div style="margin: 10px 10px;">
                                    <p class="p-regular-green" style="font-size: 17px;"><?php echo ($i + 1) . '. ' . $question->question_text ?></p>
                                
                                <?php
                                $responsePropertyName = 'q' . ($i + 1) . '_response';
                                $responseValue = $data['response']->$responsePropertyName;                                
                                switch ($responseValue) {
                                    case 0:
                                        $selectedAnswer = $answer->answer_1;
                                        break;
                                    case 1:
                                        $selectedAnswer = $answer->answer_2;
                                        break;
                                    case 2:
                                        $selectedAnswer = $answer->answer_3;
                                        break;
                                    case 3:
                                        $selectedAnswer = $answer->answer_4;
                                        break;
                                    case 4:
                                        $selectedAnswer = $answer->answer_5;
                                        break;
                                    default:
                                        $selectedAnswer = '';
                                }
                                ?>
                                <p class="p-regular-grey" style="font-size: 15px;">Answer : <?php echo $selectedAnswer ?></p>
                                </div>
                                </div>
                            <?php endforeach ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>