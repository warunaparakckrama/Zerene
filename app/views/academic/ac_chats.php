<?php $currentPage = 'ac_chats'; ?>
<?php 
    $request = $data['request'];
    $counsellor = $data['counsellor'];
    $all_counsellors = $data['all_counsellors'];
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
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Chats</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>


            <div>
                <p class="p-regular-green">Undergraduates</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['request'] as $request) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad):?>
                            <?php if ($request->from_user_id === $undergrad->user_id) : ?>
                                <?php if ($request->to_user_id === $counsellor->user_id) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="quiz" class="card-profile">
                                        <div>
                                            <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $undergrad->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username;?></p></a>
                                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $undergrad->university;?> | <?php echo $undergrad->faculty;?></p>
                                        </div>
                                        <div class="text-container">
                                            <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $undergrad->user_id;?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

                <p class="p-regular-green">Professionals</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['connection'] as $connection ): ?>
                        <?php foreach ($data['all_counsellors'] as $all_counsellors):?>
                            <?php if (($connection->from_user === $_SESSION['user_id'] && $connection->to_user === $all_counsellors->user_id)):?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="quiz" class="card-profile">
                                    <div>
                                        <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $connection->to_user;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $all_counsellors->first_name.' '.$all_counsellors->last_name;?></p></a>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $all_counsellors->university;?> | <?php echo $all_counsellors->faculty;?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $connection->to_user;?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                    </div>
                                </div>
                            <?php elseif (($connection->to_user === $_SESSION['user_id'] && $connection->from_user === $all_counsellors->user_id)):?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>pro-avatar2.svg" alt="quiz" class="card-profile">
                                    <div>
                                        <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $connection->from_user;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $all_counsellors->first_name.' '.$all_counsellors->last_name;?></p></a>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $all_counsellors->university;?> | <?php echo $all_counsellors->faculty;?></p>
                                    </div>
                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT;?>academic/ac_chatroom/<?php echo $connection->from_user;?>" style="text-decoration: none;"><button class="button-main">View Chat</button></a>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

    </section>


</body>