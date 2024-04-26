<?php
$currentPage = 'prescriptions';
$prescription = $data['prescription'];
$doctor = $data['doctor'];
$user_id = $data['user_id'];
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
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Resources</p>
                </div>
            </div>

            <div>
                <p class="p-regular-green">Your Prescriptions</p>
                <div class="card-white-scroll" style="height: 500px;">
                    <?php foreach ($data['prescription'] as $prescription) : ?>
                        <div class="card-green">
                            <img src="<?php echo IMG; ?>note1.svg" alt="">
                            <div>
                                <p class="p-regular-green" style="margin-bottom: -10px;">Prescription No. <?php echo $prescription->pres_id; ?></p>
                                <?php foreach ($data['doctor'] as $doctor) : ?>
                                    <?php if ($doctor->user_id == $prescription->doc_user_id) : ?>
                                        <p class="p-regular-grey" style="font-size: 15px;">Diagnosed by Dr. <?php echo $doctor->first_name . ' ' . $doctor->last_name; ?></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php
                                    $dateTime = new DateTime($prescription->date);
                                    $formattedDateTime = $dateTime->format('jS M, y');
                                ?>
                                <p class="p-regular-green" style="font-size: 15px;">Issued on: <b><?php echo $formattedDateTime;?></b></p>
                            </div>
                            <div class="btn-container">
                                <a href="<?php echo URLROOT;?>Undergrad/prescription_view/<?php echo $prescription->pres_id;?>" style="text-decoration: none;"><button class="button-main">View Prescription</button></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        </div>
    </section>
</body>