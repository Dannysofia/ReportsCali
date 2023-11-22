<?php

include '../Controller/Estadisticas/Estadisticas_controller.php';
$test = new Estadisticas_controller();
$dataEstado = $test->Estado();
$dataDanos = $test->tipodaño();
$meses = $test->meses();
$prioridad= $test->Prioridad();


?>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reportes por Mes</h5>

            <!-- Bar Chart -->
            <canvas id="barChart" style="max-height: 400px;"></canvas>
            <script>
                var dataFromPHP =<?php echo $meses; ?>;
                var meses = dataFromPHP.map(item => item.mes);
                var cant = dataFromPHP.map(item => item.cant);
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                            labels: meses,
                            datasets: [{
                                label: '',
                                data: cant,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>
            <!-- End Bar CHart -->

        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reportes por estado</h5>

            <!-- Pie Chart -->
            <canvas id="pieChart" style="max-height: 250px;"></canvas>
            <script>
                // Utiliza los datos JSON obtenidos de PHP
                var dataFromPHP =<?php echo $dataEstado; ?>;
                var values = dataFromPHP.map(item => item.cantidad_reportes);
                var labell = dataFromPHP.map(item => item.estado);
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#pieChart'), {
                        type: 'pie',
                        data: {
                            labels: labell,
                            datasets: [{
                                label: '',
                                data: values,
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                });
            </script>
            <!-- End Pie CHart -->
        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reportes por tipo de daño</h5>

            <!-- Radial Bar Chart -->
            <div id="radialBarChart"></div>

            <script>
                // Utiliza los datos JSON obtenidos de PHP
                var dataFromPHPd =<?php echo $dataDanos; ?>;
                var valuesd = dataFromPHPd.map(item => item.cantidad_danos);

                //Se suman los valores del JSON
                var suma = valuesd.reduce((total, valor) => total + valor, 0);

                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#radialBarChart"), {
                        series: valuesd,
                        chart: {
                            height: 270,
                            type: 'radialBar',
                            toolbar: {
                                show: true
                            }
                        },
                        plotOptions: {
                            radialBar: {
                                dataLabels: {
                                    name: {
                                        fontSize: '22px',
                                    },
                                    value: {
                                        fontSize: '16px',
                                        formatter: function (val) {
                                        return val; // Utiliza el valor directamente sin el símbolo de porcentaje
                                        }
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        formatter: function (w) {
                                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                            return suma
                                        }
                                    }
                                }
                            }
                        },
                        labels: ['Huecos', 'Baches', 'Hundimientos', 'Grietas','Piel de cocodrilo'],
                    }).render();
                });
            </script>
            <!-- End Radial Bar Chart -->

        </div>
    </div>
</div>

    <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ordenes de mantenimiento por prioridad</h5>

              <!-- Doughnut Chart -->
              <canvas id="doughnutChart" style="max-height: 250px;"></canvas>
              <script>
                // Utiliza los datos JSON obtenidos de PHP
                var dataFromPHP =<?php echo $prioridad; ?>;
                var valuesp = dataFromPHP.map(item => item.cantp);
                var labelp = dataFromPHP.map(item => item.prioridad);
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#doughnutChart'), {
                    type: 'doughnut',
                    data: {
                      labels: labelp,
                      datasets: [{
                        label:'',
                        data: valuesp,
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Doughnut CHart -->

            </div>
          </div>
    </div>