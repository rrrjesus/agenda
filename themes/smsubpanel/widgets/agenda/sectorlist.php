<?php $this->layout("_panel"); ?>

            <h1 class="mt-4">Agenda</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ramais</li>
            </ol>
            <div class="row">

                <!-- Ramais Totais da Agenda -->
                <div class="col-xl-4 col-md-4 mb-5">
                    <div class="card border-left-primary shadow h-100 py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-semibold text-primary text-uppercase mb-1 fs-6">Ativados</div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800"><?=$ramais->ativos?></div>
                                </div>
                                <div class="col-auto text-gray-300">
                                    <i class="bi bi-telephone bi-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ramais Totais da Agenda -->
                <div class="col-xl-4 col-md-4 mb-5">
                    <div class="card border-left-primary shadow h-100 py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-semibold text-primary text-uppercase mb-1 fs-6">Desativados</div>
                                    <div class="h6 mb-1 font-weight-bold text-gray-800"><?=$ramais->desativados?></div>
                                </div>
                                <div class="col-auto text-gray-300">
                                    <i class="bi bi-telephone bi-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ramais Totais da Agenda -->
                <div class="col-xl-4 col-md-4 mb-5">
                    <div class="card border-left-primary shadow h-100 py-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="fw-semibold text-primary text-uppercase mb-1 fs-6">Total</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800"><?=$ramais->totais?></div>
                                </div>
                                <div class="col-auto text-gray-300">
                                    <i class="bi bi-telephone bi-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>