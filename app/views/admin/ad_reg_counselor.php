<!-- <!DOCTYPE html>
<html lang="en"> -->
    <?php $currentPage = 'ad_reg_counselor'; ?>
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
                        <p class="p-regular">Create Account (Counselor)</p>

                        <div class="card-green">
                            <form action="<?php echo URLROOT;?>admin/ad_reg_counselor" method="POST">
                                <div style="font-size: 15px;">

                                    <label for="coun_type">Type (Academic/ Professional): </label>
                                    <input type="text" name="coun_type" placeholder="Enter type" class="<?php echo (!empty($data['coun_type_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['coun_type']; ?>">
                                    <p class="p-error"><?php echo $data['coun_type_err']; ?></p><br>

                                    <label for="fname">First Name: </label>
                                    <input type="text" name="fname" placeholder="Enter First Name" class="<?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fname']; ?>">
                                    <p class="p-error"><?php echo $data['fname_err']; ?></p><br>

                                    <label for="lname">Last Name: </label>
                                    <input type="text" name="lname" placeholder="Enter Last Name" class="<?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
                                    <p class="p-error"><?php echo $data['lname_err']; ?></p><br>

                                    <label for="gender">Gender (Male/ Female): </label>
                                    <input type="text" name="gender" placeholder="Enter type" class="<?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['gender']; ?>">
                                    <p class="p-error"><?php echo $data['gender_err']; ?></p><br>

                                    <label for="dob">Birthday: </label>
                                    <input type="text" name="dob" placeholder="YYYY-MM-DD" class="<?php echo (!empty($data['dob_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['dob']; ?>">
                                    <p class="p-error"><?php echo $data['dob_err']; ?></p><br>

                                    <label for="university">University: </label>
                                    <input type="text" name="university" placeholder="Enter University" class="<?php echo (!empty($data['university_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['university']; ?>">
                                    <p class="p-error"><?php echo $data['university_err']; ?></p><br>

                                    <label for="faculty">Faculty: </label>
                                    <input type="text" name="faculty" placeholder="Enter Faculty" class="<?php echo (!empty($data['faculty_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['faculty']; ?>">
                                    <p class="p-error"><?php echo $data['faculty_err']; ?></p><br>

                                    <label for="email">Email: </label>
                                    <input type="text" name="email" placeholder="Enter Email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                                    <p class="p-error"><?php echo $data['email_err']; ?></p><br>
       
                                    <label for="username">Username: </label>
                                    <input type="text" name="username" placeholder="Enter Username" class="<?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                                    <p class="p-error"><?php echo $data['username_err']; ?></p><br>

                                    <label for="password">Password: </label>
                                    <input type="password" name="password" placeholder="Enter Password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                    <p class="p-error"><?php echo $data['password_err']; ?></p><br>

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