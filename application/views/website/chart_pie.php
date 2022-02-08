<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <br>
    <br>
    <br>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Keluarga Sejahtera Tahap III Plus', 23],
                ['Keluarga Sejahtera Tahap III', 19],
                ['Keluarga Sejahtera Tahap II', 8],
                ['Keluarga Sejahtera Tahap I', 0],
                ['Keluarga Pra-Sejahtera', 0]
            ]);

            // Set chart options
            var options = {
                'title': '<?php echo $title;  ?>',
                'width': 1350,
                'height': 500
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
</body>

</html>