<?php $currentPage = 'ac_undergrads'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name']; ?> | Undergraduates</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Undergraduates</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Your Faculty</p>
                        <?php foreach ($data['details'] as $rletter) : ?>
                                
                                
                                                                        
                    <div class="card-green">
                        <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <a href="<?php echo URLROOT; ?>academic/ac_undergraduate4" class="a-name">
                                <p><?php echo $rletter->username ?></p>
                            </a>
                            <p class="p-regular" style="margin-bottom: -10px;"></p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;"><?php echo $rletter->faculty ?></p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;"><?php echo $rletter->email ?></p>
                        </div>
                        <div style=" display:flex ; justify-content:center;gap:15px">
                            <button class="button-main">Past Records</button>
                            <button class="button-main">Profile</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- <div class="card-green">
                        <img src="<?php echo IMG; ?>ug-avatar2.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -10px;"><a href="./acundergraduate2.php" class="a-name">Zerene_User12</a></p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">University of Colombo School of Computing</p>
                        </div>
                        <div style=" display:flex ; justify-content:center;gap:15px">
                            <button class="button-main">Past Records</button>
                            <button class="button-main">Profile</button>
                        </div>
                    </div>
                    <div class="card-green">
                        <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -10px;"><a href="./acundergraduate2.php" class="a-name">Zerene_User05</a></p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">University of Colombo School of Computing</p>
                        </div>
                        <div style=" display:flex ; justify-content:center;gap:15px">
                            <button class="button-main">Past Records</button>
                            <button class="button-main">Profile</button>
                        </div>
                    </div> -->
                </div>

            </div>


        </div>

        <table class="table-1">
                        <thead>
                            <tr>
                                <th>req_id</th>
                                <th>Title</th>
                                <!-- <th>Content</th> -->
                                <!-- <th>file name</th> -->
                                <th>ug_id</th>
                                <!-- <th>coun_id</th> -->
                                <th>date</th>
                                <th></th>

                            </tr>
                        </thead>


                    </table>
    </section>


</body>