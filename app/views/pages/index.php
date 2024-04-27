
    <head>
        <title><?php echo SITENAME;?></title>
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>

    <body>
        <div>
        <?php require APPROOT . '/views/inc/navbar.php'; ?>
        </div>
        <section class="sec-home" id="home">
            <div class="home-grid-left">
                <div style="line-height: 80px;">
                    <h1 class="h1-light" style=" font-size: 100px;">Find Your</h1>
                    <h1 class="h1-light" style=" font-size: 100px;">Zen With</h1>
                    <h1 class="h1-bold" style=" padding-bottom: 5px; font-size: 100px;">Zerene</h1>
                </div>
                <div>
                    <p class="p-regular-grey">Mental Healthcare Services Application,</p>
                    <p class="p-regular-grey">Exclusively for Undergraduates...</p>
                </div>
                <div style="display: flex; flex-direction: row; gap: 10px;">
                    <a href="<?php echo URLROOT; ?>users/login" style="text-decoration: none;"><button class="button-main">Log in</button></a>
                    <a href="<?php echo URLROOT; ?>users/signup" style="text-decoration: none;"><button class="button-main">Sign up</button></a>
                </div>
            </div>
            <div class="home-grid-right">
                <img src="<?php echo IMG;?>home.svg" width="500px" height="500px">
            </div>
        </section>

        <section class="sec-home" id="about">
            <div class="home-grid-left">
                <div style="line-height: 80px; width:fit-content">
                    <h1 class="h1-bold" style="font-size: 100px; margin-bottom: 10px;">Welcome!</h1>
                </div>
                <div>
                    <p class="p-regular-grey" style="font-size: 18px; width: 500px;">Discover a supportive space for Undergraduates where you can connect with student counselors effortlessly, prioritizing your mental well-being. Break free from stigma and seek the help you deserve. Join us on this journey toward a healthier undergraduate experience. Welcome to Zerene &trade;</p>
                </div>
            </div>
            <div class="home-grid-right">
                <img src="<?php echo IMG;?>About.svg" width="500px" height="500px">
            </div>
        </section>

        <section class="sec-home" id="services">
            <div class="home-grid-left">
                <div style="line-height: 80px; width:fit-content">
                    <h1 class="h1-bold" style="font-size: 80px; padding-bottom: 40px;">Our Services</h1>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px;">Professional</p>
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px; padding-bottom: 5px;">Counselling</p>
                    <p class="p-regular-grey" style="width: 400px;">To assist you with your daily mental health struggles.</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px;">Academic</p>
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px; padding-bottom: 5px;">Counselling</p>
                    <p class="p-regular-grey" style="width: 400px;">To Ease the academic related processes with your faculty counsellors.</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px;">Psychiatrist</p>
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px; padding-bottom: 5px;">Consulting</p>
                    <p class="p-regular-grey" style="width: 400px;">To guide you with proper consultation & prescriptions.</p>
                </div>
            </div>

            <div class="home-grid-right" style="padding-top: 110px;">
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="color: var(--zerene-green);width: fit-content; line-height:20px;">Standard</p>
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px; padding-bottom: 5px;">Questionaaires</p>
                    <p class="p-regular-grey" style="width: 400px;">To assess your mental health situations more precisely.</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px;">Live</p>
                    <p class="p-bold" style="color: var(--zerene-green); width: fit-content; line-height:20px; padding-bottom: 5px;">Chat Feature</p>
                    <p class="p-regular-grey" style="width: 400px;">To ease the communication with your Healthcare Professionals</p>
                </div>
                
            </div>
        </section>

        <section class="sec-home" id="contact">
            <div class="home-grid-left">
                <h1 class="h1-bold" style="font-size: 80px;">Get in Touch</h1>
                <div>
                    <form action="<?php echo URLROOT;?>Pages/Contactus" method="POST">
                        <label for="name" class="p-regular-grey">Name: </label><br>
                        <input type="text" id="name" name="name" class="input" required><br>

                        <label for="text" class="p-regular-grey">Email: </label><br>
                        <input type="email" id="email" name="email" class="input" required><br>

                        <label for="subject" class="p-regular-grey">Subject: </label><br>
                        <input type="text" id="subject" name="subject" class="input" required><br>

                        <label for="message" class="p-regular-grey">Message: </label><br>
                        <textarea name="message" id="message" cols="51" rows="5" class="form-signup" style="margin-bottom: 10px;" required></textarea><br>
                        <div class="btn-container-2">
                            <button class="button-main" type="submit">Submit</button>
                            <button class="button-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="home-grid-right">
                <img src="<?php echo IMG;?>contact.svg" alt="contact">
            </div>
        </section>

    </body>
