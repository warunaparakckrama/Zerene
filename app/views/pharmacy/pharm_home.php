<?php
$currentPage = 'pharm_home';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Pharmacist</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pharm.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Home</p></div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-bold-grey" style="font-size: 80px; line-height: 80px;">Hello</p>
                    <p class="p-regular-grey" style="font-size: 80px; line-height: 80px; padding-bottom: 10px;">Pharmacist!</p>
                    <p class="p-regular">Hope you’re having a good day...</p>
                    <p class="p-regular">Let's give a helping hand, Shall we?</p>
                    <div style="display: flex; flex-direction: row; margin-top: 20px; gap: 10px;">
                        <a href="<?php echo URLROOT;?>pharmacy/pharm_prescriptions" style="text-decoration: none;"><button class="button-main">Prescriptions</button></a>  
                    </div>
                </div>
                <div class="subgrid-2" style="justify-content: center;">
                    <img src="<?php echo IMG;?>pharm.svg" alt="" width="507" height="461">
                </div>
            </div>
        </div>
    </section>
</body>