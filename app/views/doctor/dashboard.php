<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="./doctor.css">
    <link rel="stylesheet" href="./doc_sidebar.css">
    <title>Document</title>
</head>
<body>
    <section class="sec-dashb">
        <div class="grid-container1">
            <?php
                include "./sidebar.php"
            ?>
        </div>
        <div class="grid-container2">
            <div class="sub-container4">
                <div class="sub-container5">
                    <p class="p-title" style= "font-size:40px";>Home</p>
                </div>
                <div class="sub-container6" style="gap: 50px;">
                        <button class="notify">
                            <img src="../images/search.svg" alt="notification" width="25" height="25">
                        </button>
                        <button class="notify">
                            <img src="../images/bell.svg" alt="notification" width="25" height="25">
                        </button>
                </div>
            </div>
            <div class="sub-container4">
                <div class="sub-container5">
                    <p class="p-bold-grey" style="font-size:100px; line-height:80px;">Hello</p>
                    <p class="p-regular-grey" style="font-size:80px; line-height:80px; padding-bottom:80px;">champ!</p>
                    <p class="p-regular" >hope you're having a good day...</p>
                    <p class="p-regular" >off to a great start, Shall we...</p>
                    <div style="display:flex; flex-direction: row;">
                    <button class="button-main" style="margin-left:0px">View Profile</button>
                    <button class="button-main">Undergraduates</button>
                    </div>
                </div>
                <div class="sub-container5" style="justify-content:center;">
                    <img src="../images/doc-home.svg" alt="doc home" width="338" height="461">
                </div>
            </div>
        </div>
    </div>
    </section>
</body>
</html>