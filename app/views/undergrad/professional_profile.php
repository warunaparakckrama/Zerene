<?php
$currentPage = 'professionals';
$counsellor = $data['counsellor'];
$doctor = $data['doctor'];
$request = $data['request'];
$id = $data['id'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Professionals</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Professional Profile</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>

            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Profile Details</p>
                    <div class="card-green-2">
                        <?php if ($counsellor !== null && $id === $counsellor->user_id) : ?>
                            <div>
                                <img src="<?php echo IMG; ?>counsellor.svg" alt="profile picture" class="card-profile-2">
                            </div>
                            <div>
                                <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $counsellor->first_name . ' ' . $counsellor->last_name; ?></p>
                                <p class="p-regular-grey" style=""><?php echo $counsellor->university . ' | ' . $counsellor->faculty; ?></p>
                                <p class="p-regular-grey" style="font-size: 15px; margin-bottom: 5px;"><?php echo $counsellor->email; ?></p>
                                <div style="display: flex; flex-direction: row; gap: 10px;">
                                    <?php if (empty($data['request']) || !in_array($counsellor->user_id, array_column($data['request'], 'to_user_id'))) : ?>
                                        <a href="<?php echo URLROOT; ?>Undergrad/MsgRequest/<?php echo $counsellor->user_id; ?>" style="text-decoration: none;"><button class="button-main">Message</button></a>
                                    <?php else : ?>
                                        <?php foreach ($data['request'] as $request) : ?>
                                            <?php if ($request->to_user_id == $counsellor->user_id) : ?>
                                                <?php if ($request->is_clicked == 1) : ?>
                                                    <button class="button-second">Chat Created</button>
                                                <?php else : ?>
                                                    <a href="<?php echo URLROOT; ?>Undergrad/MsgRequest/<?php echo $counsellor->user_id; ?>" style="text-decoration: none;"><button class="button-main">Message</button></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <?php if ($counsellor->coun_type === 'Academic') : ?>
                                        <a href="<?php echo URLROOT; ?>Undergrad/send_req_letter/<?php echo $counsellor->user_id; ?>" style="text-decoration: none;"><button class="button-main">Send a Request Letter</button></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php elseif ($doctor !== null && $id === $doctor->user_id) : ?>
                            <div>
                                <img src="<?php echo IMG; ?>doctor.svg" alt="profile picture" class="card-profile-2">
                            </div>
                            <div>
                                <p class="p-regular-green" style=" margin-bottom: -10px;"><?php echo $doctor->first_name . ' ' . $doctor->last_name; ?></p>
                                <p class="p-regular-grey" style="">Psychiatrist in charge on <?php echo $doctor->uni_in_charge ?></p>
                                <p class="p-regular-grey" style="font-size: 15px; margin-bottom: 5px;"><?php echo $doctor->email; ?> | <?php echo $doctor->contact_num; ?></p>
                                <div style="display: flex; flex-direction: row; gap: 10px;">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>

    </section>
</body>