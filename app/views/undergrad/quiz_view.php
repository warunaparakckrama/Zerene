<?php $currentPage = 'questionnaires'; ?>
<?php $questionnaire = $data['questionnaire']; ?>
<?php $question = $data['question']; ?>
<?php $answer = $data['answer']; ?>

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
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;"><?php echo $questionnaire->questionnaire_name?></p></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular-green">General Guidelines</p>
                        <div class="card-green-3">
                            <div style="font-size: 15px;">
                                <p class="p-regular-green">-The questionnaire contains multiple choice questions.</p>
                                <p class="p-regular-green">-Number of questions may vary based on the questionnaire.</p>
                                <p class="p-regular-green">-Please answer to all the questions.</p>
                            </div>
                        </div>
                    </div>

                    <p class="p-regular-green">Questionnaire</p>
                    <div class="card-white-scroll" style="height: 400px;">
                        <div>
                            <form action="<?php echo URLROOT;?>Undergrad/submitResponses/<?php echo $_SESSION['user_id'];?>" method="POST">
                            <input type="hidden" name="questionnaire_id" value="<?php echo $questionnaire->questionnaire_id; ?>">
                                <div>
                                    <?php foreach ($data['question'] as $i => $question) : ?>
                                        <div  class="card-green-3">
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500; margin-top: 10px;"><?php echo ($i + 1).'. '. $question->question_text ?></p>
                                            <label class="radio">
                                                <input type="radio" name="<?php echo 'q' . ($i + 1) . '_response' ?>" value="0" required>
                                                <p class="p-regular-green" style="font-size: 15px;"><?php echo $answer->answer_1 ?></p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="<?php echo 'q' . ($i + 1) . '_response' ?>" value="1" required>
                                                <p class="p-regular-green" style="font-size: 15px;"><?php echo $answer->answer_2 ?></p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="<?php echo 'q' . ($i + 1) . '_response' ?>" value="2" required>
                                                <p class="p-regular-green" style="font-size: 15px;"><?php echo $answer->answer_3 ?></p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="<?php echo 'q' . ($i + 1) . '_response' ?>" value="3" required>
                                                <p class="p-regular-green" style="font-size: 15px;"><?php echo $answer->answer_4 ?></p>
                                            </label>
                                            <?php if ($answer->answer_5 !== NULL) : ?>
                                                <label class="radio">
                                                    <input type="radio" name="<?php echo 'q' . ($i + 1) . '_response' ?>" value="4" required>
                                                    <p class="p-regular-green" style="font-size: 15px;"><?php echo $answer->answer_5 ?></p>
                                                </label>
                                            <?php endif; ?>
                                        </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="btn-container-2">
                                        <button class="button-main" type="submit">Submit</button>
                                        <button class="button-danger" type="reset" onclick="">Cancel</button>
                                    </div>
                                </div>  
                            </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </section>
    </body>