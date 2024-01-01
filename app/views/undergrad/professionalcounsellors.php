<!-- <!DOCTYPE html>
<html lang="en"> -->
<?php $currentPage = 'counsellors'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | Counsellors</title>
    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
            </div>
            
            <div class="grid-1">
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Counsellors</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div class="card-white">
                    <p class="p-regular">Professional Counsellors</p>
                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar1.svg" alt="profile pic" class="card-profile">
                        <div>
                        <a href="<?php echo URLROOT?>undergrad/counsellorprofile" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">Mrs. Nilani Thushanthika</p></a>
                            <p class="p-regular" style="color: var(--zerene-grey);">University of Colombo School of Computing</p>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">Weekdays from 2.00pm to 5.00pm</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main">Request</button>
                            <button class="button-main">Timeslots</button>
                        </div>
                    </div>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar2.svg" alt="profile pic" class="card-profile">
                        <div>
                            <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">Mr. Kasun Karunanayake</p></a>
                            <p class="p-regular" style="color: var(--zerene-grey);">Faculty of Arts</p>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">Weekdays from 2.00pm to 5.00pm</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main">Request</button>
                            <button class="button-main">Timeslots</button>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </body>
<!-- </html> -->