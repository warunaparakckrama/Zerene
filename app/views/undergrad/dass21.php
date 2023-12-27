
<?php $currentPage = 'questionnaires'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <div class="page" id="page-1">
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
                            <p class="p-regular">General Guidelines</p>
                            <div class="card-green-4">
                                <div>
                                    <p class="p-regular-green" style="font-size: 15px;">-Mental Health Questionnaires - Level 01</p>
                                    <p class="p-regular-green" style="font-size: 15px;">-General Questionnaire for Stress, Anxiety and Depression</p>                               
                                </div>
                            </div>
                        </div>
    
                        <div class="card-white">
                            <p class="p-regular">Questionnaire</p>
    
                            <div class="card-green-4">
                                <form id="dass-21" action="" method="POST">
                                    <div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">1.I found it hard to wind down</p>
                                            <label class="radio">
                                                <input type="radio" name="q1" value="0" <?php if(isset($_SESSION['q1']) && $_SESSION['q1'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q1" value="1" <?php if(isset($_SESSION['q1']) && $_SESSION['q1'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q1" value="2" <?php if(isset($_SESSION['q1']) && $_SESSION['q1'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q1" value="3" <?php if(isset($_SESSION['q1']) && $_SESSION['q1'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">2.I tended to over-react to situations</p>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="0" <?php if(isset($_SESSION['q2']) && $_SESSION['q2'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="1" <?php if(isset($_SESSION['q2']) && $_SESSION['q2'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="2" <?php if(isset($_SESSION['q2']) && $_SESSION['q2'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="3" <?php if(isset($_SESSION['q2']) && $_SESSION['q2'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">3.I felt that I was using a lot of nervous energy</p>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="0" <?php if(isset($_SESSION['q3']) && $_SESSION['q3'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="1" <?php if(isset($_SESSION['q3']) && $_SESSION['q3'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="2" <?php if(isset($_SESSION['q3']) && $_SESSION['q3'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="3" <?php if(isset($_SESSION['q3']) && $_SESSION['q3'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">4. I found myself getting agitated</p>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="0" <?php if(isset($_SESSION['q4']) && $_SESSION['q4'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="1" <?php if(isset($_SESSION['q4']) && $_SESSION['q4'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="2" <?php if(isset($_SESSION['q4']) && $_SESSION['q4'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="3" <?php if(isset($_SESSION['q4']) && $_SESSION['q4'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">5.I was intolerant of anything that kept me from getting on with what I was doing</p>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="0" <?php if(isset($_SESSION['q5']) && $_SESSION['q5'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="1" <?php if(isset($_SESSION['q5']) && $_SESSION['q5'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="2" <?php if(isset($_SESSION['q5']) && $_SESSION['q5'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="3" <?php if(isset($_SESSION['q5']) && $_SESSION['q5'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">6.I felt that I was rather touchy</p>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="0" <?php if(isset($_SESSION['q6']) && $_SESSION['q6'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="1" <?php if(isset($_SESSION['q6']) && $_SESSION['q6'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="2" <?php if(isset($_SESSION['q6']) && $_SESSION['q6'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="3" <?php if(isset($_SESSION['q6']) && $_SESSION['q6'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">7.I found it difficult to relax</p>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="0" <?php if(isset($_SESSION['q7']) && $_SESSION['q7'] == '0') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="1" <?php if(isset($_SESSION['q7']) && $_SESSION['q7'] == '1') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="2" <?php if(isset($_SESSION['q7']) && $_SESSION['q7'] == '2') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="3" <?php if(isset($_SESSION['q7']) && $_SESSION['q7'] == '3') echo 'checked'; ?> ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>

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
                                        </div>

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
                                        </div>
                                    
                                        <div class="btn-container-2">
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