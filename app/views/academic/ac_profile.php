<!-- <!DOCTYPE html> -->
<!-- <html lang="en"> -->
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
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Profile</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>

                <div class="card-white">
                    <p class="p-regular-grey">User Account</p>
                    <div class="subgrid-4">

                        <div class="rectangle">
                            <p>General</p>
                            <table>
                                <tr>
                                    <td class="p-regular-grey">User ID</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_id'];?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Username</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_name'];?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">E-mail</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_email'];?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="rectangle">
                            <p>Change Password</p>
                            <form name="changePwdAcademic" action="<?php echo URLROOT;?>Academic/changePwdAcademic/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="fname" class="p-regular-grey">Current Password :</label>
                                <input type="password" id="current_password" name="current_password" class="form-default">
                                <p class="p-error"><?php echo isset($data['current_password_err']) ? $data['current_password_err'] : ''; ?></p><br>
                                <label for="fname" class="p-regular-grey">New Password :</label>
                                <input type="password" id="new_password" name="new_password" class="form-default">
                                <p class="p-error"><?php echo isset($data['new_password_err']) ? $data['new_password_err'] : ''; ?></p><br>
                                <label for="fname" class="p-regular-grey">Confirm Password :</label>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="" class="form-default">
                                <p class="p-error"><?php echo isset($data['confirm_password_err']) ? $data['confirm_password_err'] : ''; ?></p><br>
                                <button class="button-main" type="submit">Change</button>
                            </form>
                        </div>

                        <div class="rectangle">
                            <p>Change Username</p>
                            <form name="changeUsernameAcademic" action ="<?php echo URLROOT;?>Academic/changeUsernameAcademic/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="cusername" class="p-regular-grey">Current Username :</label>
                                <input type="text" id="current_username" name="current_username" class="form-default">
                                <p class="p-error"><?php echo isset($data['current_username_err']) ? $data['current_username_err'] : ''; ?></p><br>
                                <label for="nusername" class="p-regular-grey">New Username :</label>
                                <input type="text" id="new_username" name="new_username" class="form-default">
                                <p class="p-error"><?php echo isset($data['new_username_err']) ? $data['new_username_err'] : ''; ?></p><br>
                                <button class="button-main" type="submit">Change</button>
                            </form>
                        </div>
                        
                    </div>
                </div>

            </div>

        </div>
    </section>
</body>
<!-- </html> -->