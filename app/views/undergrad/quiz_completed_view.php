<?php $currentPage = 'questionnaires'; ?>
<?php $questionnaire = $data['questionnaire']; ?>
<?php $question = $data['question']; ?>
<?php $answer = $data['answer']; ?>

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
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;"><?php echo $questionnaire->questionnaire_name ?></p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>

            </div>

            <div>
                <div class="card-white-scroll" style="height: 400px;">
                    <div class="card-green-3">
                        <p class="p-regular-green">Selected Answers</p>
                        <div class="card-white-scroll" style="height: 400px;">
                            <div class="card-green-3">
                                <div>
                                    <?php foreach ($data['answer'] as $i => $answer) : ?>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">Question <?php echo ($i + 1) ?>:</p>
                                            <p class="p-regular-green" style="font-size: 15px;">Selected Answer: <?php echo $answer->{'answer_' . $answer['q' . ($i + 1) . '_response']}; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>