<?php $currentPage = 'pc_undergrad';
$note = $data['note'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name']; ?> | View Notes</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">View Notes</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>

                <p class="p-regular-green">Note Details</p>
                <div class="card-white">
                    <div class="card-green-7">
                        <div>
                            <p class="p-regular-green" style="font-size: 15px;"><b>Note No. :</b></p><p class="p-regular-grey" style="font-size: 15px;"> <?php echo $data['note']->note_id; ?></p>
                            <p class="p-regular-green" style="font-size: 15px;"><b>Heading :</b></p><p class="p-regular-grey" style="font-size: 15px;"> <?php echo $data['note']->heading; ?></p>
                            <p class="p-regular-green" style="font-size: 15px;"><b>Content : </b></p><p class="p-regular-grey" style="font-size: 15px;"> <?php echo $data['note']->content; ?></p><br>
                            <div class="btn-container-2">
                                <form action="<?php echo URLROOT; ?>Procounsellor/deleteNote/<?php echo $data['note']->note_id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete the note?')">
                                    <button type="submit" class="button-danger no-underline" onclick="return confirm('Are you sure you want to delete the note?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>