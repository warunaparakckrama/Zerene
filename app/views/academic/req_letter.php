<?php $currentpage = 'req_letter'; // to set the current page
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $_SESSION['user_name']; ?> | Request Letters</title>

    <!-- reqLetter css files -->
    <style type="text/css">
        .bodyBody {
            margin: 10px;
            font-size: 1.50em;
        }

        .divHeader {
            text-align: left;
            border: 1px solid;
        }

        .divReturnAddress {
            text-align: left;
            /* float: right; */
        }

        .divSubject {
            clear: both;
            font-weight: bold;
            padding-top: 20px;
            text-align: center;
        }

        .divAdios {
            float: right;
            padding-top: 50px;
        }
    </style>


</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Request Letter view</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>


            <div>
                <div class="rectangle-2">
                    <!-- <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="pro pic" class="card-profile">
                        <div>
                            <p class="p-regular" style="margin-bottom: -10px;">Zerene_User07</p>
                            <p class="p-regular" style="color:var(--zerene-grey) ;">University of Colombo School of Computing</p>
                        </div> -->
                    <div class="bodyBody">
                        <div class="divReturnAddress">

                            <p class="p-regular ">Zerene_User07 </p>
                            <p class="p-regular">UCSC</p>

                            <!-- date below -->
                            <p class="p-regular">
                                01 December, 2012
                            </p><br>
                            
                            <p>
                            <?php echo $_SESSION['user_name'];?> ,
                            </p>

                        </div>
                            
                        <div class="divSubject">
                            <p>
                                Betreff: Vertretung waehrend Reise
                            </p>
                        </div>

                        <div class="divContents">
                            <p>
                                Ich fliege nach Brasilien am 29. Dezember 2012 f&uuml;r 6 Wochen.
                                Meine Nichte kann mich vertreten. Sie arbeitet sehr gesissenhaft.
                                Sie heisst Yasmin. 
                            </p>
                        </div>
                    </div><br><br>
                    <!-- end of the letter  -->

                    <div class="btn-container">
                        <button class="button-main">download</button>
                        <button class="button-main"> <a href="<?php echo URLROOT; ?>academic/ac_undergraduate4" class="a-name"> create </a></button>
                    </div>