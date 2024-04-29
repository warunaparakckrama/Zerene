<?php
$currentPage = 'pc_undergrad';
$undergrad = $data['undergrad'];
$direct = $data['direct'];
$note = $data['note'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Undergraduates</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Undergraduates</p>
                </div>
                <div><img src="<?php echo IMG; ?>counsellor-sb.svg" alt="ug avatar" width="30" height="30" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Undergraduate Details</p>
                <div class="card-white">
                    <div class="card-green-2">
                        <div>
                            <img src="<?php echo IMG; ?>ug.svg" alt="profile picture" class="card-profile-2">
                        </div>
                        <div style="font-size: 18px;">
                            <p class="p-regular-green" style="font-size: 20px; margin-bottom: -5px;"><?php echo $undergrad->username; ?></p>
                            <p class="p-light-grey" style="margin-bottom: -10px;"><?php echo $undergrad->gender . ' | ' . $undergrad->age . ' '; ?>years</p>
                            <p class="p-light-grey">Year <?php echo $undergrad->study_year; ?> Undergraduate | <?php echo $undergrad->faculty; ?></p>
                            <p class="p-regular-green" style="margin-bottom: 10px; font-size: 15px;"><?php echo $undergrad->email; ?></p>
                            <div style="display: flex; flex-direction: row; gap: 10px;">
                                <?php if ($direct == 1) : ?>
                                    <button class="button-second" disabled>Directed to Psychiatrist</button>
                                <?php else : ?>
                                    <a href="<?php echo URLROOT; ?>Procounsellor/ugDirects/<?php echo $undergrad->user_id; ?>" style="text-decoration: none;">
                                        <button class="button-main">Direct to Psychiatrist</button>
                                    </a>
                                <?php endif; ?>
                                <!-- <a href="<?php echo URLROOT; ?>Procounsellor/ugDirects/<?php echo $undergrad->user_id; ?>" style="text-decoration: none;"><button class="button-main">Direct to Psychiatrist</button></a> -->
                                <a href="<?php echo URLROOT; ?>procounsellor/pc_createNotes/<?php echo $undergrad->user_id; ?>" style="text-decoration: none;"><button class="button-main">Add a note</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="p-regular-green">Created Notes of <?php echo $undergrad->username; ?></p>
                    <div class="card-white-scroll" style="height: 300px;">
                    <?php foreach ($data['note'] as $note) : ?>
                        <div class="card-green">
                                <img src="<?php echo IMG; ?>note1.svg" alt="pro pic" class="">
                                <div>
                                    <p class="p-regular-green" style="margin-bottom: -5px;"><?php echo $note->heading?></p></a>
                                    <p class="p-regular" style="color:var(--zerene-grey); font-size: 15px"><?php echo $note->created_at?></p>
                                </div>
                                <div class="btn-container">
                                    <a href="<?php echo URLROOT;?>procounsellor/pc_viewNote/<?php echo $note->note_id;?>" style="text-decoration: none;"><button class="button-main">View</button></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>