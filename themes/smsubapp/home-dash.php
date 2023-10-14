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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>-->

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-2 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Gráfico de acesso - Agenda de contatos SMSUB</p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-6">
            <canvas class="my-4 w-100" id="graphicView" width="900" height="380"></canvas>
        </div>

        <div class="col-6">
            <canvas class="my-4 w-100" id="graphicPages" width="900" height="380"></canvas>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <canvas id="myChart" style="width:100%;max-width:1200px"></canvas>
        </div>
    </div>
</div>

<script>
    let graphicViews;
    graphicViews = (() => {
        'use strict'
        // Graphs
        const ctx = document.getElementById('graphicView')
        const dataX = <?=(new \Source\Models\Report\Access())->chart("pages", 30)?>
        // eslint-disable-next-line no-unused-vars
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?=(new \Source\Models\Report\Access())->chartDate("created_at", 30)?>,
                datasets: [{
                    label: 'Visualizações',
                    data: dataX,
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#861520',
                    borderWidth: 4,
                    pointBackgroundColor: '#dc2828',
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Visualizações de Páginas da Agenda',
                        font: {
                            size: 16
                        }
                    },
                    legend: {
                        display: true,
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        boxPadding: 3
                    }
                }
            }
        })
    })()

    let graphicPages;
    graphicPages = (() => {
        'use strict'
        // Graphs
        const ctx1 = document.getElementById('graphicPages')
        // eslint-disable-next-line no-unused-vars
        const myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: <?=(new \Source\Models\Post())->chart("uri", 30)?>,
                datasets: [{
                    label: 'Acessos',
                    data: <?=(new \Source\Models\Post())->chart("views", 30)?>,
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#861520',
                    borderWidth: 4,
                    pointBackgroundColor: '#dc2828'
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Acessos Diários por Páginas da Agenda'
                    },
                    legend: {
                        display: true
                    },
                    tooltip: {
                        boxPadding: 3
                    }
                }
            }
        })
    })()


    let graphicPages1;
    graphicPages1 = (() => {

    const xValues = <?=(new \Source\Models\Report\Access())->chartDate("created_at", 30)?>;

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                label: 'Usuários',
                data: <?=(new \Source\Models\Report\Access())->chart("users", 30)?>,
                borderColor: '#861520',
                borderWidth: 4,
                pointBackgroundColor: '#d81b02',
                fill: false
            },{
                label: 'Visualizações',
                data: <?=(new \Source\Models\Report\Access())->chart("views", 30)?>,
                borderColor: "green",
                borderWidth: 4,
                pointBackgroundColor: '#4ddc0c',
                fill: false
            },{
                label: 'Páginas',
                data: <?=(new \Source\Models\Report\Access())->chart("pages", 30)?>,
                borderColor: "blue",
                borderWidth: 4,
                pointBackgroundColor: '#06b8ee',
                fill: false
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Monitoramento de acessos da Agenda',
                    font: {
                        size: 16
                    }
                },
                legend: {
                    display: true
                },
                tooltip: {
                    boxPadding: 3
                }
            }
        }
    });
})()
</script>


