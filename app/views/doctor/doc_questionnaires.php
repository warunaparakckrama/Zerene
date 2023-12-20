<!-- <!DOCTYPE html>
<html lang="en"> -->
<?php $currentPage = 'doc questionnaires'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <body>
        <section class='sec-1'>
        <div>
        <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>
            <div class="grid-1">

                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Questionnaires</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div class="card-white">
                    <p class="p-regular">Recently Submitted</p>
                    
                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-proflie">
                        <div>
                            <p class="p-regular" style=" margin-bottom: -10px;">ZereneUser_07</p>
                            <p class="p-regular" style="color: var(--zerene-grey);">University of Colombo School of Computing</p>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">DASS-21 | Yesterday at 5.01pm</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main">Review</button>
                        </div>
                    </div>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar2.svg" alt="profile pic" class="card-proflie">
                        <div>
                            <p class="p-regular" style=" margin-bottom: -10px;">ZereneUser_01</p>
                            <p class="p-regular" style="color: var(--zerene-grey);">University of Colombo School of Computing</p>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">PHQ 9 | Saturday at 11.23am</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main">Review</button>
                        </div>
                    </div>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar2.svg" alt="profile pic" class="card-proflie">
                        <div>
                            <p class="p-regular" style=" margin-bottom: -10px;">ZereneUser_02</p>
                            <p class="p-regular" style="color: var(--zerene-grey);">Faculty of Arts | UOC</p>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">GAD 7 | 08.09.2023 at 9.05pm</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main">Review</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </body>
<!-- </html> -->