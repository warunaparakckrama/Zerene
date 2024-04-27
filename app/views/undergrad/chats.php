<?php 
    $currentPage = 'chats';
    $request = $data['request'];
    $counsellor = $data['counsellor'];
    $doctor = $data['doctor'];
    $user_id = $data['user_id'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Chats</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Chats</p>
                </div>
            </div>

            <div>
                <p class="p-regular-green">Recents</p>
                <div class="card-white-scroll" style="height: 500px;">
                    <?php foreach ($data['request'] as $request) : ?>
                  
                        <?php foreach ($data['counsellor'] as $counsellor) : ?>
                            <?php if ($request->from_user_id === $user_id && $request->to_user_id === $counsellor->user_id ) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>pro-avatar1.svg" alt="quiz" class="card-profile2">
                                    <div>
                                        <a href="<?php echo URLROOT; ?>undergrad/chatroom/<?php echo $counsellor->user_id; ?>" class="a-name">
                                            <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name . ' ' . $counsellor->last_name; ?></p>
                                        </a>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $counsellor->coun_type; ?> Counsellor | <?php echo $counsellor->university; ?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>undergrad/chatroom/<?php echo $counsellor->user_id; ?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php foreach ($data['doctor'] as $doctor) : ?>
                            <?php if ($request->from_user_id === $user_id && $request->to_user_id === $doctor->user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>doc-avatar2.svg" alt="quiz" class="card-profile">
                                    <div>
                                        <a href="<?php echo URLROOT; ?>undergrad/chatroom/<?php echo $doctor->user_id; ?>" class="a-name">
                                            <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $doctor->first_name . ' ' . $doctor->last_name; ?></p>
                                        </a>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">Psychiatrist | <?php echo $doctor->uni_in_charge; ?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>undergrad/chatroom/<?php echo $doctor->user_id; ?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
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
<!-- </html> -->