<?php

use Source\Models\Post;

?>
<?= $this->layout("dashboard", ["head" => $head]); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-telephone"></i> Contatos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-graph-down"></i> Gráfico de Acesso - Contatos</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-2 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Gráfico de acesso - Agenda de contatos SMSUB</p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-6">
            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        </div>
        <div class="col-6">
            <canvas class="my-4 w-100" id="myChart1" width="900" height="380"></canvas>
        </div>
<!--        <div class="col-6">-->
<!--            <div id="chartContainer" style="height: 370px; width: 100%;"></div>-->
<!--        </div>-->
    </div>
</div>

<script>
    /* https://canvasjs.com/ */

    //window.onload = function () {
    //    var chart = new CanvasJS.Chart("chartContainer", {
    //        theme: "dark2",
    //        title: {
    //            text: ""
    //        },
    //        axisY: {
    //            title: ""
    //        },
    //        data: [{
    //            type: "line",
    //            dataPoints: <?php //=$post->chartPost()?>
    //        }]
    //    });
    //    chart.render();
    //}
</script>

<script>
    (() => {
        'use strict'
        // Graphs
        const ctx = document.getElementById('myChart')
        // eslint-disable-next-line no-unused-vars
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?=(new Post())->chartPostLabel()?>,
                datasets: [{
                    data: <?=(new Post())->chartPostLabel()?>,
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#861520',
                    borderWidth: 4,
                    pointBackgroundColor: '#dc2828'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        boxPadding: 3
                    }
                }
            }
        })
    })()
</script>

<script>
    (() => {
        'use strict'
        // Graphs
        const ctx = document.getElementById('myChart1')
        // eslint-disable-next-line no-unused-vars
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?=(new Post())->chartPostLabel()?>,
                datasets: [{
                    data: <?=(new Post())->chartPostLabel()?>,
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#861520',
                    borderWidth: 4,
                    pointBackgroundColor: '#dc2828'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        boxPadding: 3
                    }
                }
            }
        })
    })()
</script>
