
<?php $currentPage = 'doc_undergrad'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section class='sec-1'>
    <div>
    <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
    </div>

        <div class="grid-1"> 
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Undergraduate</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

        <div>
            <div class="card-white">
                <p class="p-regular">Past records</p>
                <div class="card-green">
                    <img src="<?php echo IMG;?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;">Session| Academic counsellor</p>
                        <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;">with Mrs. Nilani Thushanthika</p>
                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">28/1/2024</p>
                        
                    </div>
                     
                </div>

                <div class="card-green">
                    <img src="<?php echo IMG;?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;">Mrs. Nilani Thushanthika</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;margin-bottom: -10px;">University of Colombo School of Computing</p>
                        <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px; ">weekdays 2pm-5pm</p>
                        
                    </div>
                    
                </div>
            </div>

        </div>

        </div>
    </section>

    
</body>
