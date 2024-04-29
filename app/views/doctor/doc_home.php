<?php $currentPage = 'doc_home';
$notification = $data['notification'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>
        <div class="grid-1">

            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Home</p>
                </div>
                <div class="subgrid-3">
                    <div class="notification-icon" id="notification-icon">
                        <button class="notify">
                            <img src="<?php echo IMG; ?>bell.svg" alt="notify" class="btn-icon" height="20px" width="20px">

                        </button>
                        <!-- notification count  -->

                        <?php if ($data['notification'] > 0) {
                            echo '<span class="badge" id="notification-badge">' . $notification . '</span>';
                        }
                        ?>

                    </div>
                </div>
            </div>


            <div class="subgrid-1">

                <div class="subgrid-2">

                    <p class="p-bold-grey" style="font-size: 80px; line-height: 80px;">Hello</p>
                    <p class="p-regular-grey" style="font-size: 80px; line-height: 80px; padding-bottom: 10px;">Doctor!</p>
                    <p class="p-regular">Hope you’re having a good day...</p>
                    <p class="p-regular">Let's Give a helping hand, Shall we?</p>
                    <div style="display: flex; flex-direction: row; margin-top: 20px; gap: 10px;">
                        <a href="<?php echo URLROOT . "doctor/doc_prescription/"; ?>" style="text-decoration: none;"> <button class="button-main" style="margin-left: 0px"> directed Undergraduates<?php if ($data['notification'] > 0) {
                            echo '<span class="badge1" id="notification-badge">' . $notification . '</span>';
                }
                ?></button>


                            <a href="<?php echo URLROOT . "doctor/doc_timeslots/"; ?>" style="text-decoration: none;"> <button class="button-main">Timeslots</button>
                    </div>
                </div>
                <div class="subgrid-2" style="justify-content: center;">
                    <img src="<?php echo IMG; ?>ug-home.svg" alt="ug home" width="338" height="461">
                </div>
            </div>

        </div>
    </section>
    <script>
        // // Function to toggle the pop-up notification
        function togglePopup() {
            var popup = document.getElementById("popup-notification");
            if (popup.style.display === "none") {
                popup.style.display = "block";
            } else {
                popup.style.display = "none";
            }
        }
    </script>

</body>