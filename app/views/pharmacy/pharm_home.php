<?php
$currentPage = 'pharm_home';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Counsellor</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pharm.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Home</p></div>
            </div>
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-bold-grey" style="font-size: 80px; line-height: 80px;">Hello</p>
                    <p class="p-regular-grey" style="font-size: 80px; line-height: 80px; padding-bottom: 10px;">Pharmacist!</p>
                    <p class="p-regular">Hope you’re having a good day...</p>
                    <p class="p-regular">Let's give a helping hand, Shall we?</p>
                    <div style="display: flex; flex-direction: row; margin-top: 20px; gap: 10px;">
                        <a href="" style="text-decoration: none;"><button class="button-main" style="margin-left: 0px">View Profile</button></a>
                        <a href="" style="text-decoration: none;"><button class="button-main">Questionnaires</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>