<?php
    $currentPage = 'ac_opletters';
    $ug_user_id = $data['ug_user_id'];
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
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Opinion Letters</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Create Opinion Letter</p>
                    <div class="card-green-5">
                        <form action="<?php echo URLROOT;?>academic/ac_create_op_letter/<?php echo $ug_user_id;?>" method="POST">
                            <div style="font-size: 15px;">
                                <label for="subject">Subject: </label>
                                <input type="text" name="subject" style="font-size: 15px; width: 50%;" required><br><br>

                                <label for="content">Letter Body: </label>
                                <textarea name="content" rows="10" placeholder="Enter your message here" class="textarea-1" required></textarea><br><br>

                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Send Letter</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div>


        </div>
    </section>


</body>

</html>