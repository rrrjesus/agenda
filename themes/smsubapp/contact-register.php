<?= $this->layout("app", ["head" => $head]); ?>

<div class="container-fluid">
<div class="row mb-0">
    <div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
        <nav style="--bs-breadcrumb-divider: \'\';" aria-label="breadcrumb" id="nav-inicio">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fas fa-home-user me-2 text-primary"></i> <a class="text-uppercase" href="/">
                        <strong>INÍCIO </strong></a> <i class="fas fa-arrow-right ms-1 me-1"></i>
                </li>
                <li class="breadcrumb-item text-uppercase active"><strong>AGENDA</strong> </li>
            </ol>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>

    <div class="col-md-12 text-center">;
        <div class="card text-center">
            <div class="card-header">
                <h1><i class="fas fa-comments"></i> Contato</h1>
            </div>
            <div class="card-body">
                <h6 class="card-title"><div class="ajax_response"><?=flash();?></div></h6>
                    <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate action="<?=url("/app/contato/cadastrar")?>" method="post" enctype="multipart/form-data">

                        <?=csrf_input();?>

                        <div class="row justify-content-lg-center mb-3">
                            <div class="col-lg-3">
                                <label for="inputSector" class="form-label-lg"><i class="icon-user-plus"></i>SETOR</label>
                                <input class="form-control form-control-lg text-center sector" type="text" name="sector" placeholder="COTI"/>
                            </div>
                        </div>

                        <div class="row justify-content-lg-center mb-3">
                                <label for="inputSector" class="col-lg-1 col-form-label"><i class="fas fa-user-plus"></i> NOME</label>
                            <div class="col-lg-3">
                                <input class="form-control form-control-lg text-center" type="text" name="collaborator" placeholder="Primeiro nome:"/>
                            </div>
                        </div>

                        <div class="row justify-content-lg-center mb-3">
                            <div class="col-lg-3">
                                <label for="inputSector" class="form-label-lg"><i class="fas fa-contact-card"></i>RAMAL</label>
                                <input class="form-control form-control-lg text-center ramal" type="text" name="ramal" placeholder="3000:"/>
                            </div>
                        </div>

                        <div class="row justify-content-lg-center mb-3">
                            <div class="col-lg-3">
                            <button class="auth_form_btn transition gradient gradient-red gradient-hover">Criar conta</button>
                            </div>
                        </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
</div>
</div>