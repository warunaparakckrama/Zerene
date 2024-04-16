<!-- <!DOCTYPE html>
<html lang="en"> -->
    <?php $currentPage = 'ac_counselors'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professionals</title>
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section class="sec-1">
        <div>
        <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div> 
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Professionals</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Professional Counsellors</p>
                    <?php foreach($data['counsellors'] as $counsellor) : ?>

                    <div class="card-green">
                        <img src="<?php echo IMG;?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -5px;"><?php echo $counsellor->username ?></p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;"><?php echo $counsellor->faculty?></p>
                            <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;"><?php echo $counsellor->gender?></p>
                            
                        </div>
                        <div style="display: flex;justify-content:center;">
                            <button class="button-main">message</button>
                        </div>
                        
                </div>
                <?php endforeach; ?>
                
            </div><br>
            <div class="card-white">
                <p class="p-regular">Academic Counsellors</p>

                <?php foreach($data['acCounsellors'] as $acCounsellor) : ?>
                <div class="card-green">
                    <img src="<?php echo IMG;?>ug-avatar2.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;"><?php echo $acCounsellor->username ?></p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;"><?php echo $acCounsellor->faculty?></p>
                        <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px; "><?php echo $acCounsellor->email ?></p>
                        
                    </div>
                    <div style="display: flex;justify-content:center;">
                        <button class="button-main">message</button>
                    </div>
                    
                </div>
                <?php endforeach; ?>
                
            </div>
            
        </div>
        
    </div>
        
    </section>
    
    
</body>
<!-- </html> -->