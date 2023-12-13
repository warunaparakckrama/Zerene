<!-- <!DOCTYPE html> -->
<!-- <html lang="en"> -->
<?php $currentPage = 'ad_reg_admin'; ?>
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
                        <p class="p-title" style="font-size: 40px;">Registrations</p>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular">Create Account (Administrator)</p>

                        <div class="card-green">
                            <form action="<?php echo URLROOT;?>admin/ad_reg_admin" method="POST">
                                <div style="font-size: 15px;">

                                    <label for="username">Username: </label>
                                    <input type="text" name="username" placeholder="Enter Username" class="<?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                                    <p class="p-error"><?php echo $data['username_err']; ?></p><br>

                                    <label for="email">Email: </label>
                                    <input type="text" name="email" placeholder="Enter Email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                                    <p class="p-error"><?php echo $data['email_err']; ?></p><br>

                                    <label for="password">Password: </label>
                                    <input type="password" name="password" placeholder="Enter Password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                    <p class="p-error"><?php echo $data['password_err']; ?></p><br>

                                    <label for="password">Confirm Password: </label>
                                    <input type="password" name="confirm_password" placeholder="Enter Password" class="<?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                                    <p class="p-error"><?php echo $data['confirm_password_err']; ?></p><br>

                                    <button class="button-main" type="submit">Register</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </body>
<!-- </html> -->