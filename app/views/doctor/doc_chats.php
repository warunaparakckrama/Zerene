<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Chats</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Recents</p>
                    <div class="card-green">
                        <img src="<?php echo IMG;?>ug-avatar1.svg" alt="quiz" class="card-profile2">
                        <div>
                            <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">ZereneUser-07</p></a>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 18px;">(Sent) You: Okay Madam. I'll send you the activity.</p>
                        </div>
                        <div class="text-container">
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">4.15 PM</p>
                        </div>
                    </div>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>ug-avatar1.svg" alt="quiz" class="card-profile2">
                        <div>
                            <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">ZereneUser-10</p></a>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 18px;">(Sent) You: Okay Madam.</p>
                        </div>
                        <div class="text-container">
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">8.45 AM</p>
                        </div>
                    </div>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>ug-avatar1.svg" alt="quiz" class="card-profile2">
                        <div>
                            <a href="" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;">ZereneUser-02</p></a>
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 18px;">(Sent) You: THANK YOU Madam.</p>
                        </div>
                        <div class="text-container">
                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">10.12 AM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</body>
</html>