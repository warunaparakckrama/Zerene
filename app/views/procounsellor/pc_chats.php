<?php
$currentPage = 'pc_chats';
$request = $data['request'];
$counsellor = $data['counsellor'];
$all_counsellors = $data['all_counsellors'];
$all_doctors = $data['all_doctors'];
$undergrad = $data['undergrad'];
$connection = $data['connection'];
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
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Chats</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Undergraduates</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['request'] as $request) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad) : ?>
                            <?php if ($request->from_user_id === $undergrad->user_id) : ?>
                                <?php if ($request->to_user_id === $counsellor->user_id) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>ug.svg" alt="quiz" class="card-profile">
                                        <div>
                                            <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $undergrad->user_id; ?>" class="a-name">
                                                <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                            </a>
                                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $undergrad->university; ?> | <?php echo $undergrad->faculty; ?></p>
                                        </div>
                                        <div class="btn-container">
                                            <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $undergrad->user_id; ?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Counsellors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['connection'] as $connection) : ?>
                        <?php foreach ($data['all_counsellors'] as $all_counsellors) : ?>
                            <?php if ($connection->from_user === $_SESSION['user_id'] && $connection->to_user === $all_counsellors->user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>counsellor.svg" alt="quiz" class="card-profile">
                                    <div>
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->to_user; ?>" class="a-name">
                                            <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $all_counsellors->first_name . ' ' . $all_counsellors->last_name; ?></p>
                                        </a>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $all_counsellors->university; ?> | <?php echo $all_counsellors->faculty; ?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->to_user; ?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                    </div>
                                </div>
                            <?php elseif (($connection->to_user === $_SESSION['user_id'] && $connection->from_user === $all_counsellors->user_id)) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>counsellor.svg" alt="quiz" class="card-profile2">
                                    <div>
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->from_user; ?>" class="a-name">
                                            <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $all_counsellors->first_name . ' ' . $all_counsellors->last_name; ?></p>
                                        </a>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $all_counsellors->university; ?> | <?php echo $all_counsellors->faculty; ?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->from_user; ?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Doctors</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['connection'] as $connection) : ?>
                        <?php foreach ($data['all_doctors'] as $all_doctors) : ?>
                            <?php if ($connection->from_user === $_SESSION['user_id'] && $connection->to_user === $all_doctors->user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>doctor.svg" alt="quiz" class="card-profile">
                                    <div>
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->to_user; ?>" class="a-name">
                                            <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $all_doctors->first_name . ' ' . $all_doctors->last_name; ?></p>
                                        </a>
                                        <p class="p-regular-grey" style="font-size: 15px;"><?php echo $all_doctors->hospital; ?></p>
                                        <p class="p-regular-green" style="font-size: 15px;">(University in Charge: <?php echo $all_doctors->uni_in_charge; ?>)</p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->to_user; ?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                    </div>
                                </div>
                            <?php elseif (($connection->to_user === $_SESSION['user_id'] && $connection->from_user === $all_doctors->user_id)) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>doctor.svg" alt="quiz" class="card-profile2">
                                    <div>
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->from_user; ?>" class="a-name">
                                            <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $all_doctors->first_name . ' ' . $all_doctors->last_name; ?></p>
                                        </a>
                                        <p class="p-regular-grey" style="font-size: 15px;"><?php echo $all_doctors->hospital; ?></p>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">(University in Charge: <?php echo $all_doctors->uni_in_charge; ?>)</p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>procounsellor/pc_chatroom/<?php echo $connection->from_user; ?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
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