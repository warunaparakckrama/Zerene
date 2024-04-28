<?php
$currentPage = 'ac_undergrads';
$undergrad = $data['undergrad'];
$counsellor = $data['counsellor'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Undergraduates</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Undergraduates</p>
                </div>
                <div class="subgrid-3"></div>
            </div>

            <div>
                <p class="p-regular-green">Your Faculty</p>
                <div class="card-white-scroll" style="height: 500px;">
                    <?php foreach ($data['undergrad'] as $undergrad) : ?>
                        <?php if ($undergrad->faculty === $counsellor->faculty) : ?>
                            <div class="card-green">
                                <img src="<?php echo IMG; ?>ug.svg" alt="profile pic" class="card-profile">
                                <div>
                                    <a href="" class="a-name">
                                        <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                    </a>
                                    <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university . ' ' . $undergrad->faculty; ?></p>
                                </div>
                                <div class="btn-container">
                                <a href="<?php echo URLROOT;?>academic/ac_undergraduate_profile/<?php echo $undergrad->user_id;?>" style="text-decoration: none;">
                                <button class="button-main">Profile</button></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>


</body>