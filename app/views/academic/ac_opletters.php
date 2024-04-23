<?php
$currentPage = 'ac_opletters';
$request = $data['request'];
$letter = $data['letter'];
$undergrad = $data['undergrad'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Opinion Letters</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Opinion Letters</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>


            <div>
                <p class="p-regular-green">Recieved Request Letters</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['request'] as $request) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad) : ?>
                            <?php if ($request->from_ug_user_id === $undergrad->user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>note1.svg" alt="">
                                    <div>
                                        <p class="p-regular-green" style="margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                        <p class="p-regular-grey" style="font-size: 15px;"><?php echo $request->subject; ?></p>
                                        <?php $date = date("jS M, Y - \a\\t g.ia", strtotime($request->sent_at)); ?>
                                        <p class="p-regular-green" style="font-size: 15px;"><?php echo $date; ?></p>
                                    </div>

                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>academic/ac_req_letter_view/<?php echo $request->letter_id; ?>" style="text-decoration: none;"><button class="button-main">View Request letter</button></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                </div>

                <div>
                    <p class="p-regular-green">Created Opinion Letters </p>
                    <div class="card-white-scroll" style="height: 215px;">
                        <?php foreach ($data['letter'] as $letter) : ?>
                            <?php foreach ($data['undergrad'] as $undergrad) : ?>
                                <?php if ($letter->ug_user_id == $undergrad->user_id) : ?>
                                    <div class="card-green">
                                        <img src="<?php echo IMG; ?>note1.svg" alt="">
                                        <div>
                                            <p class="p-regular-green" style="margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                            <p class="p-regular-grey" style="font-size: 15px;"><?php echo $letter->letter_subject; ?></p>
                                            <?php $date = date("jS M, Y - \a\\t g.ia", strtotime($letter->date)); ?>
                                            <p class="p-regular-green" style="font-size: 15px;"><?php echo $date; ?></p>
                                        </div>

                                        <div class="btn-container">
                                            <a href="<?php echo URLROOT; ?>academic/ac_opletter_view/<?php echo $letter->letter_id ;?>" style="text-decoration: none;"><button class="button-main">View</button></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>



        </div>
    </section>
</body>