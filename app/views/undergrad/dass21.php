
<?php $currentPage = 'questionnaires'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | DASS-21</title>
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
                            <div class="card-green-3">
                                <div>
                                    <p class="p-regular-green" style="font-size: 15px;">-Mental Health Questionnaires - Level 01</p>
                                    <p class="p-regular-green" style="font-size: 15px;">-General Questionnaire for Stress, Anxiety and Depression</p>                               
                                </div>
                            </div>
                        </div>
    
                        <div class="card-white">
                            <p class="p-regular">Questionnaire</p>
    
                            <div class="card-green-3">
                                <form id="dass-21" action="<?php echo URLROOT;?>undergrad/dass21_review" method="POST">
                                    <div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">1.I found it hard to wind down</p>
                                            <label class="radio">
                                                <input type="radio" name="q1" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <!-- <?php echo ($data['q1'] === '0') ? 'checked' : ''; ?> -->
                                            <label class="radio">
                                                <input type="radio" name="q1" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q1" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q1" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                            <!-- <p class="p-error"><?php echo $data['q1_err']; ?></p><br> -->
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">2.I tended to over-react to situations</p>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q2" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">3.I felt that I was using a lot of nervous energy</p>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q3" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">4. I found myself getting agitated</p>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q4" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">5.I was intolerant of anything that kept me from getting on with what I was doing</p>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q5" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">6.I felt that I was rather touchy</p>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q6" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>
                                        <div style="margin-bottom: 10px;">
                                            <p class="p-regular-green" style="font-size: 17px; font-weight:500;">7.I found it difficult to relax</p>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="q7" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                            </label>
                                        </div>

                                        <div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">8.I was aware of dryness of my mouth</p>
                                                <label class="radio">
                                                    <input type="radio" name="q8" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q8" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q8" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q8" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">9.I experienced breathing difficulty (e.g. excessively rapid breathing, breathlessness in the absence of physical exertion)</p>
                                                <label class="radio">
                                                    <input type="radio" name="q9" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q9" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q9" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q9" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">10.I experienced trembling (e.g. in the hands)</p>
                                                <label class="radio">
                                                    <input type="radio" name="q10" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q10" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q10" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q10" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">11.I was worried about situations in which I might panic and make a fool of myself</p>
                                                <label class="radio">
                                                    <input type="radio" name="q11" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q11" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q11" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q11" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">12.I felt I was close to panic</p>
                                                <label class="radio">
                                                    <input type="radio" name="q12" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q12" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q12" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q12" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">13.I was aware of the action of my heart in the absence of physical exertion (e.g. sense of heart rate increase, heart missing a beat)</p>
                                                <label class="radio">
                                                    <input type="radio" name="q13" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q13" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q13" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q13" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">14.I felt scared without any good reason</p>
                                                <label class="radio">
                                                    <input type="radio" name="q14" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q14" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q14" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q14" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">15.I couldn’t seem to experience any positive feeling at all</p>
                                                <label class="radio">
                                                    <input type="radio" name="q15" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q15" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q15" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q15" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">16.I felt that I had nothing to look forward to</p>
                                                <label class="radio">
                                                    <input type="radio" name="q16" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q16" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q16" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q16" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">17.I felt down-hearted and blue</p>
                                                <label class="radio">
                                                    <input type="radio" name="q17" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q17" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q17" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q17" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">18.I was unable to become enthusiastic about anything</p>
                                                <label class="radio">
                                                    <input type="radio" name="q18" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q18" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q18" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q18" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">19.I felt I wasn’t worth much as a person</p>
                                                <label class="radio">
                                                    <input type="radio" name="q19" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q19" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q19" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q19" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">20.I felt that life was meaningless</p>
                                                <label class="radio">
                                                    <input type="radio" name="q20" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q20" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q20" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q20" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                                </label>
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                <p class="p-regular-green" style="font-size: 17px; font-weight:500;">21.I found it difficult to work up the initiative to do things</p>
                                                <label class="radio">
                                                    <input type="radio" name="q21" value="0"  ><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q21" value="1"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q21" value="2"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="q21" value="3"  ><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
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