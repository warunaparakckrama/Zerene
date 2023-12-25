
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
                        <p class="p-regular">Questionnaire (2/3 Pages)</p>
                        <div class="card-green-4">
                            <form>
                                <div style="margin-bottom: 10px;">
                                    <p class="p-regular-green" style="font-size: 17px; font-weight:500;">8.I was aware of dryness of my mouth</p>
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
                                    <p class="p-regular-green" style="font-size: 17px; font-weight:500;">9.I experienced breathing difficulty (e.g. excessively rapid breathing, breathlessness in the absence of physical exertion)</p>
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
                                    <p class="p-regular-green" style="font-size: 17px; font-weight:500;">10.I experienced trembling (e.g. in the hands)</p>
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
                                    <p class="p-regular-green" style="font-size: 17px; font-weight:500;">11.I was worried about situations in which I might panic and make a fool of myself</p>
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
                                    <p class="p-regular-green" style="font-size: 17px; font-weight:500;">12.I felt I was close to panic</p>
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
                                    <p class="p-regular-green" style="font-size: 17px; font-weight:500;">13.I was aware of the action of my heart in the absence of physical exertion (e.g. sense of heart rate increase, heart missing a beat)</p>
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
                                    <p class="p-regular-green" style="font-size: 17px; font-weight:500;">14.I felt scared without any good reason</p>
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
                                    <a href="<?php echo URLROOT;?>undergrad/dass21_1" style="text-decoration: none;"><button class="button-main">Previous</button></a>
                                    <button class="button-main">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </body>
<!-- </html> -->