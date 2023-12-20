<!-- <html lang="en"> -->
<?php $currentPage = 'questionnaires'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
            </div>
            <div class="grid-1">
                
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Questionnaires</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular">Available Questionnaires</p>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>quiz.svg" alt="quiz" class="card-profile">
                            <div>
                                <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">DASS-21</p></a>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 18px;">General Questionnaire for Anxiety, Depression & Stress</p>
                            </div>
                            <div class="btn-container">
                                <button class="button-main">Start</button>
                            </div>
                        </div>
                    </div>
        
                    <div class="card-white">
                        <p class="p-regular">Completed Questionnaires</p>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>quiz.svg" alt="quiz" class="card-profile">
                            <div>
                                <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">DASS-21</p></a>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 18px;">General Questionnaire for Anxiety, Depression & Stress</p>
                            </div>
                            <div class="btn-container">
                                <button class="button-main">View</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-white">
                        <p class="p-regular">Drafts</p>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>quiz.svg" alt="quiz" class="card-profile">
                            <div>
                                <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">DASS-21</p></a>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 18px;">General Questionnaire for Anxiety, Depression & Stress</p>
                            </div>
                            <div class="btn-container">
                                <button class="button-main">Complete</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </body>
<!-- </html> -->