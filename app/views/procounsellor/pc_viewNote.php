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
                <div><img src="<?php echo IMG; ?>counsellor-sb.svg" alt="ug avatar" width="30" height="30" style="float: inline-end;"></div>
            </div>

            <div>

                <p class="p-regular-green">Note Details</p>
                <div class="card-white">
                    <div class="card-green-7">
                        <div>
                            <p class="p-regular-green" style="font-size: 18px;">Note No. :</p><p class="p-regular-grey" style="font-size: 15px;"> <?php echo $data['note']->note_id; ?></p><br>
                            <p class="p-regular-green" style="font-size: 18px;">Heading :</p><p class="p-regular-grey" style="font-size: 15px;"> <?php echo $data['note']->heading; ?></p><br>
                            <p class="p-regular-green" style="font-size: 18px;">Content : </p><p class="p-regular-grey" style="font-size: 15px;"> <?php echo $data['note']->content; ?></p><br>
                            <div class="btn-container-2">
                                <form action="<?php echo URLROOT; ?>Procounsellor/deleteNote/<?php echo $data['note']->note_id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete the note?')">
                                    <button type="submit" class="button-danger no-underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function cancelEdit() {
            document.getElementById('timeslotForm').reset();
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>