<?php 
    $currentPage = "request_letters";
    $counsellor = $data['counsellor'];
    $undergrad = $data['undergrad'];
    $request_letter = $data['request_letter']
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Request Letters</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Request Letters</p></div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Academic Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach($data['counsellor'] as $counsellor) : ?>
                        <?php if ($counsellor->coun_type === 'Academic' && $undergrad->faculty === $counsellor->faculty) : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG;?>counsellor.svg" alt="profile pic" class="card-profile">
                                <div>
                                    <a href="<?php echo URLROOT;?>Undergrad/professional_profile/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p></a>
                                    <p class="p-regular-grey" style="font-size: 15px;"><?php echo$counsellor->university. ' | '.$counsellor->faculty;?></p>
                                </div>
                                <div class="btn-container">
                                    <a href="<?php echo URLROOT;?>Undergrad/send_req_letter/<?php echo $counsellor->user_id;?>" style="text-decoration: none;"><button class="button-main">Send a Request Letter</button></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Sent Request Letters</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach($data['request_letter'] as $request_letter) : ?>
                        <?php foreach($data['counsellor'] as $counsellor) : ?>
                            <?php if ($request_letter->to_coun_user_id == $counsellor->user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG;?>note1.svg" alt="">
                                    <div>
                                        <p class="p-regular-green">To: <?php echo $counsellor->first_name.' '.$counsellor->last_name;?></p>
                                        <p class="p-regular-grey" style="font-size: 15px;"><?php echo $request_letter->subject;?></p>
                                    </div>

                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT;?>undergrad/view_request_letter/<?php echo $request_letter->letter_id;?>" style="text-decoration: none;"><button class="button-main">View Letter</button></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</body>