<?php $admin = $data['admin'];?>
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
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Profile</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
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
                                    <td class="p-title"><?php echo $admin->username;?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Email</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $admin->email;?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="rectangle">
                            <p>Change Password</p>
                            <form name="changePwdAdmin" action="<?php echo URLROOT;?>Admin/changePwdAdmin/<?php echo $admin->user_id;?>" method="POST" class="subgrid-1" style="font-size: 15px;;">
                                <label for="fname" class="p-regular-grey">Current Password :</label>
                                <input type="password" name="current_password" class="" required>
                                
                                <label for="fname" class="p-regular-grey">New Password :</label>
                                <input type="password" name="new_password" class="" required>
                                
                                <label for="fname" class="p-regular-grey">Confirm Password :</label>
                                <input type="password" name="confirm_password" class="" required>
                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Change</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                                <p class="p-error"><?php echo isset($data['password_alert']) ? $data['password_alert'] : ''; ?></p>
                            </form>
                        </div>

                        <div class="rectangle">
                            <p>Change Username</p>
                            <form name="changeUsernameAdmin" action="<?php echo URLROOT;?>Admin/changeUsernameAdmin/<?php echo $admin->user_id;?>" method="POST" class="subgrid-1" style="font-size: 15px;">
                                <label for="nusername" class="p-regular-grey">New Username :</label>
                                <input type="text" name="new_username" class="" required>

                                <label for="nusername" class="p-regular-grey">Password :</label>
                                <input type="password" name="password"  required>
                                
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
<!-- </html> -->