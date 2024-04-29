<?php $currentPage = 'ad_registrations'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Registrations</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-1">

            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Registrations</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Create Account (Psychiatrist)</p>

                    <div class>
                        <form action="<?php echo URLROOT; ?>admin/ad_reg_doctor" method="POST">
                            <div class="card-green-2" style="font-size: 15px;">

                                <label for="fname">First Name: </label>
                                <input type="text" name="fname" placeholder="Enter First Name" class="form-signup" style="width: 50%; font-size: 15px;" value="<?php echo $data['fname']; ?>" required>

                                <label for="lname">Last Name: </label>
                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-signup" style="width: 50%; font-size: 15px;" value="<?php echo $data['lname']; ?>" required>

                                <label for="gender">Gender: </label>
                                <select name="gender" class="option" style="width: 50%;">
                                    <option value="Male" <?php echo ($data['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo ($data['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                                </select>

                                <label for="hospital">Hospital in Charge: </label>
                                <select name="hospital" class="option" style="width: 50%;">
                                    <option value="National Hospital - Colombo" <?php echo ($data['hospital'] === 'National Hospital - Colombo') ? 'selected' : ''; ?>>National Hospital - Colombo</option>
                                    <option value="National Institute of Mental Health - Sri Lanka" <?php echo ($data['hospital'] === 'National Institute of Mental Health - Sri Lanka') ? 'selected' : ''; ?>>National Institute of Mental Health - Sri Lanka</option>
                                    <option value="Teaching Hospital - Lady Ridgeway Hospital for Children" <?php echo ($data['hospital'] === 'Teaching Hospital - Lady Ridgeway Hospital for Children') ? 'selected' : ''; ?>>Teaching Hospital - Lady Ridgeway Hospital for Children</option>
                                    <option value="Mental Hospital - Angoda" <?php echo ($data['hospital'] === 'Mental Hospital - Ragama') ? 'selected' : ''; ?>>Mental Hospital - Angoda</option>
                                </select>

                                <label for="university">University in Charge: </label>
                                <select name="university" class="option" style="width: 50%;">
                                    <option value="University of Colombo" <?php echo ($data['university'] === 'University of Colombo') ? 'selected' : ''; ?>>University of Colombo</option>
                                </select>

                                <label for="email">Email: </label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-signup" style="width: 50%; font-size: 15px; padding-left: 5px;" value="<?php echo $data['email']; ?>" required>

                                <label for="contact_num">Contact Number: </label>
                                <input type="tel" name="contact_num" placeholder="format: 012 345 6789" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" class="form-signup" style="width: 50%; font-size: 15px; padding-left: 5px;" value="<?php echo $data['contact_num']; ?>" required>

                                <label for="username">Username: </label>
                                <input type="text" name="username" placeholder="Enter Username" class="form-signup" style="width: 50%; font-size: 15px;" value="<?php echo $data['username']; ?>" required>

                                <label for="password">Password: </label>
                                <input type="password" name="password" placeholder="Enter Password" class="password-box" style="width: 50%; font-size: 15px;" required>

                                <label for="password">Confirm Password: </label>
                                <input type="password" name="confirm_password" placeholder="Re-enter Password" class="password-box" style="width: 50%; font-size: 15px;" required>

                                <div class="btn-container-2">
                                    <button class="button-main" type="submit" onclick="">Register</button>
                                    <button class="button-danger" type="reset" onclick="">Cancel</button>
                                </div>
                                <p class="p-error"><?php echo isset($data['signup_alert']) ? $data['signup_alert'] : ''; ?></p>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </section>
</body>