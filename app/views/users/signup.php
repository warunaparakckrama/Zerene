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

                <form action="<?php echo URLROOT;?>users/signup" method="POST">
                    <div class="grid-signup-form">
                        
                        <label for="age">Age: <sup>*</sup></label>
                        <input type="text" id="signup-age" name="age" placeholder="Age" class="form-signup <?php echo (!empty($data['age_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['age']; ?>">
                        <p class="p-error"><?php echo $data['age_err']; ?></p>

                        <!-- <label for="gender">Gender: <sup>*</sup></label>
                        <input type="text" id="signup-gender" name="gender" placeholder="Gender" class="form-signup <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['gender']; ?>">
                        <p class="p-error"><?php echo $data['gender_err']; ?></p> -->

                        <label for="age">Gender: </label>
                        <select name="gender" id="signup-gender">
                            <option value="Male" <?php echo ($data['gender'] === 'Male') ? 'selected' : ''; ?> >Male</option>
                            <option value="Female" <?php echo ($data['gender'] === 'Female') ? 'selected' : ''; ?> >Female</option>
                            <option value="Other" <?php echo ($data['gender'] === 'Other') ? 'selected' : ''; ?> >Prefer not to say</option>
                        </select>
                        <p class="p-error"></p>

                        <label for="email">Student Mail: <sup>*</sup></label>
                        <input type="text" id="signup-stumail" name="email" placeholder="Student Mail" class="form-signup <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                        <p class="p-error"><?php echo $data['email_err']; ?></p>

                        <!-- <label for="university">University: <sup>*</sup></label>
                        <input type="text" id="signup-uni" name="university" placeholder="University" class="form-signup <?php echo (!empty($data['university_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['university']; ?>">
                        <p class="p-error"><?php echo $data['university_err']; ?></p> -->

                        <label for="university">University</label>
                        <select name="university" id="signup-uni">
                            <option value="University of Colombo" <?php echo ($data['university'] === 'University of Colombo') ? 'selected' : ''; ?> >University of Colombo</option>
                            <option value="University of Kelaniya" <?php echo ($data['university'] === 'University of Kelaniya') ? 'selected' : ''; ?> >University of Kelaniya</option>
                            <option value="University of Jayawardhanapura" <?php echo ($data['university'] === 'University of Jayawardhnapura') ? 'selected' : ''; ?> >University of Jayawardhanapura</option>
                        </select>
                        <p class="p-error"></p>

                        <!-- <label for="faculty">Faculty: <sup>*</sup></label>
                        <input type="text" id="signup-fac" name="faculty" placeholder="Faculty" class="form-signup <?php echo (!empty($data['faculty_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['faculty']; ?>">
                        <p class="p-error"><?php echo $data['faculty_err']; ?></p> -->

                        <label for="university">Faculty</label>
                        <select name="faculty" id="signup-fac">
                            <option value="Faculty of Science" <?php echo ($data['faculty'] === 'Faculty of Science') ? 'selected' : ''; ?> >Faculty of Science</option>
                            <option value="Faculty of Arts" <?php echo ($data['faculty'] === 'Faculty of Arts') ? 'selected' : ''; ?> >Faculty of Arts</option>
                            <option value="Faculty of Management & Finance" <?php echo ($data['faculty'] === 'Faculty of Management & Finance') ? 'selected' : ''; ?> >Faculty of Management & finance</option>
                            <option value="School of Computing" <?php echo ($data['faculty'] === 'School of Computing') ? 'selected' : ''; ?> >School of Computing*(UOC)</option>
                        </select>
                        <p class="p-error"></p>

                        <!-- <label for="year">Study Year: <sup>*</sup></label>
                        <input type="text" id="signup-year" name="year" placeholder="Year of Study" class="form-signup <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['year']; ?>">
                        <p class="p-error"><?php echo $data['year_err']; ?></p> -->

                        <label for="year">Study Year: </label>
                        <select name="year" id="signup-year">
                            <option value="1" <?php echo ($data['year'] === '1') ? 'selected' : ''; ?> >1</option>
                            <option value="2" <?php echo ($data['year'] === '2') ? 'selected' : ''; ?> >2</option>
                            <option value="3" <?php echo ($data['year'] === '3') ? 'selected' : ''; ?> >3</option>
                            <option value="4" <?php echo ($data['year'] === '4') ? 'selected' : ''; ?> >4</option>
                        </select>
                        <p class="p-error"></p>

                        <label for="username">Username: <sup>*</sup></label>
                        <input type="text" id="signup-username" name="username" placeholder="Username" class="form-signup <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                        <p class="p-error"><?php echo $data['username_err']; ?></p>

                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" id="signup-password" name="password" placeholder="Create Password" class="form-signup <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <p class="p-error"><?php echo $data['password_err']; ?></p>

                        <label for="confirm_password">Re-enter: <sup>*</sup></label>
                        <input type="password" id="signup-rpassword" name="confirm_password" placeholder="Re-enter Password" class="form-signup <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                        <p class="p-error"><?php echo $data['confirm_password_err']; ?></p>

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