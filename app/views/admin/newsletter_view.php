<?php $currentPage = 'newsletters'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | Newsletters</title>
    </head>

    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
            </div>
            <div class="grid-1">  
                
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Newsletters</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular-grey">Preview</p>
                        <div class="nl-container">
                            <header class="nl-header">
                                <img src="<?php echo IMG?>logo - main black.svg" alt="Header Image">
                            </header><br>
                            
                            <h1 style="text-align: center;">Subject</h1>
                            
                            <div style="text-align: center;">
                                <p>newsletter content goes here.</p>
                            </div>

                            <footer class="nl-footer">
                                <p>Thank you for reading our newsletter!</p>
                                <p> &copy; 2024 Zerene. All rights reserved.</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>