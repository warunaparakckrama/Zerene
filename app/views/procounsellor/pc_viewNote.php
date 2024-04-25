<?php $currentPage = 'pc_viewNote';
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
            </div>

            <div>

                <div class="card-white">
                    <p class="p-regular">Note Details</p>
                    <div class="card-green-7">
                        <div>
                            <p class="p-regular-green">Note No. :</p><p> <?php echo $data['note']->note_id; ?></p><br>
                            <p class="p-regular-green">Heading :</p><p> <?php echo $data['note']->heading; ?></p><br>
                            <p class="p-regular-green">Content : </p> <p> <?php echo $data['note']->content; ?></p><br>
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