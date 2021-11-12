<?php
include "conn_exion.php";
$assignName = function($n){
	return "question_".$n;
};
$questions = implode( "+",array_map( $assignName, range(1, 25)));
$questionsInd = implode( ",",array_map( $assignName, range(1, 25)));
$str_sql = "SELECT employee_no, departament, $questionsInd, ($questions) / 25 AS employee_prom  FROM quizztbl;";
$series = array( "Bajo" => array(), "Medio"=>array(), "Medio-Alto"=>array(), "Alto"=>array());
$tableDet = "";
$seriesPrincipal = array( "Bajo" => 0, "Medio"=> 0, "Medio-Alto"=> 0, "Alto"=> 0 );
$employee_prom_general = 0;
$employee_qty = 0;
foreach ($dbPdo->query($str_sql) as $row) 
{
	$employee_qty += 1;
	$employee_prom = round($row["employee_prom"], 2);
	$employee_prom_general += $employee_prom;
	if ( $employee_prom < 2.59 )
	{
		$current = "Bajo";
	}
	elseif ( $employee_prom < 4.59 )
	{
		$current = "Medio";
	}
	elseif ( $employee_prom < 5.59  )
	{
		$current = "Medio-Alto";
	}
	else
	{
		$current = "Alto";
	}
	if ( !isset($series[$current][$row["departament"]]))
	{
		$series["Bajo"][$row["departament"]] = 0;
		$series["Medio"][$row["departament"]] = 0;
		$series["Medio-Alto"][$row["departament"]] = 0;
		$series["Alto"][$row["departament"]] = 0;
	}
	$series[$current][$row["departament"]] += 1;
	$seriesPrincipal[$current] += 1;
	$tableDet .= "<tr><td>$row[employee_no]</td><td>$row[departament]</td><td>$employee_prom</td></tr>";
}
$count = 0;
$seriesToPlot = array();
foreach ($series as $key => $values)
{
	$seriesToPlot[$count]["name"] = $key;
	ksort( $values );
	foreach ($values as $k => $v )
	{
		$seriesToPlot[$count]["data"][] = array( "x" => $k , "y" => $v );
	}
	$count++;
}
$series = json_encode($seriesToPlot);
$seriesFull = json_encode(array_values($seriesPrincipal));
$categories = json_encode(array_keys($seriesPrincipal)); 
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Resultados</title>
	</head>
	<body>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="row">
						<div class="col-lg-3 col-6 order-lg-1 order-1">
							<img src="imgs/stephanie_logo.png" class="rounded img-fluid" alt="Stephanie Leal"/>
						</div>
						<div class="col-lg-2 col-4 offset-lg-1 offset-2 order-lg-3 order-2">
							<img src="imgs/pale.png" class="rounded img-fluid" alt="Centro Pale"/>
						</div>
						<div class="col-lg-6 col-12 order-lg-2 order-3 align-self-center">
							<h2 class="text-center">Resultados</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-12">
							<div id="chart_two"></div>
						</div>
						<div class="col-lg-6 col-12">
							<div id="chart"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<table class="table table-striped table-light text-center">
								<thead>
									<tr>
										<th>No.empleado</th>
										<th>Departamento</th>
										<th>Promedio de Respuestas</th>
									</tr>
								</thead>
								<tbody>
									<?=$tableDet?>
								</tbody>
								<tfoot>
									<tr>
										<th></th>
										<th style="text-align:right;">Promedio de la Empresa:</th>
										<th><?=round($employee_prom_general/$employee_qty, 2)?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<script lang="javascript">
						var colors = ["#dc3545", "#fd7e14", "#ffc107", "#20c997"];
						var options = {
          		series: [{
								name: "Cantidad",
          			data: <?=$seriesFull?>
        			}],
          		chart: {
			          height: 350,
			          type: 'bar',
			          events: {
			            click: function(chart, w, e) {
			              // console.log(chart, w, e)
			            }
			          }
			        },
        			colors: colors,
			        plotOptions: {
			          bar: {
			            columnWidth: '45%',
			            distributed: true,
			          }
			        },
			        dataLabels: {
			          enabled: false
			        },
			        legend: {
			          show: false
			        },
			        xaxis: {
			          categories: <?=$categories?>,
			          labels: {
			            style: {
			              fontSize: '12px'
			            }
			          }
			        }
		        };
	        	var chart = new ApexCharts(document.querySelector("#chart_two"), options);
	        	chart.render();
					var options = {
		          series: <?=$series?>,
							chart: {
			          type: 'bar',
			          height: 350,
			          stacked: true,
			          toolbar: {
			            show: true
			          },
			          zoom: {
			            enabled: true
			          }
			        },
			        responsive: [{
			          breakpoint: 480,
			          options: {
			            legend: {
			              position: 'bottom',
			              offsety: -10,
			              offsetx: 0
			            }
			          }
			        }],
			        plotOptions: {
			          bar: {
			            horizontal: false,
			            borderRadius: 10
			          },
			        },
			        legend: {
								markers : {
									fillColors : colors
								},
			          position: 'right',
			          offsetx: 40
			        },
			        fill: {
								colors: colors,
			          opacity: 1
			        }
        		};
						var chart = new ApexCharts(document.querySelector("#chart"), options);
						chart.render();
					</script>
				</div>
			</div>
		</div>
  </body>
</html>