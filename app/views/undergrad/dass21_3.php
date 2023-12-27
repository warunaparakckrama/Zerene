
<?php $currentPage = 'questionnaires'; 
    // session_start(); // Start PHP session
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Store submitted answers in session
        // $_SESSION['q15'] = $_POST['q15']; 
        // $_SESSION['q16'] = $_POST['q16']; 
        // $_SESSION['q17'] = $_POST['q17']; 
        // $_SESSION['q18'] = $_POST['q18']; 
        // $_SESSION['q19'] = $_POST['q19'];
        // $_SESSION['q20'] = $_POST['q20']; 
        // $_SESSION['q21'] = $_POST['q21'];
    }
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <div class="page" id="page-3">
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
                            <p class="p-regular">Questionnaire (3/3 Pages)</p>
                            <div class="card-green-4">
                                <form id="dass-21" action="" method="POST">
                                    <div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">15.I couldn’t seem to experience any positive feeling at all</p>
                                            <label class="radio">
                                                <input type="radio" name="q15" value="0" <?php if(isset($_SESSION['q15']) && $_SESSION['q15'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q15" value="1" <?php if(isset($_SESSION['q15']) && $_SESSION['q15'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q15" value="2" <?php if(isset($_SESSION['q15']) && $_SESSION['q15'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q15" value="3" <?php if(isset($_SESSION['q15']) && $_SESSION['q15'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">16.I felt that I had nothing to look forward to</p>
                                            <label class="radio">
                                                <input type="radio" name="q16" value="0" <?php if(isset($_SESSION['q16']) && $_SESSION['q16'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q16" value="1" <?php if(isset($_SESSION['q16']) && $_SESSION['q16'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q16" value="2" <?php if(isset($_SESSION['q16']) && $_SESSION['q16'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q16" value="3" <?php if(isset($_SESSION['q16']) && $_SESSION['q16'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">17.I felt down-hearted and blue</p>
                                            <label class="radio">
                                                <input type="radio" name="q17" value="0" <?php if(isset($_SESSION['q17']) && $_SESSION['q17'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q17" value="1" <?php if(isset($_SESSION['q17']) && $_SESSION['q17'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q17" value="2" <?php if(isset($_SESSION['q17']) && $_SESSION['q17'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q17" value="3" <?php if(isset($_SESSION['q17']) && $_SESSION['q17'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">18.I was unable to become enthusiastic about anything</p>
                                            <label class="radio">
                                                <input type="radio" name="q18" value="0" <?php if(isset($_SESSION['q18']) && $_SESSION['q18'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q18" value="1" <?php if(isset($_SESSION['q18']) && $_SESSION['q18'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q18" value="2" <?php if(isset($_SESSION['q18']) && $_SESSION['q18'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q18" value="3" <?php if(isset($_SESSION['q18']) && $_SESSION['q18'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">19.I felt I wasn’t worth much as a person</p>
                                            <label class="radio">
                                                <input type="radio" name="q19" value="0" <?php if(isset($_SESSION['q19']) && $_SESSION['q19'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q19" value="1" <?php if(isset($_SESSION['q19']) && $_SESSION['q19'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q19" value="2" <?php if(isset($_SESSION['q19']) && $_SESSION['q19'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q19" value="3" <?php if(isset($_SESSION['q19']) && $_SESSION['q19'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">20.I felt that life was meaningless</p>
                                            <label class="radio">
                                                <input type="radio" name="q20" value="0" <?php if(isset($_SESSION['q20']) && $_SESSION['q20'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q20" value="1" <?php if(isset($_SESSION['q20']) && $_SESSION['q20'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q20" value="2" <?php if(isset($_SESSION['q20']) && $_SESSION['q20'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q20" value="3" <?php if(isset($_SESSION['q20']) && $_SESSION['q20'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">21.I found it difficult to work up the initiative to do things</p>
                                            <label class="radio">
                                                <input type="radio" name="q21" value="0" <?php if(isset($_SESSION['q21']) && $_SESSION['q21'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q21" value="1" <?php if(isset($_SESSION['q21']) && $_SESSION['q21'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q21" value="2" <?php if(isset($_SESSION['q21']) && $_SESSION['q21'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q21" value="3" <?php if(isset($_SESSION['q21']) && $_SESSION['q21'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div class="btn-container-2">
                                            <!-- <button class="button-main"><a href="<?php echo URLROOT;?>undergrad/dass21_2" style="text-decoration: none;">Previous</a></button> -->
                                            <button class="button-main" type="submit">Submit</button>
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