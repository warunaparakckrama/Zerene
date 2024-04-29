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
                    <p class="p-regular-green">Create Account (Counsellor)</p>

                    <div>
                        <form action="<?php echo URLROOT; ?>admin/ad_reg_counsellor" method="POST">
                            <div class="card-green-2" style="font-size: 15px;">

                                <label for="coun_type">Type: </label>
                                <select name="coun_type" id="" style="width: 50%;" class="option">
                                    <option value="Academic <?php echo ($data['coun_type'] === 'Academic') ? 'selected' : ''; ?>">Academic</option>
                                    <option value="Professional <?php echo ($data['coun_type'] === 'Professional') ? 'selected' : ''; ?>">Professional</option>
                                </select>

                                <label for="fname">First Name: </label>
                                <input type="text" name="fname" placeholder="Enter First Name" class="form-signup" style="width: 50%; font-size: 15px;" value="<?php echo $data['fname']; ?>" required>

                                <label for="lname">Last Name: </label>
                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-signup" style="width: 50%;  font-size: 15px;" value="<?php echo $data['lname']; ?>" required>

                                <label for="gender">Gender: </label>
                                <select name="gender" style="width: 50%" class="option">
                                    <option value="Male <?php echo ($data['gender'] === 'Male') ? 'selected' : ''; ?>">Male</option>
                                    <option value="Female <?php echo ($data['gender'] === 'Female') ? 'selected' : ''; ?>">Female</option>
                                </select>

                                <label for="dob">Birthday: </label>
                                <input type="date" name="dob" class="form-signup" style="width: 50%; padding-left: 5px;" value="<?php echo $data['dob']; ?>">

                                <label for="university">University: </label>
                                <select name="university" id="" class="option" style="width: 50%;">
                                    <option value="University of Colombo">University of Colombo</option>
                                </select>

                                <label for="faculty">Faculty: </label>
                                <select name="faculty" id="" class="option" style="width: 50%;">
                                    <option value="Faculty of Arts <?php echo ($data['faculty'] === 'Faculty of Arts') ? 'selected' : ''; ?>">Faculty of Arts</option>
                                    <option value="Faculty of Law <?php echo ($data['faculty'] === 'Faculty of Law') ? 'selected' : ''; ?>">Faculty of Law</option>
                                    <option value="Faculty of Science <?php echo ($data['faculty'] === 'Faculty of Science') ? 'selected' : ''; ?>">Faculty of Science</option>
                                    <option value="School of Computing <?php echo ($data['faculty'] === 'School of Computing') ? 'selected' : ''; ?>" selected>School of Computing</option>
                                    <option value="Faculty of Management & Finance <?php echo ($data['faculty'] === 'Faculty of Management & Finance') ? 'selected' : ''; ?>">Faculty of Management & Finance</option>
                                    <option value="Faculty of Medicine <?php echo ($data['faculty'] === 'Faculty of Medicine') ? 'selected' : ''; ?>">Faculty of Medicine</option>
                                </select>

                                <label for="email">Email: </label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-signup" style="width: 50%; padding-left: 5px;" value="<?php echo $data['email']; ?>" required>

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

    <script>

    </script>
</body>
<!-- </html> -->