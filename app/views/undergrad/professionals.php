<?php
    $currentPage = 'professionals'; 
    $counsellor = $data['counsellor'];
    $undergrad = $data['undergrad']; 
    $doctor = $data['doctor'];
    $direct = $data['direct'];
    $request = $data['request'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Professionals</title>
</head>
<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Professionals</p></div>
            </div>
            
            <div>
                <p class="p-regular-green">Academic Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Academic' && $undergrad->faculty === $counsellor->faculty) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>counsellor.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo$counsellor->university. ' | '.$counsellor->faculty;?></p>
                            </div>
                            <div class="btn-container">
                                <?php $requestFound = false; ?>
                                <?php foreach($data['request'] as $request) : ?>
                                    <?php if($request->to_user_id == $counsellor->user_id ) :?>
                                        <?php $requestFound = true; ?>
                                        <?php if($request->is_clicked == 1) : ?>
                                            <button class="button-second" disabled>Chat Created</button>
                                            <?php else : ?>
                                                <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">Message</button></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <!-- If no message request is found, display the "Message Request" button -->
                                <?php if(!$requestFound) : ?>
                                    <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">Message</button></a>
                                <?php endif; ?>

                                <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">View Profile</button></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                
                <p class="p-regular-green">Professional Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Professional' && $undergrad->university === $counsellor->university) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>counsellor.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo $counsellor->university.' | '.$counsellor->faculty;?></p>
                            </div>
                            <div class="btn-container">
                                <?php $requestFound = false; ?>
                                <?php foreach($data['request'] as $request) : ?>
                                    <?php if($request->to_user_id == $counsellor->user_id ) :?>
                                        <?php $requestFound = true; ?>
                                        <?php if($request->is_clicked == 1) : ?>
                                            <button class="button-second" disabled>Chat Created</button>
                                            <?php else : ?>
                                                <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">Message</button></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <!-- If no message request is found, display the "Message Request" button -->
                                <?php if(!$requestFound) : ?>
                                    <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">Message</button></a>
                                <?php endif; ?>

                                <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">View Profile</button></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Psychiatrists</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['doctor'] as $doctor) : ?>
                        <?php if ($doctor->uni_in_charge === $undergrad->university) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG;?>doctor.svg" alt="profile pic" class="card-profile">
                            <div>
                                <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $doctor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $doctor->first_name.' '.$doctor->last_name;?></p></a>
                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo$doctor->hospital;?></p>
                                <p class="p-regular-green" style="font-size: 15px;">Assigned University: <?php echo $doctor->uni_in_charge;?></p>
                            </div>
                            <div class="btn-container">
                                <?php $messageRequestButton = false; $requestSentButton = false; ?> 
                                <!-- Check the direct array -->                  
                                <?php foreach($data['direct'] as $direct) : ?>
                                    <?php if($direct->ug_user_id == $undergrad->user_id && $direct->to_user_id == $doctor->user_id) :?>
                                        <?php $messageRequestButton = true; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <!-- Check the request array -->
                                <?php foreach ($data['request'] as $request) : ?>
                                    <?php if ($request->to_user_id == $doctor->user_id) : ?>
                                        <?php $requestSentButton = true; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <!-- Display the appropriate button -->
                                <?php if ($requestSentButton) : ?>
                                    <button class="button-second" disabled>Chat Created</button>
                                <?php elseif ($messageRequestButton) : ?>
                                    <a href="<?php echo URLROOT;?>Undergrad/MsgRequest/<?php echo $doctor->user_id;?>" style="text-decoration: none;">
                                        <button class="button-main">Message</button>
                                    </a>
                                <?php endif; ?>

                                 <!-- Always display the "View Profile" button -->
                                <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $doctor->user_id;?>" style="text-decoration: none;"><button class="button-main">View Profile</button></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </section>
</body>