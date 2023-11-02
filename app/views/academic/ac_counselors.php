<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professionals</title>
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
                    <p class="p-regular">Professional Counsellors</p>
                    <div class="card-green">
                        <img src="<?php echo IMG;?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;">Faculty of Arts</p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;">weekdays 4pm-6pm</p>
                            
                        </div>
                        <div style="display: flex;justify-content:center;">
                            <button class="button-main">message</button>
                        </div>
                        
                </div>
                <div class="card-green">
                    <img src="<?php echo IMG;?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                        <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px; ">weekdays 2pm-5pm</p>
                        
                    </div>
                    <div style="display: flex;justify-content:center;">
                        <button class="button-main">message</button>
                    </div>
                    
                </div>
            </div><br>
            <div class="card-white">
                <p class="p-regular">Academic Counsellors</p>
                <div class="card-green">
                    <img src="<?php echo IMG;?>ug-avatar2.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                        <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px; ">weekdays 2pm-5pm</p>
                        
                    </div>
                    <div style="display: flex;justify-content:center;">
                        <button class="button-main">message</button>
                    </div>
                    
                </div>
                <div class="card-green">
                    <img src="<?php echo IMG;?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">weekdays 2pm-5pm</p>
                    </div>
                    <div style="display: flex;justify-content:center;">
                        <button class="button-main">message</button>
                    </div>
                    
                </div>
                <div class="card-green">
                    <img src="<?php echo IMG;?>ug-avatar2.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">weekdays 2pm-5pm</p>
                    </div>
                    <div style="display: flex;justify-content:center;">
                        <button class="button-main">message</button>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
    </div>
        
    </section>
    
    
</body>
</html>