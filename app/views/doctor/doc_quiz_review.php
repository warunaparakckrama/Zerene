<?php
$currentPage = 'doc_questionnaires';
$questionnaire = $data['questionnaire'];
$response = $data['response'];
$results = $data['results'];
$range = $data['range'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Questionnaires</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Questionnaires</p>
                </div>
            </div>

            <div>
                <p class="p-regular-green">Questionnaire</p>
                <div class="card-white">
                    <div class="card-green">
                        <div>
                            <img src="<?php echo IMG; ?>quiz.svg" alt="quiz-image">
                        </div>
                        <div style="font-size: 15px;">
                            <p class="p-regular-green">Questionnaire Name: <b><?php echo $questionnaire->questionnaire_name; ?></b></p>
                            <p class="p-regular-green">Questionnaire Type: <b><?php echo $questionnaire->questionnaire_type; ?></b></p>
                            <p class="p-regular-green">Number of Questions: <b><?php echo $questionnaire->num_of_questions; ?></b></p>
                            <p class="p-regular-green">Number of Answers: <b><?php echo $questionnaire->num_of_answers; ?></b></p>
                        </div>
                        <div class="btn-container">
                            <a href="" style="text-decoration: none;"><button class="button-main">View Questionnaire</button></a>
                        </div>
                    </div>
                </div>

                <p class="p-regular-green">Results</p>
                <div class="card-white">
                    <?php if ($questionnaire->questionnaire_name === 'DASS-21') : ?>
                        <div class="card-green-6">
                            <div style="font-size: 15px;">
                                <p class="p-regular-green">Final Mark for Depression: <b><?php echo $results['mark1']; ?></b></p>
                                <p class="p-regular-green">Final Mark for Anxiety: <b><?php echo $results['mark2']; ?></b></p>
                                <p class="p-regular-green">Final Mark for Stress: <b><?php echo $results['mark3']; ?></b></p><br>
                                <p class="p-regular-green">Undergraduate experiences <b><?php echo $results['depression']; ?></b> condition in terms of <b>Depression.</b></p>
                                <p class="p-regular-green">Undergraduate experiences <b><?php echo $results['anxiety']; ?></b> condition in terms of <b>Anxiety.</b></p>
                                <p class="p-regular-green">Undergraduate experiences <b><?php echo $results['stress']; ?></b> condition in terms of <b>Stress.</b></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($questionnaire->questionnaire_name !== 'DASS-21') : ?>
                        <div class="card-green-6">
                            <div style="font-size: 15px;">
                                <p class="p-regular-green">Final Mark: <b><?php echo $results['final_mark']; ?></b></p><br>
                                <p class="p-regular-green">Undergraduate experiences <b><?php echo $results['result']; ?></b> condition in terms of <b><?php echo $questionnaire->questionnaire_type; ?></b></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <p class="p-regular-green">Criteria</p>
                <div class="card-white">
                    <?php if ($questionnaire->questionnaire_name === 'DASS-21') : ?>
                        <div class="card-green-5">
                            <div style="display:flex; flex-direction: row; justify-content: space-between;">
                                <div style="font-size: 15px;">
                                    <p class="p-regular-green"><b>Depression</b></p>
                                    <p class="p-regular-green">Normal: 0-9</p>
                                    <p class="p-regular-green">Mild: 10-13</p>
                                    <p class="p-regular-green">Moderate: 14-20</p>
                                    <p class="p-regular-green">Severe: 21-27</p>
                                    <p class="p-regular-green">Extremely Severe: 28+</p>
                                </div>

                                <div style="font-size: 15px;">
                                    <p class="p-regular-green"><b>Anxiety</b></p>
                                    <p class="p-regular-green">Normal: 0-7</p>
                                    <p class="p-regular-green">Mild: 8-9</p>
                                    <p class="p-regular-green">Moderate: 10-14</p>
                                    <p class="p-regular-green">Severe: 15-19</p>
                                    <p class="p-regular-green">Extremely Severe: 20+</p>
                                </div>

                                <div style="font-size: 15px;">
                                    <p class="p-regular-green"><b>Stress</b></p>
                                    <p class="p-regular-green">Normal: 0-14</p>
                                    <p class="p-regular-green">Mild: 15-18</p>
                                    <p class="p-regular-green">Moderate: 19-25</p>
                                    <p class="p-regular-green">Severe: 26-33</p>
                                    <p class="p-regular-green">Extremely Severe: 34+</p>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card-green-5">
                            <div style="font-size: 15px;">
                                <?php foreach ($data['range'] as $range) : ?>
                                    <p class="p-regular-green"><?php echo $range->range_name; ?>: <?php echo $range->min_value; ?>-<?php echo $range->max_value; ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>