<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo SITENAME;?> | academic</title>
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>undergrad.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>

    <body>
        
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
            </div>

            <div class="content" id="content">
                <?php require APPROOT . '/views/academic/home.php'; ?>
            </div>
        </section>

        <script src="<?php echo JS;?>dashboard-ac.js"></script>
    </body>

</html>