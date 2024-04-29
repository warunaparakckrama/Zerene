<?php
$currentPage = 'doc_prescription';
$undergrad = $data['undergrad'];
$counsellor = $data['counsellor'];
$direct = $data['direct'];
$created = $data['created'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Prescriptions</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Prescriptions</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Directed Undergraduates</p>
                <div class="card-white-scroll" style="height: 300px;">
                    <?php foreach ($data['direct'] as $direct) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad) : ?>
                            <?php foreach ($data['counsellor'] as $counsellor) : ?>
                                <?php if ($undergrad->user_id === $direct->ug_user_id && $counsellor->user_id === $direct->from_user_id) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>ug.svg" alt="profile pic" class="card-profile">
                                        <div>
                                            <a href="" class="a-name">
                                                <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                            </a>
                                            <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university . ' ' . $undergrad->faculty; ?></p>
                                            <p class="p-regular-green" style="font-size: 15px;">Directed by:<?php echo ' ' . $counsellor->first_name . ' ' . $counsellor->last_name; ?></p>
                                        </div>
                                        <div class="btn-container">
                                            <a href="<?php echo URLROOT;?>doctor/doc_create_prescription/<?php echo $undergrad->user_id;?>" style="text-decoration: none;"><button class="button-main">Create Prescription</button></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <p class="p-regular-green">Created prescriptions</p>
                <div class="card-white-scroll" style="height: 300px;">
                <?php
                 usort($data['created'], function($a, $b) {
                    return strtotime($b->date) - strtotime($a->date);
                });
                ?>
                    <?php foreach ($data['created'] as $created) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad) : ?>
                            
                                <?php if ($undergrad->user_id === $created->ug_user_id ) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>ug.svg" alt="profile pic" class="card-profile">
                                        <div>
                                            <a href="" class="a-name">
                                                <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                            </a>
                                            <p class="p-regular-grey" style="font-size: 15px;"><?php echo $undergrad->university . ' ' . $undergrad->faculty; ?></p>
                                        </div>
                                        <div class="btn-container">
                                            <a href="<?php echo URLROOT;?>doctor/doc_template/<?php echo $created->pres_id;?>" style="text-decoration: none;"><button class="button-main">View</button></a>
                                            
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                         <?php endforeach; ?> 
                     
                </div>
            </div>
    </section>
</body>