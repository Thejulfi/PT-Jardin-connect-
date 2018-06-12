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

    $requete2="SELECT heure FROM temperature";
    $resultat2=$connexion->query($requete2);
    $resultatFinale2=$resultat2 ->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultatFinale2 as $index => $value) {
        foreach ($value as $valueFinale) {
            $donnees2[] = $valueFinale;
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
  chart: {
    type: 'area'
  },
  title: {
    text: 'Historic and Estimated Worldwide Population Growth by Region'
  },
  subtitle: {
    text: 'Source: Wikipedia.org'
  },
  xAxis: {
    categories: [<?php echo join($donnees2, ','); ?>],
    tickmarkPlacement: 'on',
    title: {
      enabled: false
    }
  },
  yAxis: {
    title: {
      text: 'Billions'
    },
    labels: {
      formatter: function () {
        return this.value / 1000;
      }
    }
  },
  tooltip: {
    split: true,
    valueSuffix: ' millions'
  },
  plotOptions: {
    area: {
      stacking: 'normal',
      lineColor: '#666666',
      lineWidth: 1,
      marker: {
        lineWidth: 1,
        lineColor: '#666666'
      }
    }
  },
  series: [{
    name: 'Asia',
    data: [<?php echo join($donnees, ','); ?>]
  }],
});
    

		</script>
	</body>
</html>
