<?php

include '../Controller/Estadisticas/Estadisticas_controller.php';
$test = new Estadisticas_controller();
$dataEstado = $test->Estado();
$dataDanos = $test->tipodaño();


?>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reportes por Mes</h5>

            <!-- Bar Chart -->
            <canvas id="barChart" style="max-height: 400px;"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                            datasets: [{
                                label: '',
                                data: [65, 59, 80, 81, 56, 55, 40],
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
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#pieChart'), {
                        type: 'pie',
                        data: {
                            labels: [
                                'Pendiente',
                                'En proceso',
                                'Completado'
                            ],
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

            <!-- Stacked Bar Chart -->
            <canvas id="stakedBarChart" style="max-height: 500px;"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#stakedBarChart'), {
                        type: 'bar',
                        data: {
                            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                            datasets: [{
                                label: 'Alta',
                                data: [-75, -15, 18, 48, 74],
                                backgroundColor: 'rgb(255, 99, 132)',
                            },
                            {
                                label: 'Media',
                                data: [-11, -1, 12, 62, 95],
                                backgroundColor: 'rgb(255, 205, 86)',
                            },
                            {
                                label: 'Baja',
                                data: [-44, -5, 22, 35, 62],
                                backgroundColor: 'rgb(75, 192, 192)',
                            },
                            ]
                        },
                        options: {
                            plugins: {
                            },
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                }
                            }
                        }
                    });
                });
            </script>
            <!-- End Stacked Bar Chart -->

        </div>
    </div>
</div>