<?php $currentPage = 'ac_opletters'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name']; ?> | Opinion Letters</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Opinion Letters</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>


            <div>
                <div class="card-white">
                    <p class="p-regular">Recently recieved Documents</p>
                    <br>
                    <!-- <div class="card-green">
                        <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -10px;">Zerene_User07</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">University of Colombo School of Computing</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main"> <a href="<?php echo URLROOT; ?>academic/req_letter" class="a-name">Review</a> </button>
                            <button class="button-main"> <a href="<?php echo URLROOT; ?>academic/ac_undergraduate4" class="a-name"> create </a></button>
                        </div>
                    </div>
                    <div class="card-green">
                        <img src="<?php echo IMG; ?>ug-avatar2.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -10px;">Zerene_User12</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">University of Colombo School of Computing</p>
                        </div>
                        <div class="btn-container">
                            <button class="button-main">Review</button>
                            <button class="button-main"> <a href="<?php echo URLROOT; ?>academic/ac_undergraduate4" class="a-name"> Create </a></button>
                        </div>
                    </div> -->


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

                        <tbody>
                            <?php foreach ($data['rletter'] as $rletter) : ?>
                                <tr>
                                    <td><?php echo $rletter->request_id ?></td>
                                    <td><?php echo $rletter->title ?></td>
                                    <!-- <td><?php echo $rletter->content ?></td> -->
                                    <!-- <td><?php echo $rletter->file_name ?></td> -->
                                    <td><?php echo $rletter->ug_id ?></td>
                                    <!-- <td><?php echo $rletter->coun_id ?></td> -->
                                    <td><?php echo $rletter->date ?></td>
                                    <td>
                                        <div class="btn-container-2">
                                            <div class="btn-container">
                                                <a href="<?php echo URLROOT; ?>academic/req_letter/" class="a-name"><button class="button-main">Review</button></a>
                                                <a href="<?php echo URLROOT; ?>academic/ac_undergraduate4/<?php echo $rletter->ug_id ?>" class="a-name"><button class="button-main">Create</button></a>
                                                <!-- <a href="<?php echo URLROOT; ?>Admin/delFeedback/<?php echo $rletter->feedback_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a> -->
                                            </div>
                                        </div>                                                                                                                                                                                                                  
                                    </td>
                                </tr>
                        </tbody>
                        <?php endforeach; ?>

                    </table>

                </div>

                <br>
                <!-- //created letters -->
                <div>
                    <div class="card-white">
                        <p class="p-regular">created letters</p>
                        <div class="card-green">
                            <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                            <div>
                                <p class="p-regular" style="margin-bottom: -10px;">Zereneuser <?php echo $rletter->ug_id ?></p>
                                <p class="p-regular" style="color:var(--zerene-grey) ;"><?php echo $rletter->title ?></p>
                            </div>
                            <div class="btn-container">
                                <button class="button-main">view</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </section>
</body>