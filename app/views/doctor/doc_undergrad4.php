
<?php $currentPage = 'doc_undergrad'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <style> 
        /* Add custom styles for the textarea */
        .text-box-container textarea {
            width: 100%; /* Make the textarea take up 100% of the available width */
            box-sizing: border-box; /* Include padding and border in the width calculation */
        }
    </style> 
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
                    <img src="<?php echo IMG;?>ug-avatar2.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom: -5px;">Zerene User 12</p>
                        <p class="p-regular" style="color:var(--zerene-grey);margin-bottom: -10px;">Faculty of Arts</p>
                        <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">note 04</p>
                        
                    </div>
                     
                </div>

                <div class="card-green-3">
                <div class="text-box-container">
                <label for="noteText">add text here:</label>
                <textarea id="noteText" name="noteText" rows="20"></textarea>
                </div>
                    
                </div>

                <div><button class="button-main">Submit</button></div>
    
            </div>

        </div>

        </div>
    </section>

    
</body>
