<?= $this->layout("_painel");?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Agenda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Início</li>
    </ol>
    <div class="row">

        <!-- Pending Requests Card Example -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Ramais Totais</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$ramais->totais?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-telephone bi-2x text-gray-300 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ramais Ativos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$ramais->ativos?></div>
                </div>
                        <div class="col-auto">
                            <i class="bi bi-telephone-forward bi-2x text-gray-300 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Ramais Inativos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$ramais->lixeira?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-telephone-x bi-2x text-gray-300 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Setores Totais</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$setores->totais?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-house bi-2x text-gray-300 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Setores Ativos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$setores->ativos?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-house-add bi-2x text-gray-300 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Setores Inativos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$setores->lixeira?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-house-dash bi-2x text-gray-300 text-danger"></i>
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
                   Acesso Diário a Agenda
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                   Acesso Mensal a Agenda
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
</div>

