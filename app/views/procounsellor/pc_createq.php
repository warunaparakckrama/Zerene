<?php $currentPage = 'pc_questionnaires'; ?>

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
                    <form action="<?php echo URLROOT; ?>Procounsellor/createQuestionnaire/<?php echo $_SESSION['user_id']; ?>" method="POST">
                        <div style="font-size: 15px;">
                            <label for="quizName">Questionnaire Name:</label>
                            <input type="text" id="quizName" name="quiz_name" required><br>
                            <p class="p-error"><?php echo $data['quiz_name_err']; ?></p><br>

                            <label for="quiz_type">Questionnaire Type:</label>
                            <select name="quiz_type" id="quiz_type" required>
                                <option value="general <?php echo ($data['quiz_type'] === 'general') ? 'selected' : ''; ?> ">General</option>
                                <option value="stress <?php echo ($data['quiz_type'] === 'stress') ? 'selected' : ''; ?> ">Stress</option>
                                <option value="anxiety <?php echo ($data['quiz_type'] === 'anxiety') ? 'selected' : ''; ?> ">Anxiety</option>
                                <option value="depression <?php echo ($data['quiz_type'] === 'depression') ? 'selected' : ''; ?> ">Depression</option>
                                <option value="other <?php echo ($data['quiz_type'] === 'other') ? 'selected' : ''; ?> ">Other</option>
                            </select><br>
                            <p class="p-error"><?php echo $data['quiz_type_err']; ?></p><br>

                            <label for="num_questions">Number of Questions: (max: 21)</label>
                            <input type="number" id="numQuestions" name="num_questions" min="1" max="21" required oninput="generateQuestionFields()"><br>
                            <p class="p-error"><?php echo $data['num_questions_err']; ?></p><br>

                            <div id="questionField" style="padding-bottom: 10px;"></div><br>

                            <label for="num_answers">Number of Answers: (min: 4 | max: 5)</label>
                            <input type="number" id="numAnswers" name="num_answers" min="1" max="5" required oninput="generateAnswerFields()"><br>
                            <p class="p-error"><?php echo $data['num_answers_err']; ?></p><br>

                            <div id="answerField"></div><br>

                            <div class="btn-container-2">
                                <a href="" style="text-decoration: none;"><button class="button-main" type="submit" onclick="confirmSubmit(event)">Submit</button></a>
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

        function confirmSubmit(event) {
            if (!confirm("You're about to add a questionnaire. Proceed?")) {
                event.preventDefault(); // Prevent the default action of the link
            }
            alert("questionnaire submitted successfully!");
        }
    </script>
</body>