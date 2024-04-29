<?php
    $currentPage = 'ac_opletters'; 
    $letter = $data['letter'];
    
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo  SITENAME;?> | Opinion Letters</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Request Letter</p></div>
                <div><img src="<?php echo IMG; ?>counsellor-sb.svg" alt="ug avatar" width="30" height="30" style="float: inline-end;"></div>
            </div>

            <div class="card-white">
                <p class="p-regular-green">Letter View</p>
                <div class="card-green-5">
                    <div style="font-size: 15px;">
                        <p class="p-regular-green"><b>Subject: </b><?php echo $letter->subject;?></p>
                        <p class="p-regular-green"><b>Content: </b><?php echo $letter->content;?></p><br>
                        <?php $filename = basename($letter->document_path);?>
                            <p class="p-regular-green"><a href="http://localhost/zereneuploads/documents/<?php echo $filename;?> " download="attachment">Attachment</a></p>
                        <?php $dateTime = new DateTime($letter->sent_at); $formattedDateTime = $dateTime->format('jS M, y \|\ h:iA');?>
                        <p class="p-regular-green"><b>Sent At: </b><?php echo $formattedDateTime;?></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>

