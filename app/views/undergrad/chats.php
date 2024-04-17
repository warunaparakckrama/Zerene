<!-- <!DOCTYPE html>
<html lang="en"> -->
<?php $currentPage = 'chats'; ?>
<?php $request = $data['request']; ?>
<?php $counsellor = $data['counsellor']; ?>
<?php $undergrad = $data['undergrad']; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Chats</title>
</head>
<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Chats</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <p class="p-regular-green">Recents</p>
                <div class="card-white-scroll" style="height: 500px;">
                    <?php foreach ($data['request'] as $request) : ?>
                        <?php foreach ($data['counsellor'] as $counsellor) : ?> 
                            <?php if ($request->ug_id === $undergrad->ug_id && $request->coun_id === $counsellor->coun_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG;?>pro-avatar1.svg" alt="quiz" class="card-profile2">
                                    <div>
                                        <a href="<?php echo URLROOT;?>undergrad/chatroom/<?php echo $counsellor->user_id;?>" class="a-name"><p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name. ' ' .$counsellor->last_name;?></p></a>
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;"><?php echo $counsellor->coun_type;?> Counsellor | <?php echo $counsellor->university;?></p>
                                    </div>
                                    <div class="text-container">
                                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">text</p>
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