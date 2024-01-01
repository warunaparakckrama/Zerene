<!-- <!DOCTYPE html>
<html lang="en"> -->
    <?php $currentPage = 'ad_reg_counselor'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | Administrator</title>
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
                        <p class="p-regular">Create Account (Counsellor)</p>

                        <div class="card-green">
                            <form id="regcounsellor" action="<?php echo URLROOT;?>admin/ad_reg_counselor" method="POST">
                                <div style="font-size: 15px;">

                                    <!-- <label for="coun_type">Type (Academic/ Professional): </label>
                                    <input type="text" name="coun_type" placeholder="Enter type" class="<?php echo (!empty($data['coun_type_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['coun_type']; ?>">
                                    <p class="p-error"><?php echo $data['coun_type_err']; ?></p><br> -->

                                    <label for="age">Type: </label>
                                    <select name="coun_type" id="">
                                        <option value="Academic" <?php echo ($data['coun_type'] === 'Academic') ? 'selected' : ''; ?> >Academic</option>
                                        <option value="Professional" <?php echo ($data['coun_type'] === 'Professional') ? 'selected' : ''; ?> >Professional</option>
                                    </select>
                                    <p class="p-error"></p><br>

                                    <label for="fname">First Name: </label>
                                    <input type="text" name="fname" placeholder="Enter First Name" class="<?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fname']; ?>">
                                    <p class="p-error"><?php echo $data['fname_err']; ?></p><br>

                                    <label for="lname">Last Name: </label>
                                    <input type="text" name="lname" placeholder="Enter Last Name" class="<?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
                                    <p class="p-error"><?php echo $data['lname_err']; ?></p><br>

                                    <!-- <label for="gender">Gender (Male/ Female): </label>
                                    <input type="text" name="gender" placeholder="Enter type" class="<?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['gender']; ?>">
                                    <p class="p-error"><?php echo $data['gender_err']; ?></p><br> -->

                                    <label for="gender">Gender: </label>
                                    <select name="gender" id="">
                                        <option value="Male" <?php echo ($data['gender'] === 'Male') ? 'selected' : ''; ?> >Male</option>
                                        <option value="Female" <?php echo ($data['gender'] === 'Female') ? 'selected' : ''; ?> >Female</option>
                                    </select>
                                    <p class="p-error"></p><br>

                                    <label for="dob">Birthday: </label>
                                    <input type="date" name="dob" placeholder="" class="<?php echo (!empty($data['dob_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['dob']; ?>">
                                    <p class="p-error"></p><br>

                                    <!-- <label for="university">University: </label>
                                    <input type="text" name="university" placeholder="Enter University" class="<?php echo (!empty($data['university_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['university']; ?>">
                                    <p class="p-error"><?php echo $data['university_err']; ?></p><br> -->

                                    <label for="university">University: </label>
                                    <select name="university" id="">
                                        <option value="University of Colombo" <?php echo ($data['university'] === 'University of Colombo') ? 'selected' : ''; ?> >University of Colombo</option>
                                        <option value="University of Kelaniya" <?php echo ($data['university'] === 'University of Kelaniya') ? 'selected' : ''; ?> >University of Kelaniya</option>
                                        <option value="University of Moratuwa" <?php echo ($data['university'] === 'University of Moratuwa') ? 'selected' : ''; ?> >University of Moratuwa</option>
                                    </select>
                                    <p class="p-error"></p><br>

                                    <!-- <label for="faculty">Faculty: </label>
                                    <input type="text" name="faculty" placeholder="Enter Faculty" class="<?php echo (!empty($data['faculty_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['faculty']; ?>">
                                    <p class="p-error"><?php echo $data['faculty_err']; ?></p><br> -->

                                    <label for="faculty">Faculty: </label>
                                    <select name="faculty" id="">
                                        <option value="School of Computing" <?php echo ($data['faculty'] === 'School of Computing') ? 'selected' : ''; ?> >School of Computing</option>
                                        <option value="Faculty of Science" <?php echo ($data['faculty'] === 'Faculty of Science') ? 'selected' : ''; ?> >Faculty of Science</option>
                                        <option value="Faculty of Arts" <?php echo ($data['faculty'] === 'Faculty of Arts') ? 'selected' : ''; ?> >Faculty of Arts</option>
                                        <option value="Faculty of Management & Finance" <?php echo ($data['faculty'] === 'Faculty of Management & Finance') ? 'selected' : ''; ?> >Faculty of Management & Finance</option>
                                        <option value="Faculty of Law" <?php echo ($data['faculty'] === 'Faculty of Law') ? 'selected' : ''; ?> >Faculty of Law</option>
                                    </select>
                                    <p class="p-error"></p><br>

                                    <label for="email">Email: </label>
                                    <input type="text" name="email" placeholder="Enter Email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                                    <p class="p-error"><?php echo $data['email_err']; ?></p><br>
       
                                    <label for="username">Username: </label>
                                    <input type="text" name="username" placeholder="Enter Username" class="<?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                                    <p class="p-error"><?php echo $data['username_err']; ?></p><br>

                                    <label for="password">Password: </label>
                                    <input type="password" name="password" placeholder="Enter Password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                    <p class="p-error"><?php echo $data['password_err']; ?></p><br>

                                    <button class="button-main" type="submit" onclick="return confirmsubmit()">Register</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </section>

        <script>
            function confirmSubmit() {
                if (confirm("Are you sure you want to submit the form?")) {
                    document.getElementById("regcounsellor").submit();
                    return true; // Form will be submitted
                } else {
                    return false; // Form submission will be canceled
                }
                }
        </script>
    </body>
<!-- </html> -->