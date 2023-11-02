<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>chat</title>
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section> 
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Questionnaires</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>
                
                
                <div>
                    <div class="card-white">
                        <p class="p-regular">Recent</p>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>chat.svg" alt="pro pic" class="card-profile">
                            <div>
                                <p class="p-regular" style="margin-bottom: 0px;">Zerene_User08</p>
                                <p class="p-regular" style="color:var(--zerene-grey) ;">(Sent) You: That’s Great! Congratulations!</p>
                            </div>
                            <div style="display: flex;justify-content:center;">
                                <p class="p-regular" style="margin-bottom:10px;">14.02 PM</p>
                            </div>
                        </div>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>chat.svg" alt="pro pic" class="card-profile">
                            <div>
                                <p class="p-regular" style="margin-bottom: 0px;">Zerene_User12</p>
                                <p class="p-regular" style="color:var(--zerene-grey) ;">(Sent) You: Thank you</p>
                            </div>
                            <div style=" display:flex ; justify-content:center;">
                                
                            <p class="p-regular" style="margin-bottom:10px;">08.02 AM</p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            </div> 
            
    </section>

    
</body>
</html>