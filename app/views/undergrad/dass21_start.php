
<?php $currentPage = 'questionnaires'; ?>
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
                <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
            </div>
            <div class="grid-1">
                
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">DASS-21</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular">DASS-21</p>
                        <div class="card-green-4">
                            <div>
                                <p class="p-regular-green" style="font-size: 15px;">Mental Health Questionnaires - Level 01</p>
                                <p class="p-regular-green" style="font-size: 15px;">General Questionnaire for Stress, Anxiety and Depression</p>
                                <p class="p-regular-green" style="font-size: 15px; font-weight:600;">General Guidelines</p>
                                <p class="p-regular-green" style="font-size: 15px;">Following scores will be applied for your final calculation.</p>
                                <p class="p-regular-green" style="font-size: 15px; font-weight:500;">0 -Did not apply to me at all</p>
                                <p class="p-regular-green" style="font-size: 15px; font-weight:500;">1 -Applied to me to some degree, or some of the time</p>
                                <p class="p-regular-green" style="font-size: 15px; font-weight:500;">2 -Applied to me to a considerable degree or a good part of time</p>
                                <p class="p-regular-green" style="font-size: 15px; font-weight:500;">3 -Applied to me very much or most of the time</p>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </body>
<!-- </html> -->