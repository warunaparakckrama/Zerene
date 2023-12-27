
<?php $currentPage = 'questionnaires'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
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
                        <p class="p-regular">Questionnaire (1/3 Pages)</p>

                        <div class="card-green-4">
                            <form id="dass-21" action="<?php echo URLROOT;?>undergrad/dass21_2" method="POST">
                                <div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">1.I found it hard to wind down</p>
                                        <label class="radio">
                                            <input type="radio" name="q1" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q1" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q1" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q1" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">2.I tended to over-react to situations</p>
                                        <label class="radio">
                                            <input type="radio" name="q2" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q2" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q2" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q2" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">3.I felt that I was using a lot of nervous energy</p>
                                        <label class="radio">
                                            <input type="radio" name="q3" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q3" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q3" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q3" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">4. I found myself getting agitated</p>
                                        <label class="radio">
                                            <input type="radio" name="q4" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q4" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q4" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q4" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">5.I was intolerant of anything that kept me from getting on with what I was doing</p>
                                        <label class="radio">
                                            <input type="radio" name="q5" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q5" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q5" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q5" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">6.I felt that I was rather touchy</p>
                                        <label class="radio">
                                            <input type="radio" name="q6" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q6" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q6" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q6" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">7.I found it difficult to relax</p>
                                        <label class="radio">
                                            <input type="radio" name="q7" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q7" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q7" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q7" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div class="btn-container-2">
                                        <button class="button-main" type="submit">Next</button>
                                    </div>
                                </div>
                            <!-- </form>     -->
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </body>
<!-- </html> -->