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
    </div>

    <div class="col-md-12 text-center">;

                <h6 class="card-title"><div class="ajax_response"><?=flash();?></div></h6>
                    <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate action="<?=url("/app/contato/cadastrar")?>" method="post" enctype="multipart/form-data">

                        <?=csrf_input();?>

                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>

                        <div class="row justify-content-lg-center mb-3">
                            <div class="col-lg-4">
                                <label for="inputSector" class="col-lg-3 col-form-label-lg"><i class="icon-user-plus"></i>SETOR</label>

                                <input class="form-control form-control-lg text-center sector" type="text" name="sector" placeholder="COTI"/>
                            </div>
                        </div>

                        <div class="row justify-content-lg-center mb-2">
                            <div class="col-lg-4">
                                <label for="inputSector" class="col-lg-3 col-form-label-lg"><i class="fas fa-user-plus"></i> NOME</label>
                                <input class="form-control form-control-lg text-center" type="text" name="collaborator" placeholder="Primeiro nome:"/>
                            </div>
                        </div>

                        <div class="row justify-content-lg-center">
                            <div class="col-lg-4">
                                <label for="inputSector" class="col-lg-3 col-form-label-lg"><i class="fas fa-contact-card"></i>RAMAL</label>
                                <input class="form-control form-control-lg text-center ramal" type="text" name="ramal" placeholder="3000:"/>
                            </div>
                        </div>

                        <div class="row justify-content-lg-center mb-3">
                            <div class="col-lg-6">
                            <button class="auth_form_btn transition gradient gradient-red gradient-hover">Criar conta</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>