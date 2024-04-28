<?php
$currentPage = 'ac_opletters';
$yetToCompleteRequests = $data['yetToCompleteRequests'];
$letter = $data['letter'];
$undergrad = $data['undergrad'];
$request = $data['request'];
$completedRequests = $data['completedRequests'];
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
                <div class="subgrid-3">

                    <div class="search-container">

                    </div>

                    <div class="notification-icon" id="notification-icon">
                        <button class="notify">

                            <img src="<?php echo IMG; ?>bell.svg" alt="notify" class="btn-icon" height="20px" width="20px">
                        </button>
                    <!-- notification count  -->
                        <?php if ($data['newRequestCount'] > 0) {
                            echo '<span class="badge" id="notification-badge">' . $data['newRequestCount'] . '</span>';
                        } ?>
                    </div>
                </div>
            </div>


            <div>
                <p class="p-regular-green">Pending Request Letters</p>
                <div class="card-white-scroll" style="height: 215px;">
                    <?php foreach ($data['yetToCompleteRequests'] as $yetToCompleteRequests) : ?>
                        <?php foreach ($data['undergrad'] as $undergrad) : ?>
                            <?php if ($yetToCompleteRequests->from_ug_user_id === $undergrad->user_id) : ?>
                                <div class="card-green">
                                    <img src="<?php echo IMG; ?>note1.svg" alt="">
                                    <div>
                                        <p class="p-regular-green" style="margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                        <p class="p-regular-grey" style="font-size: 15px;"><?php echo $yetToCompleteRequests->subject; ?></p>
                                        <?php $date = date("jS M, Y - \a\\t g.ia", strtotime($yetToCompleteRequests->sent_at)); ?>
                                        <p class="p-regular-green" style="font-size: 15px;"><?php echo $date; ?></p>
                                    </div>

                                    <div class="btn-container">
                                        <a href="<?php echo URLROOT; ?>academic/ac_req_letter_view/<?php echo $yetToCompleteRequests->letter_id; ?>" style="text-decoration: none;"><button class="button-main">View Request letter</button></a>
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
                                <?php foreach ($data['request'] as $request) : ?>

                                    <?php if ($letter->req_letter_id == $request->letter_id && $request->from_ug_user_id == $undergrad->user_id) : ?>
                                        <div class="card-green">
                                            <img src="<?php echo IMG; ?>note1.svg" alt="">
                                            <div>
                                                <p class="p-regular-green" style="margin-bottom: -10px;"><?php echo $undergrad->username; ?></p>
                                                <p class="p-regular-grey" style="font-size: 15px;"><?php echo $letter->letter_subject; ?></p>
                                                <?php $date = date("jS M, Y - \a\\t g.ia", strtotime($letter->date)); ?>
                                                <p class="p-regular-green" style="font-size: 15px;"><?php echo $date; ?></p>
                                            </div>

                                            <div class="btn-container">
                                                <a href="<?php echo URLROOT; ?>academic/ac_opletter_view/<?php echo $letter->letter_id; ?>" style="text-decoration: none;"><button class="button-main">Opinion Letter</button></a>
                                                <a href="<?php echo URLROOT; ?>academic/ac_req_view_op/<?php echo $letter->req_letter_id; ?>" style="text-decoration: none;"><button class="button-main">Request Letter</button></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            <?php endforeach; ?>


                        <?php endforeach; ?>

                    </div>
                </div>

            </div>



        </div>
    </section>
    <script>
        // // Function to toggle the pop-up notification
        // function togglePopup() {
        //     var popup = document.getElementById("popup-notification");
        //     if (popup.style.display === "none") {
        //         popup.style.display = "block";
        //     } else {
        //         popup.style.display = "none";
        //     }
        // }

    </script>

</body>