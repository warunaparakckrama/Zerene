<html>
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
                    <h1 class="h1-light" style="font-size: 100px;">Find Your</h1>
                    <h1 class="h1-light" style="font-size: 100px;">Zen With</h1>
                    <h1 class="h1-bold" style=" padding-bottom: 5px; font-size: 100px;">Zerene</h1>
                </div>
                <div>
                    <p class="p-regular">Mental Healthcare Services Platform,</p>
                    <p class="p-regular">Exclusively for Undergraduates...</p>
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
                    <h1 class="h1-bold" style="font-size: 100px;">Welcome!</h1>
                </div>
                <div>
                    <p class="p-regular" style="width: 440px;">Lorem ipsum dolor sit amet consectetur. Mattis mauris nulla pretium mauris auctor euismod. Morbi egestas nec duis leo turpis massa massa faucibus. Id arcu odio facilisis elementum. Pretium justo quis amet blandit.</p>
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
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Professional</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Counselling</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Academic</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Counselling</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Psychiatrist</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Consulting</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
            </div>

            <div class="home-grid-right" style="padding-top: 110px;">
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Standard</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Questionaaires</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Educational</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Resources</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Mobile</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Application</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </section>

        <section class="sec-home" id="contact">
            <div class="home-grid-left">
                <h1 class="h1-bold" style="font-size: 80px;">Get in Touch</h1>
                <div>
                    <form action="">
                        <label for="name">Name</label><br>
                        <input type="text" id="name" name="name" class="form"><br>
                        <label for="text">Email</label><br>
                        <input type="text" id="email" name="email" class="form"><br>
                        <label for="subject">Subject</label><br>
                        <input type="text" id="subject" name="subject" class="form"><br>
                        <label for="message">Message</label><br>
                        <textarea name="message" id="message" cols="50" rows="5" class="form"></textarea><br>
                        <input type="submit" value="Submit" class="button-main">
                    </form>
                </div>
            </div>
            
            <div class="home-grid-right">
                <img src="<?php echo IMG;?>contact.svg" alt="contact">
            </div>
        </section>

    </body>
</html>