<?php
$currentPage = 'ad_home';
$usercount = $data['usercount'];
$facultycount = $data['facultycount'];
$facultynames = array_keys($facultycount);
$monthlycount = $data['monthlycount'];
$months = array_keys($monthlycount);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Administrator</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-chart">

            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Dashboard</p>
                </div>
            </div>
            <div class="subgrid-6" id="chart">
                <div class="subgrid-7" style="gap: 10px;">
                    <div class="card-white">
                        <div class="card-green">
                            <canvas id="userCount" width="auto"></canvas>
                        </div>
                        <div class="card-green" style="margin-bottom: 20px;">
                            <canvas id="monthlycount" width="auto" height="140px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="subgrid-7" style="gap: 10px;">
                    <div class="card-white">
                        <div class="card-green">
                            <canvas id="facultycount" width="max-content" height="130px"></canvas>
                        </div>
                        <div class="btn-contianer"><button class="button-main" id="reportdownload">Download Report</button></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS; ?>chart.js"></script>

    <script>
        // Function to generate random color variants of a specific color
        function generateRandomColorVariants(baseColor, numVariants) {
            const colors = [];
            const baseRGB = hexToRgb(baseColor);

            for (let i = 0; i < numVariants; i++) {
                // Generate random variations for red, green, and blue channels
                const r = Math.max(0, Math.min(255, baseRGB[0] + getRandomOffset()));
                const g = Math.max(0, Math.min(255, baseRGB[1] + getRandomOffset()));
                const b = Math.max(0, Math.min(255, baseRGB[2] + getRandomOffset()));
                colors.push(rgbToHex([r, g, b]));
            }
            return colors;
        }

        // Function to generate a random offset (-50 to 50) for color variations
        function getRandomOffset() {
            return Math.round(Math.random() * 100 - 50);
        }

        // Function to convert hexadecimal color to RGB format
        function hexToRgb(hex) {
            const bigint = parseInt(hex.slice(1), 16);
            const r = (bigint >> 16) & 255;
            const g = (bigint >> 8) & 255;
            const b = bigint & 255;
            return [r, g, b];
        }

        // Function to convert RGB color to hexadecimal format
        function rgbToHex(color) {
            return "#" + ((1 << 24) + (color[0] << 16) + (color[1] << 8) + color[2]).toString(16).slice(1);
        }
    </script>

    <script>
        // Example usage:
        const baseColor = "#3E8F9C"; // Base color in hexadecimal format
        const numVariants = 4; // Number of color variants
        const colorVariants = generateRandomColorVariants(baseColor, numVariants);
        console.log(colorVariants);

        //--user count chart--
        //setup block
        const usercount = <?php echo json_encode($usercount); ?>;
        const data = {
            labels: ['Undergraduate', 'Doctors', 'Professional Counsellors', 'Academic Counsellors', 'Pharmacies', 'Admins'],
            datasets: [{
                label: 'Number of Users',
                data: usercount,
                backgroundColor: colorVariants,
                borderWidth: 1
            }]
        };
        //config block
        const config = {
            type: 'bar',
            data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Registrations',
                        font: {
                            size: 15,
                            family: 'Poppins',

                        }
                    }
                },

            }
        };
        //render block
        const myChart = new Chart(
            document.getElementById('userCount'),
            config
        );

        //--faculty count chart--
        //setup block
        const facultycount = <?php echo json_encode(array_values($facultycount)); ?>;
        const data2 = {
            labels: <?php echo json_encode($facultynames); ?>,
            datasets: [{
                label: 'Number of Undergraduates',
                data: facultycount,
                backgroundColor: colorVariants,
                borderWidth: 1
            }]
        };

        //config block
        const config2 = {
            type: 'pie',
            data: data2,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Faculty Count | Undergraduates',
                        font: {
                            size: 15,
                            family: 'Poppins',
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true, // Start the axis at zero
                        // Customize the ticks
                        ticks: {
                            stepSize: 1, // Set the step size between ticks
                            callback: function(value, index, values) {
                                return value; // Customize the display of each tick value as needed
                            }
                        }
                    }
                }

            }
        };

        //render block
        const myChart2 = new Chart(
            document.getElementById('facultycount'),
            config2
        );

        //monthly count line chart
        //setup block
        const monthlycount = <?php echo json_encode(array_values($monthlycount)); ?>;
        const data3 = {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Number of Users',
                data: monthlycount,
                fill: false,
                borderColor: colorVariants,
                tension: 0.1
            }]
        };

        //config block
        const config3 = {
            type: 'line',
            data: data3,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Registrations',
                        font: {
                            size: 15,
                            family: 'Poppins',
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true, // Start the axis at zero
                        // Customize the ticks
                        ticks: {
                            stepSize: 1, // Set the step size between ticks
                            callback: function(value, index, values) {
                                return value; // Customize the display of each tick value as needed
                            }
                        }
                    }
                }
            }
        };

        //render block
        const myChart3 = new Chart(
            document.getElementById('monthlycount'),
            config3
        );
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const filename = 'System Report' + '.pdf';
        document.getElementById('reportdownload').addEventListener('click', function() {
            // Select the element that you want to convert to PDF
            const element = document.getElementById('chart');

            // Specify the filename for the downloaded PDF

            html2pdf(element, {
                filename: filename,
                format: 'a4',
                orientation: 'landscape'
            });
        });
    </script>
</body>