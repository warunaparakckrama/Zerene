<?php 
    $currentPage = 'doc_prescription';
    $prescription = $data['prescription'] ;
?>
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

                        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        .prescription-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px;
            page-break-before: always; /* Ensure a new page for each prescription */
            height: 60px;
        }

        .prescription-table th, .prescription-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .prescription-table th {
         background-color: #f2f2f2;
         height: 80px; /* Set header row height */
}

        .prescription-table td {
         height: 80px; /* Set data row height */
}


        .prescription-table th {
            background-color: #f2f2f2;
        }

        .col1, .col3 {
            width: 15%;
        }


        .col2, .col4 {
            width: 35%;
        }
       
        
        
    </style>
</head>
<body>
    <div class= prescription-container>
    <table class="prescription-table">
    <tbody>
            <tr>
                <th class="col1">Patient's Name</th>
                <td class="col1 merged-cells" colspan="3"><?php echo $prescription->ug_name;?></td>
               
            </tr>
            <tr>
                <th class="col1">Patient's age</th>
                <td class="col2"></td>
                <th class="col3">Patient's gender</th>
                <td class="col4"></td>
            </tr>
             <tr>
             <th class="col1">Diagnosed with</th>
             <td class="col1 merged-cells" colspan="3">diagnosed_with</td>
                
            </tr>
            <tr>
                <th class="col">Drug name</th>
                <th class="col2">quantity(tablets or syrup)</th>
                <th class="col3 merged-cells" colspan="2">dosage(per day)</th>
            </tr>
            <div>
            <tr>
                <td class="col1"></td>
                <td class="col2"></td>
                <td class="col3 merged-cells" colspan="2"></td>
            </tr>
            <tr >
                <td class="col1"></td>
                <td class="col2"></td>
                <td class="col3 merged-cells" colspan="2"></td>
            </tr>
            <tr>
                <td class="col1"></td>
                <td class="col2"></td>
                <td class="col3 merged-cells" colspan="2"></td>
            </tr>
            </div>

           
            <tr>
                <th class="col1">date</th>
                <td class="col2"><?php echo $doctor->date;?></td>
                <th class="col3">Diagnosed by</th>
                <td class="col4"><?php echo $doctor->diagnosed_by;?></td>
            </tr>

        </div>
        </tbody>
    </table>

        </style>

</section>
    </body>