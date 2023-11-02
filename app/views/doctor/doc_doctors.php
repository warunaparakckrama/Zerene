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
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Psychiatrists</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>
        

            <div>
                

                <div class="card-white">
                    <p class="p-regular">Psychiatrists (State Hospitals)</p>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;">Faculty of Arts</p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;">weekdays 4pm-6pm</p>
                            
                        </div>
                        <div class="btn-container">
                            <button class="button-main">message</button>
                        </div>
                    </div>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px; ">weekdays 2pm-5pm</p>
                            
                        </div>
                        <div class="btn-container">
                            <button class="button-main">message</button>
                        </div>
                    </div>
                </div>

                <div class="card-white">
                    <p class="p-regular">Psychiatrists (Private Channeling)</p>
                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px; ">weekdays 2pm-5pm</p>
                            
                        </div>
                        <div class="btn-container">
                            <button class="button-main">message</button>
                        </div> 
                    </div>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">weekdays 2pm-5pm</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main">message</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </section>

    
</body>
</html>