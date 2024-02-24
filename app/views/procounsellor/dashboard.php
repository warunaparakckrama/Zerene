<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo SITENAME;?> | Counselor</title>
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>undergrad.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>

    <body>
        
        <section>
            
            <div class="content" id="content">
                <?php require APPROOT . '/views/procounsellor/pc_home.php'; ?>
            </div>
        </section>

        <script src="<?php echo JS;?>dashboard-pc.js"></script>
    </body>

</html>