
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
                        <p class="p-regular">Questionnaire (3/3 Pages)</p>
                        <div class="card-green-4">
                            <!-- <form id="dass-21" action="" method="POST"> -->
                                <div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">15.I couldn’t seem to experience any positive feeling at all</p>
                                        <label class="radio">
                                            <input type="radio" name="q8" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q8" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q8" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q8" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">16.I felt that I had nothing to look forward to</p>
                                        <label class="radio">
                                            <input type="radio" name="q9" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q9" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q9" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q9" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">17.I felt down-hearted and blue</p>
                                        <label class="radio">
                                            <input type="radio" name="q10" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q10" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q10" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q10" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">18.I was unable to become enthusiastic about anything</p>
                                        <label class="radio">
                                            <input type="radio" name="q11" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q11" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q11" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q11" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">19.I felt I wasn’t worth much as a person</p>
                                        <label class="radio">
                                            <input type="radio" name="q12" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q12" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q12" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q12" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">20.I felt that life was meaningless</p>
                                        <label class="radio">
                                            <input type="radio" name="q13" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q13" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q13" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q13" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <p class="p-regular-green" style="font-size: 17px; font-weight:500;">21.I found it difficult to work up the initiative to do things</p>
                                        <label class="radio">
                                            <input type="radio" name="q14" value="0"><p class="p-regular-green" style="font-size: 15px;">Did not apply to me at all</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q14" value="1"><p class="p-regular-green" style="font-size: 15px;">Applied to me to some degree, or some of the time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q14" value="2"><p class="p-regular-green" style="font-size: 15px;">Applied to me to a considerable degree or a good part of time</p>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="q14" value="3"><p class="p-regular-green" style="font-size: 15px;">Applied to me very much or most of the time</p>
                                        </label>
                                    </div>
                                    <div class="btn-container-2">
                                        <button class="button-main">Previous</button>
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
<!-- </html> -->