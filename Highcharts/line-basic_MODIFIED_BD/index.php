<?php
    include("connexion.php");
    $requete="SELECT valeure FROM temperature";
    $resultat=$connexion->query($requete);
    $resultatFinale=$resultat ->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultatFinale as $index => $value) {
        foreach ($value as $valueFinale) {
            $donnees[] = $valueFinale;
        }
    }
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
	</head>
	<body>
<script src="highcharts.js"></script>
<!-- <script src="../../code/modules/series-label.js"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/modules/export-data.js"></script>-->

<div id="container"></div>



		<script type="text/javascript">
Highcharts.chart('container', {
    title: {
        text: 'Relevés sur la parcelle des Genies Bio'
    },
    xAxis: {
        title: {
            text: 'heures'
        }
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            pointInterval: 10
        }
    },

    series: [{
        name: 'Température',
        data: [<?php echo join($donnees, ',') ?>]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
		</script>
	</body>
</html>
