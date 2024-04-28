<?php 
    $currentPage = 'doc_undergrad';
    $undergrad = $data['undergrad'];
    $UgPress = $data['UgPress'];
    $prescription = $data['prescription'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Undergraduates</title>
</head>

<body>
    <section class='sec-1'>
        <div>
            <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Undergraduates</p></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Undergraduate details</p>

                    <div class="card-green">
                        <img src="<?php echo IMG; ?>ug.svg" alt="profile pic" class="card-profile-2">
                        <div style="font-size: 18px;;">
                            <p class="p-regular-green" style="font-size: 20px; margin-bottom: -5px;"><?php echo $undergrad->username;?></p>
                            <p class="p-light-grey" style="margin-bottom: -10px;"><?php echo $undergrad->gender.' | '.$undergrad->age.' ';?>years</p>
                            <p class="p-light-grey">Year <?php echo $undergrad->study_year;?> Undergraduate | <?php echo $undergrad->faculty;?></p>
                            <p class="p-regular-green" style="margin-bottom: 10px; font-size: 15px;"><?php echo $undergrad->email;?></p>
                            <div style="display: flex; flex-direction: row; gap: 10px;">
                                <a href="<?php echo URLROOT . "doctor/doc_create_prescription/" . $undergrad->user_id;?>" style="text-decoration: none;"><button class="button-main">Create a prescription</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            

               <p class="p-regular-green">Created prescriptions</p>
                <div class="card-white-scroll" style="height: 300px;">
                
                    <?php foreach ($data['UgPress'] as $UgPress) : ?>
                         
                        
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>note1.svg" alt="profile pic" class="card-profile">
                                        <div>
                                            
                                                <p class="p-regular-green" style=" margin-bottom: -10px;">Prescription No.<?php echo $UgPress->pres_id; ?></p>
                                      
                                                <?php
                                    $dateTime = new DateTime($UgPress->date);
                                    $formattedDateTime = $dateTime->format('jS M, y');
                                ?>
                                <p class="p-regular-green" style="font-size: 15px;">Issued on: <b><?php echo $formattedDateTime;?></b></p>
                                            
                                        </div>
                                        <div class="btn-container">
                                            <a href="<?php echo URLROOT;?>doctor/doc_template/<?php echo $UgPress->pres_id;?>" style="text-decoration: none;"><button class="button-main">View</button></a>
                                        </div>
                                    </div>
                        <?php endforeach; ?>                     
                    
                </div>

            </div>

        </div>

    </section>
</body>

</html>