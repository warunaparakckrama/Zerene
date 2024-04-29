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

        .range {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
            /* Adjust as needed */
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
                <div><img src="<?php echo IMG; ?>counsellor-sb.svg" alt="ug avatar" width="30" height="30" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Create Questionnaires</p>
                <div class="card-white-scroll" style="max-height: 500px;">
                    <div class="card-green-5">
                        <form action="<?php echo URLROOT; ?>Procounsellor/createQuestionnaire/<?php echo $_SESSION['user_id']; ?>" method="POST">
                            <div style="font-size: 15px;">
                                <label for="quizName">Questionnaire Name:</label>
                                <input type="text" id="quizName" name="quiz_name" class="password-box" required><br>
                                <p class="p-error"><?php echo $data['quiz_name_err']; ?></p><br>

                                <label for="quiz_type">Questionnaire Type:</label>
                                <select name="quiz_type" id="quiz_type" required class="option">
                                    <option value="General <?php echo ($data['quiz_type'] === 'General') ? 'selected' : ''; ?> ">General</option>
                                    <option value="Stress <?php echo ($data['quiz_type'] === 'Stress') ? 'selected' : ''; ?> ">Stress</option>
                                    <option value="Anxiety <?php echo ($data['quiz_type'] === 'Anxiety') ? 'selected' : ''; ?> ">Anxiety</option>
                                    <option value="Depression <?php echo ($data['quiz_type'] === 'Depression') ? 'selected' : ''; ?> ">Depression</option>
                                    <option value="Other <?php echo ($data['quiz_type'] === 'Other') ? 'selected' : ''; ?> ">Other</option>
                                </select><br>
                                <p class="p-error"><?php echo $data['quiz_type_err']; ?></p><br>

                                <label for="num_questions">Number of Questions: (max: 21)</label>
                                <input type="number" id="numQuestions" name="num_questions" min="1" max="21" required oninput="generateQuestionFields()" class="password-box"><br>

                                <div id="questionField" style="padding-bottom: 10px;"></div><br>

                                <label for="num_answers">Number of Answers: (min: 4 | max: 5)</label>
                                <input type="number" id="numAnswers" name="num_answers" min="1" max="5" required oninput="generateAnswerFields()" class="password-box"><br>

                                <div id="answerField"></div><br>

                                <p class="p-regular-green">Marking Scheme</p>
                                <label for="num_ranges">Number of Ranges: (max: 5)</label>
                                <input type="number" id="numRanges" name="num_ranges" min="1" max="5" required oninput="generateRangeFields()" class="password-box"><br>

                                <div id="rangeField"></div><br>

                                <label for="">Multiplication Factor(If none, Select 1)</label>
                                <input type="number" id="mFactor" name="m_factor" min="1" required class="password-box"><br><br>

                                <div class="btn-container-2">
                                    <a href="" style="text-decoration: none;"><button class="button-main" type="submit" onclick="">Submit</button></a>
                                    <a href="" style="text-decoration: none;"><button class="button-danger" type="reset" onclick="window.location.reload();">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
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

        function generateRangeFields() {
            var numRanges = document.getElementById('numRanges').value;
            var container = document.getElementById('rangeField');
            container.innerHTML = ''; // Clear previous fields

            for (var i = 0; i < numRanges; i++) {
                var rangeNumber = i + 1;

                // Create input fields for minimum value, maximum value, and name for each range
                var rangeDiv = document.createElement('div');
                rangeDiv.classList.add('range');

                var minInput = document.createElement('input');
                minInput.type = 'number';
                minInput.id = 'minRange' + rangeNumber;
                minInput.classList.add('input');
                minInput.name = 'min_range' + rangeNumber;
                minInput.placeholder = 'Minimum Value';
                minInput.required = true;
                minInput.min = '0'; // Set the minimum value to zero

                var maxInput = document.createElement('input');
                maxInput.type = 'number';
                maxInput.id = 'maxRange' + rangeNumber;
                maxInput.classList.add('input');
                maxInput.name = 'max_range' + rangeNumber;
                maxInput.placeholder = 'Maximum Value';
                maxInput.required = true;
                maxInput.min = '0'; // Set the minimum value to zero

                var nameInput = document.createElement('input');
                nameInput.type = 'text';
                nameInput.id = 'rangeName' + rangeNumber;
                nameInput.classList.add('input');
                nameInput.name = 'range_name' + rangeNumber;
                nameInput.placeholder = 'Range Name';
                nameInput.required = true;

                // Append input fields to the range div
                rangeDiv.appendChild(minInput);
                rangeDiv.appendChild(maxInput);
                rangeDiv.appendChild(nameInput);

                container.appendChild(rangeDiv);
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