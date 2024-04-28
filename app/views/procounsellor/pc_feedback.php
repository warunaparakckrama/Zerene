<?php $currentPage = 'pc_feedback'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?php echo SITENAME; ?> | Feedback</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-pc.php'; ?>
        </div>
        <div class="grid-1">

            <div class="subgrid-1">
                <p class="p-title" style="font-size: 40px;">Feedback</p>
                <div></div>
            </div>

            <div>


                <div class="card-white">
                    <p class="p-regular-green">Submit Feedback/ Complaints</p>
                    <div class="card-green-5">
                        <form action="<?php echo URLROOT; ?>Procounsellor/sentFeedback/<?php echo $_SESSION['user_id']; ?>" method="POST">
                            <div style="font-size: 18px; color: var(--zerene-green)">
                                <label for="type">Type: </label>
                                <select name="type" class="type">
                                    <option value="feedback">Feedback</option>
                                    <option value="complaint">Complaint</option>
                                </select><br><br>

                                <label for="title">Title: </label>
                                <input type="text" name="title" placeholder="Enter your title" style="width: 50%;" class="password-box"><br><br>

                                <label for="content">Content: </label>
                                <textarea name="content" rows="10" class="textarea-1"></textarea><br><br>

                                <div class="btn-container-2">
                                    <a href="" style="text-decoration: none;"><button class="button-main" type="submit" onclick="showAlert()">Submit</button></a>
                                    <a href="" style="text-decoration: none;"><button class="button-danger" type="reset">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <script>
        // Function to show a SweetAlert success message
        function showAlert() {
            Swal.fire({
                text: "Feedback sent successfuly!",
                icon: "success"
            });
            // Store the status of the alert in local storage
            localStorage.setItem('alertShown', 'true');
        }

        // Check if the alert was shown previously
        window.addEventListener('load', function() {
            if (localStorage.getItem('alertShown')) {
                showAlert();
                // Clear the alert status from local storage after showing
                localStorage.removeItem('alertShown');
            }
        });
    </script>

</body>