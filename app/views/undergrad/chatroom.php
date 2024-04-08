<?php $currentPage = 'chats'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Chats</title>
</head>
<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Chats</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div class="subgrid-2">
                <div class="card-white">
                    
                    <div class="chat-row" style="border: 1px solid black;">
                        <div class="">
                            <div class="" id='chat-window'></div>
                            <div id='typing'></div>
                            <div id='form' class='row rounded-pill shadow'>
                                <input class='col-8 rounded-pill  p-1 ps-3  border-0' onkeyup='typing()' id='comment-input' type='text' placeholder='comment'>
                                <button id='send-button' class='btn btn-primary rounded-pill shadow col-4 ' onclick='send()'>Send</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</body>