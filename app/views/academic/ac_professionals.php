<?php $currentPage = 'ac_professionals'; ?>
<?php $counsellor = $data['counsellor']; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Professionals</title>
</head>

<body>
    <section class="sec-1">
        <div>
        <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div> 
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Professionals</p></div>
                <div><img src="<?php echo IMG; ?>counsellor-sb.svg" alt="ug avatar" width="30" height="30" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Academic Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Academic' && $counsellor->user_id !== $_SESSION['user_id']) : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG; ?>counsellor.svg" alt="pro pic" class="card-profile">
                                <div>
                                    <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style="margin-bottom: -5px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                    <p class="p-regular-grey" style="font-size: 15px"><?php echo $counsellor->university.' '.$counsellor->faculty;?></p>
                                </div>
                                <div class="btn-container">
                                    <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">message</button></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Professional Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Professional') : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG; ?>doctor.svg" alt="pro pic" class="card-profile">
                                <div>
                                    <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style="margin-bottom: -5px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                    <p class="p-regular" style="color:var(--zerene-grey); font-size: 15px"><?php echo $counsellor->university.' '.$counsellor->faculty;?></p>
                                </div>
                                <div class="btn-container">
                                <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">message</button></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                
            </div>
            
            
        </div>
        
    </div>
        
    </section>
    
    
</body>
<!-- </html> -->