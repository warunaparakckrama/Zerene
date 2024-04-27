<?php
$currentPage = 'request_letters';
$request_letter = $data['request_letter'];
$counsellor = $data['counsellor'];

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
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Content</p>
                    <div class="card-green-5">
                        <div style="font-size: 15px;">
                            <p class="p-regular-green"><b>To Whom: </b><?php echo $counsellor->first_name.' '.$counsellor->last_name; ?></p>
                            <p class="p-regular-green"><b>Subject: </b><?php echo $request_letter->subject; ?></p><br>
                            <p class="p-regular-green"><b>Content: </b><?php echo $request_letter->content; ?></p><br>
                            <?php $filename = basename($request_letter->document_path);?>
                            <p class="p-regular-green"><b>Documents: </b><a href="http://localhost/zereneuploads/documents/<?php echo $filename;?> " download="attachment">Download</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>