
<?php $currentPage = 'questionnaires'; 
    // session_start(); // Start PHP session
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Store submitted answers in session
        // $_SESSION['q8'] = $_POST['q8'];
        // $_SESSION['q9'] = $_POST['q9'];
        // $_SESSION['q10'] = $_POST['q10'];
        // $_SESSION['q11'] = $_POST['q11'];
        // $_SESSION['q12'] = $_POST['q12'];
        // $_SESSION['q13'] = $_POST['q13'];
        // $_SESSION['q14'] = $_POST['q14'];
        if (isset($_POST['q8'])) {
            $_SESSION['q8'] = $_POST['q8'];
        }
        if (isset($_POST['q9'])) {
            $_SESSION['q9'] = $_POST['q9'];
        }
        if (isset($_POST['q10'])) {
            $_SESSION['q10'] = $_POST['q10'];
        }
        if (isset($_POST['q11'])) {
            $_SESSION['q11'] = $_POST['q11'];
        }
        if (isset($_POST['q12'])) {
            $_SESSION['q12'] = $_POST['q12'];
        }
        if (isset($_POST['q13'])) {
            $_SESSION['q13'] = $_POST['q13'];
        }
        if (isset($_POST['q14'])) {
            $_SESSION['q14'] = $_POST['q14'];
        }
    }
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <div class="page" id="page-2">
        <body>
            <section class="sec-1">
                <div>
                    <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
                </div>
                <div class="grid-1">
                    
                    <div class="subgrid-1">
                        <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">DASS-21</p></div>
                        <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                    </div>
    
                    <div>
                        <div class="card-white">
                            <p class="p-regular">Questionnaire (2/3 Pages)</p>
                            <div class="card-green-4">
                                <form id="dass-21" action="<?php echo URLROOT;?>undergrad/dass21_3" method="POST">
                                    <div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">8.I was aware of dryness of my mouth</p>
                                            <label class="radio">
                                                <input type="radio" name="q8" value="0" <?php if(isset($_SESSION['q8']) && $_SESSION['q8'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q8" value="1" <?php if(isset($_SESSION['q8']) && $_SESSION['q8'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q8" value="2" <?php if(isset($_SESSION['q8']) && $_SESSION['q8'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q8" value="3" <?php if(isset($_SESSION['q8']) && $_SESSION['q8'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">9.I experienced breathing difficulty (e.g. excessively rapid breathing, breathlessness in the absence of physical exertion)</p>
                                            <label class="radio">
                                                <input type="radio" name="q9" value="0" <?php if(isset($_SESSION['q9']) && $_SESSION['q9'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q9" value="1" <?php if(isset($_SESSION['q9']) && $_SESSION['q9'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q9" value="2" <?php if(isset($_SESSION['q9']) && $_SESSION['q9'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q9" value="3" <?php if(isset($_SESSION['q9']) && $_SESSION['q9'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">10.I experienced trembling (e.g. in the hands)</p>
                                            <label class="radio">
                                                <input type="radio" name="q10" value="0" <?php if(isset($_SESSION['q10']) && $_SESSION['q10'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q10" value="1" <?php if(isset($_SESSION['q10']) && $_SESSION['q10'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q10" value="2" <?php if(isset($_SESSION['q10']) && $_SESSION['q10'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q10" value="3" <?php if(isset($_SESSION['q10']) && $_SESSION['q10'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">11.I was worried about situations in which I might panic and make a fool of myself</p>
                                            <label class="radio">
                                                <input type="radio" name="q11" value="0" <?php if(isset($_SESSION['q11']) && $_SESSION['q11'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q11" value="1" <?php if(isset($_SESSION['q11']) && $_SESSION['q11'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q11" value="2" <?php if(isset($_SESSION['q11']) && $_SESSION['q11'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q11" value="3" <?php if(isset($_SESSION['q11']) && $_SESSION['q11'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">12.I felt I was close to panic</p>
                                            <label class="radio">
                                                <input type="radio" name="q12" value="0" <?php if(isset($_SESSION['q12']) && $_SESSION['q12'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q12" value="1" <?php if(isset($_SESSION['q12']) && $_SESSION['q12'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q12" value="2" <?php if(isset($_SESSION['q12']) && $_SESSION['q12'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q12" value="3" <?php if(isset($_SESSION['q12']) && $_SESSION['q12'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">13.I was aware of the action of my heart in the absence of physical exertion (e.g. sense of heart rate increase, heart missing a beat)</p>
                                            <label class="radio">
                                                <input type="radio" name="q13" value="0" <?php if(isset($_SESSION['q13']) && $_SESSION['q13'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q13" value="1" <?php if(isset($_SESSION['q13']) && $_SESSION['q13'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q13" value="2" <?php if(isset($_SESSION['q13']) && $_SESSION['q13'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q13" value="3" <?php if(isset($_SESSION['q13']) && $_SESSION['q13'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">14.I felt scared without any good reason</p>
                                            <label class="radio">
                                                <input type="radio" name="q14" value="0" <?php if(isset($_SESSION['q14']) && $_SESSION['q14'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q14" value="1" <?php if(isset($_SESSION['q14']) && $_SESSION['q14'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q14" value="2" <?php if(isset($_SESSION['q14']) && $_SESSION['q14'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q14" value="3" <?php if(isset($_SESSION['q14']) && $_SESSION['q14'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div class="btn-container-2">
                                            <!-- <button class="button-main"><a href="<?php echo URLROOT;?>undergrad/dass21_1" style="text-decoration: none;">Previous</a></button> -->
                                            <button class="button-main" type="submit">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    
                </div>
            </section>
        </body>
    </div>
<!-- </html> -->