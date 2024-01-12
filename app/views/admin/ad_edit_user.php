<?php $currentPage = 'ad_users'; ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
            </div>
            <div class="grid-1">

                <div class="subgrid-1">
                        <p class="p-title" style="font-size: 40px;">Users</p>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular">Edit Account</p>

                        <div class="card-green">
                            <form action="" method="POST">
                                <div style="font-size: 15px;">

                                    <label for="username">Username: </label>
                                    <input type="text" name="username" placeholder="Enter Username" value="">
                                    <br>

                                    <label for="email">Email: </label>
                                    <input type="text" name="email" placeholder="Enter Email"  value="">
                                    <br>

                                    <label for="password">Password: </label>
                                    <input type="password" name="password" placeholder="Enter Password" value="">
                                    <br>

                                    <label for="password">Confirm Password: </label>
                                    <input type="password" name="confirm_password" placeholder="Enter Password" value="">
                                    <br><br>

                                    <div class="btn-container-2">
                                        <button class="button-danger" type="reset">Cancel</button>
                                        <button class="button-main" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </body>