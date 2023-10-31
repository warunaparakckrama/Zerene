<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>main.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?></title>
</head>
    <body>
        <section class="sec-signup">
            <div class="grid-signup-1">
                <p class="p-regular">Undergraduate</p>
                <p class="p-bold" style="font-size: 50px; padding-bottom: 10px;">Sign Up</p>
                <p style="padding-bottom: 10px;">Enter following details to create your free account!</p>
                <form action="<?php echo URLROOT;?>/users/register" method="POST">
                    <div class="grid-signup-form">
                        <label for="age">Age: <sup>*</sup></label>
                        <input type="text" id="signup-age" name="age" placeholder="Age" class="form-signup <?php echo (!empty($data['age_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['age']; ?>">
                        <!-- <p><?php echo $data['age_err']; ?></p> -->
                        <label for="gender">Gender: <sup>*</sup></label>
                        <input type="text" id="signup-gender" name="gender" placeholder="Gender" class="form-signup <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['gender']; ?>">
                        <!-- <p><?php echo $data['gender_err']; ?></p> -->
                        <label for="email">Student Mail: <sup>*</sup></label>
                        <input type="text" id="signup-stumail" name="email" placeholder="Student Mail" class="form-signup <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                        <!-- <span class="invalid-feedback"><?php echo $data['email_err']; ?></span> -->
                        <label for="university">University: <sup>*</sup></label>
                        <input type="text" id="signup-uni" name="university" placeholder="University" class="form-signup <?php echo (!empty($data['university_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['university']; ?>">
                        <!-- <span class="invalid-feedback"><?php echo $data['university_err']; ?></span> -->
                        <label for="faculty">Faculty: <sup>*</sup></label>
                        <input type="text" id="signup-fac" name="faculty" placeholder="Faculty" class="form-signup <?php echo (!empty($data['faculty_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['faculty']; ?>">
                        <!-- <span class="invalid-feedback"><?php echo $data['faculty_err']; ?></span> -->
                        <label for="year">Year of Study: <sup>*</sup></label>
                        <input type="text" id="signup-year" name="year" placeholder="Year of Study" class="form-signup <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['year']; ?>">
                        <!-- <span class="invalid-feedback"><?php echo $data['year_err']; ?></span> -->
                        <label for="username">Username: <sup>*</sup></label>
                        <input type="text" id="signup-username" name="username" placeholder="Username" class="form-signup <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                        <!-- <span class="invalid-feedback"><?php echo $data['username_err']; ?></span> -->
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" id="signup-password" name="password" placeholder="Create Password" class="form-signup <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <!-- <span class="invalid-feedback"><?php echo $data['password_err']; ?></span> -->
                        <label for="password">Re-enter Password: <sup>*</sup></label>
                        <input type="password" id="signup-rpassword" name="confirm_password" placeholder="Re-enter Password" class="form-signup <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                        <!-- <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span> -->
                        <button class="button-main" style="margin-left: 0px;" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="grid-signup-2">
                <img src="<?php echo IMG;?>signup.svg" alt="signup" width="400" height="400.53">
                <p class="p-regular">Already have an Account? <a href="<?php echo URLROOT;?>users/login" style="color: var(--zerene-black);">Log in</p>
            </div>
        </section>
    </body>
</html>