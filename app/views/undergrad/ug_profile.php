
<?php $currentPage = 'ug_profile'; 
    $undergrad = $data['undergrad'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name'];?> | Profile</title>
</head>
<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Profile</p></div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>

                <div class="card-white">
                    <div class="subgrid-4">

                        <div class="rectangle">
                            <p>General</p>
                            <table>
                                <tr>
                                    <td class="p-regular-grey">Username</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $undergrad->username;?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Email</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $undergrad->email;?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">University</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $undergrad->university;?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Faculty</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $undergrad->faculty;?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="rectangle">
                            <p>Change Password</p>
                            <form action="<?php echo URLROOT;?>Undergrad/changePwdUG/<?php echo $undergrad->user_id;?>" method="POST" class="subgrid-1" style="font-size: 15px;">
                                <label for="fname" class="p-regular-grey">Current Password :</label>
                                <input type="password" id="current_password" name="current_password" class="password-box" required>

                                <label for="fname" class="p-regular-grey">New Password :</label>
                                <input type="password" id="new_password" name="new_password" class="password-box" required>

                                <label for="fname" class="p-regular-grey">Confirm Password :</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="password-box" required>
                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Change</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                                <p class="p-error"><?php echo isset($data['password_alert']) ? $data['password_alert'] : ''; ?></p>
                            </form>
                        </div>

                        <div class="rectangle">
                            <p>Change Username</p>
                            <form action="<?php echo URLROOT;?>Undergrad/changeUsernameUG/<?php echo $undergrad->user_id;?>" method="POST" class="subgrid-1" style="font-size: 15px;">
                                <label for="cusername" class="p-regular-grey">New Username :</label>
                                <input type="text" name="new_username" style="margin-bottom: 5px;" class="password-box" required>
                                
                                <label for="nusername" class="p-regular-grey">Password :</label>
                                <input type="password" name="password" class="password-box" required>
                                
                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Change</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                                <p class="p-error"><?php echo isset($data['username_alert']) ? $data['username_alert'] : ''; ?></p>
                            </form>
                        </div>
                        
                    </div>
                </div>

            </div>

        </div>
    </section>
</body>