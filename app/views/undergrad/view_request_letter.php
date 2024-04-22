<?php
$currentPage = 'request_letters';
$request_letter = $data['request_letter'];
$id = $data['id'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Request Letters</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Request Letters</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Content</p>
                    <div class="card-green-5">
                        <?php foreach ($data['request_letter'] as $request_letter) : ?>
                            <?php if ($request_letter->letter_id == $id) : ?>
                                <div style="font-size: 15px;">
                                    <p class="p-regular-green"><b>Subject: </b><?php echo $request_letter->subject; ?></p>
                                    <p class="p-regular-green"><b>Content: </b><?php echo $request_letter->content; ?></p>
                                    <p class="p-regular-green">
                                    <p class="p-regular-green"><b>Documents: </b><a href="<?php echo $request_letter->document_path;?>" download="attachment">Download</a></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>