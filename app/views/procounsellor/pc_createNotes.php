<?php
$currentPage = 'pc_createNotes';
$undergrad = $data['undergrad'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?php echo SITENAME; ?> | Notes</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Notes</p>
                </div>
                <div></div>
            </div>

            <div>
                <p class="p-regular-green">Create Notes</p>
                <div class="card-white">
                    <div class="card-green-5">
                        <form action="<?php echo URLROOT; ?>Procounsellor/createNotes/<?php echo $undergrad->user_id; ?>" method="post" id="noteForm">
                            <label for="heading">Heading:</label><br>
                            <input type="text" id="heading" name="heading" class="password-box" required><br>

                            <label for="content">Body:</label><br>
                            <textarea id="content" name="content" rows="15" cols="100" class="textarea-1" required></textarea><br>

                            <div class="btn-container-2">
                                <button class="button-main" type="submit" onclick="showAlert(event)">Submit</button>
                                <button class="button-danger" type="reset">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showAlert(e) {
            e.preventDefault();
            Swal.fire({
                text: "Note created Successfully!",
                icon: "success",
                confirmButtonColor: "#3d8994",
                background: "#E5F3F6"
            }).then((response)=>{
                document.getElementById("noteForm").submit();
            });
        }
    </script>
</body>