<?php



require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion | Admin Panel</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo1.jpg" />


    <?php

    $p_rs = Database::search("SELECT CONCAT(YEAR(invoice.date),'-', MONTHNAME(invoice.date) ) 
as ym,MONTHNAME(invoice.date) AS m,SUM(total)  FROM `invoice` WHERE YEAR(invoice.date)='2023' 
  GROUP BY ym;");
    $p_num = $p_rs->num_rows;


    ?>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);
       

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Sales'],
                <?php

                for ($x = 0; $x < $p_num; $x++) {
                    $p_data = $p_rs->fetch_assoc();

                    echo "['" . $p_data['m'] . "'," . $p_data['SUM(total)'] . "],";
                }



                ?>
            ]);

            var options = {
                title: 'Company Performance (2023)',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }

        <?php

        $p_rs = Database::search("SELECT CONCAT(YEAR(invoice.date),'-', MONTHNAME(invoice.date) ) 
as ym,MONTHNAME(invoice.date) AS m,SUM(total)  FROM `invoice` WHERE YEAR(invoice.date)='2022' 
  GROUP BY ym;");

        $p_num = $p_rs->num_rows;


        ?>

        
    </script>



</head>

<body>





    <div class="col-6 offset-3">


        <div class="col-12 d-block" id="year1">
            <div class="row mt-5 mb-5">

                <div id="curve_chart" style="height: 500px;"></div>


            </div>
        </div>


       

    </div>




    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>


<?php


?>