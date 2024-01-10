<?php $currentPage = 'prescription'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">

        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
            table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
        </style>

    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
            </div>
            <div class="grid-1">
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Template</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>
                <div class="card-white">
                        <p class="p-regular">MEDICAL PRESCRIPTION</p>
                        
                        <div class="card-green-3">
                        <div>
                        <table>
                           <tr>
                           <th>Name of patiant</th>
                           <td colspan=5></td>

                           </tr>
                           <tr>
                           <td>Date of birth</td>
                           <td colspan=2></td>
                           <td>age</td>
                           <td></td>
                           <td></td>
                           </tr>
                           <tr>
                           <td>contact details</td>
                           <td colspan=5></td>
                           </tr>
                           </tr>
                           <tr>
                           <td>diagnosis with</td>
                           <td colspan=5></td>
                           </tr>

                           <tr>
                           <td>drug</td>
                           <td></td>
                           <td>unite</td>
                           <td></td>
                           <td>dosage</td>
                           <td></td>
                           </tr>

                           <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           </tr>

                           




                        </table>
                        


                        </div>
                        </div>
                    </div> 

            </div>
        </section>
    </body>