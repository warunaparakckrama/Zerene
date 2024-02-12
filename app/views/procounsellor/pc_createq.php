<?php $currentPage = 'pc_questions'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <style>
        .question-input {
            display: none;
        }
    </style>
    <title><?php echo SITENAME; ?> | Questionnaires</title>
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
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>
            <div class="card-white">
                <p class="p-regular">Create Questionnaires</p>
                <div class="card-green-5">
                    <form action="<?php echo URLROOT; ?>procounsellor/pc_createq" method="POST">
                        <div style="font-size: 15px;">
                            <label for="quizName">Questionnaire Name:</label>
                            <input type="text" id="quizName" name="quizName" required><br>
                            <p class="p-error"><?php echo $data['quizName_err']; ?></p><br>

                            <label for="quizType">Questionnaire Type:</label>
                            <select name="quizType" id="quizType" required>
                                <option value="DASS-21">General</option>
                                <option value="PHQ-9">Stress</option>
                                <option value="GAD-7">Anxiety</option>
                                <option value="GAD-7">Depression</option>
                                <option value="GAD-7">Other</option>
                            </select><br>
                            <p class="p-error"><?php echo $data['quizType_err']; ?></p><br>

                            <label for="numQuestions">Number of Questions: (max: 21)</label>
                            <input type="number" id="numQuestions" name="numQuestions" min="1" max="21" required oninput="generateQuestionFields()"><br>
                            <p class="p-error"><?php echo $data['numQuestions_err']; ?></p><br>

                            <div id="questionField" style="padding-bottom: 10px;"></div><br>

                            <label for="numAnswers">Number of Answers: (max: 5)</label>
                            <input type="number" id="numAnswers" name="numAnswers" min="1" max="5" required oninput="generateAnswerFields()"><br>
                            <p class="p-error"><?php echo $data['numAnswers_err']; ?></p><br>

                            <div id="answerField"></div><br>

                            <div class="btn-container-2">
                                <a href="" style="text-decoration: none;"><button class="button-main" type="submit">Submit</button></a>
                                <a href="" style="text-decoration: none;"><button class="button-danger" type="reset">Cancel</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <script>
        function generateQuestionFields() {
            var numQuestions = document.getElementById('numQuestions').value;
            var container = document.getElementById('questionField');
            container.innerHTML = ''; // Clear previous fields

            for (var i = 0; i < numQuestions; i++) {
                var questionNumber = i + 1;

                // Create input field for each question
                var questionInput = document.createElement('div');
                questionInput.innerHTML = '<label for="question' + questionNumber + '">Question ' + questionNumber + ':</label>' +
                    '<input type="text" id="question' + questionNumber + '" name="question' + questionNumber + '" value="" class="questionField" required><br><br>';

                container.appendChild(questionInput);
            }
        }

        function generateAnswerFields() {
            var numAnswers = document.getElementById('numAnswers').value;
            var container = document.getElementById('answerField');
            container.innerHTML = ''; // Clear previous fields

            for (var i = 0; i < numAnswers; i++) {
                var answerNumber = i + 1;

                // Create input field for each question
                var answerInput = document.createElement('div');
                answerInput.innerHTML = '<label for="answer' + answerNumber + '">Answer ' + answerNumber + ':</label>' +
                    '<input type="text" id="answer' + answerNumber + '" name="answer' + answerNumber + '" value="" class="questionField" required><br><br>';

                container.appendChild(answerInput);
            }
        }
    </script>
</body>