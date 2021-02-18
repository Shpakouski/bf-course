<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currencies Line Graph</title>
    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        th, td {
            padding: 5px;
        }

        ul li {
            list-style: none;
            display: inline-block;
            margin-left: 20px;
        }

    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/lang/ru_RU.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function () {

// Themes begin
            am4core.useTheme(am4themes_animated);
// Themes end

            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.language.locale = am4lang_ru_RU;

            var data = [];
            var value = 50;
            // for (var i = 0; i < 300; i++) {
            //     var date = new Date();
            //     date.setHours(0, 0, 0, 0);
            //     date.setDate(i);
            //     value -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            //     data.push({date: date, value: value});
            // }

            chart.data = <?php echo $json; ?>;

// Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 60;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "value";
            series.dataFields.dateX = "date";
            series.tooltipText = "{value}"

            series.tooltip.pointerOrientation = "vertical";

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.snapToSeries = series;
            chart.cursor.xAxis = dateAxis;

//chart.scrollbarY = new am4core.Scrollbar();
            chart.scrollbarX = new am4core.Scrollbar();

        }); // end am4core.ready()
    </script>

</head>
<body>

<?php require_once 'menu.php'; ?>