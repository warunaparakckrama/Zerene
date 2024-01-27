<!-- <!DOCTYPE html>
<html lang="en"> -->
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
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Undergraduates</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>
                <div>
                    <div class="card-white">
                        <p class="p-regular">Undergraduate details</p>

                        <div class="card-green">
                        <img src="<?php echo IMG;?>OBJECTS.svg" alt="profile pic" class="card-proflie">
                            <div>
                                <p class="p-regular" style=" margin-bottom: -10px;">Zerene_user1_12</p>
                                <p class="p-regular" style="color: var(--zerene-grey);">Female|22 years</p>
                                <p class="p-regular" style="color: var(--zerene-grey);">Second Year Undergraduate|faculty of Arts|UOC</p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">210401@foa.uc.cmb.lk</p>
                            
                            </div>
                            <div class="btn-container">
                            <a href="<?php echo URLROOT;?>doctor/doc_undergrad4"><button class="button-main">Add Notes</button></a>
                            </div>  
                        </div>
                    </div>
             
                    <div class="card-white">
                        <p class="p-regular">Previous Notes</p>
                        
                        <div class="card-green">
                            <img src="<?php echo IMG;?>note1.svg" alt="profile pic" class="card-proflie">
                            <div>
                                <p class="p-regular" style=" margin-bottom: -10px;">Note 03</p>
                                <p class="p-regular" style="color: var(--zerene-grey);">by Mrs. Nilani Thushanthika</p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">30/12/2023 at 08.24 pm</p>
                            </div>
                            <div class="btn-container">
                       
                                <button class="button-main">View</button>
                            </div>
                        </div>
    
                        <div class="card-green">
                            <img src="<?php echo IMG;?>note1.svg" alt="profile pic" class="card-proflie">
                            <div>
                                <p class="p-regular" style=" margin-bottom: -10px;">Note 03</p>
                                <p class="p-regular" style="color: var(--zerene-grey);">by Mrs. Nilani Thushanthika</p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">30/12/2023 at 08.24 pm</p>
                            </div>
                            <div class="btn-container">
                       
                                <button class="button-main">View</button>
                            </div>
                        </div>
    
                        <div class="card-green">
                            <img src="<?php echo IMG;?>note1.svg" alt="profile pic" class="card-proflie">
                            <div>
                                <p class="p-regular" style=" margin-bottom: -10px;">Note 03</p>
                                <p class="p-regular" style="color: var(--zerene-grey);">by Mrs. Nilani Thushanthika</p>
                                <p class="p-regular" style="color: var(--zerene-grey); font-size: 15px;">30/12/2023 at 08.24 pm</p>
                            </div>
                            <div class="btn-container">
                       
                                <button class="button-main">View</button>
                                </div>
                                </div>
    
                    </div>
                    <div>
                </div>
                </div>

                

            </div>

        </section>
    </body>
</html>