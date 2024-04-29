<?php 
    $currentPage = 'prescriptions';
    $prescription = $data['prescription'];
    $doctor = $data['doctor'];
    $medicine = $data['medicine'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Prescriptions</title>

    <style>
        .prescription-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px;
            page-break-before: always;
            /* Ensure a new page for each prescription */
            /* height: 60px; */
        }

        .prescription-table th,
        .prescription-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .prescription-table th {
            background-color: #E5F3F6;
            height: 70px;
            /* Set header row height */
        }

        .prescription-table td {

            height: 70px;
            background-color: #FEFEFE;
            color: #3d8994;
            /* Set data row height */
        }

        .col1,
        .col3 {
            color: #3d8994;
            width: 15%;
        }

        .col2,
        .col4 {
            width: 30%;
        }
    </style>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Prescriptions</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>

            </div>

            <div>
                <p class="p-regular-green"></p>
                <div class="card-white-scroll" style="height: 500px;">

                    <div class="card-green-3" id="prescription">
                        <div class="prescription-container">
                            <table class="prescription-table" id="prescription">
                                <tbody>
                                    <th class="col1 merged-cells" colspan=4 style="background-color:#3d8994; color:#FEFEFE"><img src="<?php echo IMG;?>logo - white.svg" width="15%" alt=""><p style="font-size: 30px;">Medical Prescription</p></th>
                                    <tr>
                                        <th class="col1">Patient's Name</th>
                                        <td class="col1 merged-cells" colspan="3"><?php echo $prescription->ug_name; ?></td>

                                    </tr>
                                    <tr>
                                        <th class="col1">Patient's Age</th>
                                        <td class="col2"><?php echo $prescription->age; ?> Years</td>
                                        <th class="col3">Gender</th>
                                        <td class="col4"><?php echo $prescription->gender; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="col1">Diagnosed with</th>
                                        <td class="col1 merged-cells" colspan="3"><?php echo $prescription->diagnosed_with; ?></td>

                                    </tr>
                                    <tr>
                                        <th class="col4" style="color: #3d8994;">Drug Name</th>
                                        <th class="col2" style="color: #3d8994;">Quantity (Tablets/ Milliliters)</th>
                                        <th class="col3 merged-cells" colspan="2">Dosage (per day)</th>
                                    </tr>

                                    <?php foreach ($data['medicine'] as $medicine) : ?>
                                        <tr>
                                            <td class="col1"><?php echo $medicine->drug_name; ?></td>
                                            <td class="col2"><?php echo $medicine->unit . ' '. $medicine->unit_type;?></td>
                                            <td class="col3 merged-cells" colspan="2"><?php echo $medicine->dosage.' '.$medicine->dosage_type; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="col1">Instructions</th>
                                            <td class="col1 merged-cells" colspan="3"><?php echo $medicine->instructions; ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <th class="col1">Date</th>
                                        <td class="col2"><?php echo $prescription->date; ?></td>
                                        <th class="col3">Diagnosed by</th>
                                        <td class="col4">Dr. <?php echo $prescription->diagnosed_by; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="col1">Signature</th>
                                        <td clss="col1 merged-cells" colspan="3"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="btn-container"><button class="button-main" id="download">Download PDF</button></div>
            </div>
                </div>

            </div>
        </div>
    </section>
</body>

                                      

                             

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const filename = 'PDFFILE' + '.pdf';
        document.getElementById('download').addEventListener('click', function() {
            // Select the element that you want to convert to PDF
            const element = document.getElementById('prescription');

            // Specify the filename for the downloaded PDF

            html2pdf(element, {
                filename: filename,
                format: 'a4',
                orientation: 'portrait'
            });
        });
    </script>
</body>