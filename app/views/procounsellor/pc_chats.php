<?php $currentPage = 'pc_chats'; ?>
<?php 
    $request = $data['request'];
    $counsellor = $data['counsellor'];
    $undergrad = $data['undergrad']; 
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
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Recents</p>
                    <?php foreach ($data['request'] as $request) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad):?>
                            <?php if ($request->ug_id === $undergrad->ug_id) : ?>
                                <?php if ($request->coun_id === $counsellor->coun_id) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="quiz" class="card-profile2">
                                        <div>
                                            <a href="<?php echo URLROOT;?>procounsellor/pc_chatroom/<?php echo $request->ug_id;?>" class="a-name"><p class="p-regular" style=" margin-bottom: -10px;"><?php echo $undergrad->username;?></p></a>
                                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $undergrad->university . ' '. $undergrad->faculty;?></p>
                                        </div>
                                        <div class="text-container">
                                            <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">text</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

    </section>
</body>