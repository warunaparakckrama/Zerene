<html>
    <head>
        <title><?php echo SITENAME;?></title>
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    </head>

    <body>
        <div>
        <?php require APPROOT . '/views/inc/navbar.php'; ?>
        </div>
        <section class="section" id="home">
            <div class="sec-div-left" style="align-items: left;">
                <div style="line-height: 80px; width:fit-content">
                    <h1 class="h1-light">Find Your</h1>
                    <h1 class="h1-light">Zen With</h1>
                    <h1 class="h1-bold" style=" padding-bottom: 5px; font-size: 100px;">Zerene</h1>
                </div>
                <div>
                    <p class="p-regular" style="width: 440px;">online mental health care system.stibulum tortor metus </p>
                </div>
                <div style="display:flex; flex-direction: row;">
                    <a href="./login.php" style="text-decoration: none;"><button class="button-main">Log in</button></a>
                    <a href="./signup.php" style="text-decoration: none;"><button class="button-main">Sign up</button></a>
                </div>
            </div>
            <div class="sec-div-right" style="align-items: center;">
                <img src="<?php echo IMG;?>home.svg" width="500px" height="500px">
            </div>
        </section>

        <section class="section" id="about">
            <div class="sec-div-left" style="align-items: left;">
                <div style="line-height: 80px; width:fit-content">
                    <h1 class="h1-bold" style="font-size: 100px;">Welcome!</h1>
                </div>
                <div>
                    <p class="p-regular" style="width: 440px;">Lorem ipsum dolor sit amet consectetur. Mattis mauris nulla pretium mauris auctor euismod. Morbi egestas nec duis leo turpis massa massa faucibus. Id arcu odio facilisis elementum. Pretium justo quis amet blandit.</p>
                </div>
                <div style="display:flex; flex-direction: row;">
                    <button class="button-main">Log in</button>
                    <button class="button-main">Sign up</button>
                </div>
            </div>
            <div class="sec-div-right" style="align-items: center;">
                <img src="<?php echo IMG;?>About.svg" width="500px" height="500px">
            </div>
        </section>

        <section class="section" id="services">
            <div class="sec-div-left" style="align-items: left;">
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

            <div class="sec-div-right" style="align-items: center; padding-top: 115px;">
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Standard</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Questionaaires</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Educational</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Resources</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
                <div style="padding-bottom: 25px;">
                    <p class="p-bold" style="width: fit-content; line-height:20px;">Mobile</p>
                    <p class="p-bold" style="width: fit-content; line-height:20px; padding-bottom: 5px;">Application</p>
                    <p class="p-regular" style="width: 400px;">Lorem ipsum dolor sit amet consectetur. lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </section>

        <section class="section" id="contact">
            <div class="sec-div-left" style="align-items: left;">
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
            <div class="sec-div-right" style="align-items: center;">
                <img src="<?php echo IMG;?>contact.svg" alt="contact">
            </div>
        </section>
    </body>
</html>