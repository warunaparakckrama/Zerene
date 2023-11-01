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
        <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Undergraduates</p></div>
        <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
    </div>

    <div>
                <div class="card-white">
                    <p class="p-regular">Undergraduates Details</p>
                    <div class="card-green">
                            <img src="<?php echo IMG;?>ug-avatar1.svg" alt="profile pic" class="card-proflie">
                            <div>
                        <div style="margin-left: 100px;">
                            <p class="p-regular" style="margin-bottom: 5px;">Zerene_User08</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">Female | 22 years</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">2nd year Undergraduate | Faculty of Arts | UOC</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">2023701@foa.uoc.cmb.ac.lk</p>
                            <div style=" display:flex ; justify-content:center;">
                                <button class="button-main" style="margin-left: -200px;">Add Note</button>
                                <button class="button-main" style="margin-right: -50px;">Issue a prescription</button>
                            </div>
                        </div>
                    
                    </div>
                    
                </div><br>

                <div class="card-white">
                    <p class="p-regular">Previous Notes (3)</p>
                    <div class="card-green">
                        <img src="<?php echo IMG;?>ug-avatar1.svg" alt="profile pic" class="card-proflie">
                    <div>
                        <p class="p-regular" style="margin-bottom: -10px;">Note(3)</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">By Mrs.Nilani Thushantika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">date | time</p>
                    </div>
                    
                    <div style=" display:flex ; justify-content:center;">
                        
                        <button class="button-main">View</button>
                    </div>
                </div>
                <div class="card-green">
                    <img src="../images/note1.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -10px;">Note(2)</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">By Mrs.Nilani Thushantika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">date | time</p>
                    </div>
                    <div style=" display:flex ; justify-content:center;">
                        <button class="button-main">View</button>
                    </div>
                </div>
                <div class="card-green">
                    <img src="../images/note1.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -10px;">Note(1)</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">By Mrs.Nilani Thushantika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">date | time</p>
                    </div>
                    <div style=" display:flex ; justify-content:center;">
                        
                        <button class="button-main">View</button>
                    </div>
                </div>
                    
                </div>
            </div>
            
        </div>
        
    </div>
        
</section>
    
</body>
</html>