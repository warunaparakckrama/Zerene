<!-- <html> -->
    <?php $currentPage = 'ad_home'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
            </div>
            <div class="grid-1">  
                
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Home</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div class="subgrid-1">
                    <div class="subgrid-2">
                        <p class="p-bold-grey" style="font-size: 80px; line-height: 80px;">Hello</p>
                        <p class="p-regular-grey" style="font-size: 80px; line-height: 80px; padding-bottom: 10px;">Admin!</p>
                        <p class="p-regular">Hope you’re having a good day...</p>
                        <p class="p-regular">Let's look after the System, Shall we? </p>
                        <div style="display: flex; flex-direction: row; margin-top: 20px; gap: 10px;">
                            <button class="button-main" style="margin-left: 0px">Registrations</button>
                            <button class="button-main">Verifications</button>
                        </div>
                    </div>
                    <div class="subgrid-2" style="justify-content: center;">
                        <img src="<?php echo IMG; ?>ug-home.svg" alt="ug home" width="338" height="461">
                    </div>
                </div>

            </div>
        </section>

    </body>
<!-- </html> -->