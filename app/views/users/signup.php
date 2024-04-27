<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>main.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <section class="sec-signup">
        <div class="grid-signup-1">
            <p class="p-regular" style="margin-bottom: -20px;">Undergraduate</p>
            <p class="p-bold" style="font-size: 50px; padding-bottom: 10px;">Sign Up</p>
            <p style="padding-bottom: 10px;" class="p-regular-grey">Enter following details to create your free account!</p>

            <form action="<?php echo URLROOT; ?>users/signup" method="POST">
                <div class="grid-signup-form">

                    <label for="age">Age:</label>
                    <input type="number" min="18" max="25" name="age" placeholder="Age" class="form-signup" value="<?php echo $data['age']; ?>" required>
                    
                    <label for="gender">Gender: </label>
                    <select name="gender" id="signup-gender" class="option">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Not specified">Prefer not to say</option>
                    </select>
                    
                    <label for="email">Student Mail:</label>
                    <input type="email" id="signup-stumail" name="email" placeholder="Student Mail" class="form-signup" value="<?php echo $data['email']; ?>" required>
                    

                    <label for="university">University:</label>
                    <select name="university" id="signup-uni" class="option">
                        <option value="University of Colombo">University of Colombo</option>
                    </select>
                    

                    <label for="university">Faculty:</label>
                    <select name="faculty" class="option">
                        <option value="Faculty of Arts">Faculty of Arts</option>
                        <option value="Faculty of Law">Faculty of Law</option>
                        <option value="Faculty of Science">Faculty of Science</option>
                        <option value="Faculty of Statistics">Faculty of Statistics</option>
                        <option value="School of Computing" selected>School of Computing</option>
                        <option value="Faculty of Management & Finance">Faculty of Management & Finance</option>
                        <option value="Faculty of Medicine">Faculty of Medicine</option>
                    </select>
                    

                    <label for="year">Study Year: </label>
                    <select name="year" id="signup-year" class="option">
                        <option value="1">1</option>
                        <option value="2" selected>2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    

                    <label for="username">Username:</label>
                    <input type="text" id="signup-username" name="username" placeholder="Username" class="form-signup" value="<?php echo $data['username']; ?>" required>
                    

                    <label for="password">Password:</label>
                    <input type="password" id="signup-password" name="password" placeholder="Create Password" class="form-signup" value="<?php echo $data['password']; ?>" required>
                    

                    <label for="confirm_password">Re-enter:</label>
                    <input type="password" id="signup-rpassword" name="confirm_password" placeholder="Re-enter Password" class="form-signup" value="<?php echo $data['confirm_password']; ?>" required>
                    
                    <div class="btn-container-2">
                        <button class="button-main" style="margin-left: 0px;" type="submit">Sign Up</button>
                        <button class="button-danger" style="margin-left: 0px;" type="reset">Cancel</button>
                    </div>
                    <p class="p-error" style="font-size: 15px;"><?php echo isset($data['signup_alert']) ? $data['signup_alert'] : ''; ?></p>

                </div>
            </form>
        </div>
        <div class="grid-signup-2">
            <img src="<?php echo IMG; ?>signup.svg" alt="signup" width="400" height="400.53">
            <p class="p-regular">Already have an Account? <a href="<?php echo URLROOT; ?>users/login" style="color: var(--zerene-black);">Log in</a></p>
            <p class="p-regular-green" style="font-size: 15px;">Back to <a href="<?php echo URLROOT;?>" style="color: var(--zerene-green);">Home</a></p>
        </div>
    </section>
</body>
<!-- </html> -->