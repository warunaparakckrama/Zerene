
<?php $currentPage = 'doc_profile';
      $doctor = $data['doctor'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section class='sec-1'>
    <div>
    <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
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
                                    <td class="p-regular-grey">Name</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $doctor->first_name.' '.$doctor->last_name;?></td>
                                </tr>   
                                <tr>
                                    <td class="p-regular-grey">Email</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $doctor->email;?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Assigned University</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $doctor-> uni_in_charge;?></td>
                                </tr>
                               
                            </table>
                        </div>

                        <div class="rectangle">
                            <p>Change Password</p>
                            <form action="<?php echo URLROOT;?>Doctor/changePwdDoc/<?php echo $doctor->user_id;?>" method="POST" class="subgrid-1" style="font-size: 15px;">
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
                            <form action="<?php echo URLROOT;?>Doctor/changeUsernameDoc/<?php echo $doctor->user_id;?>" method="POST" class="subgrid-1" style="font-size: 15px;">
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
<!-- </html> -->