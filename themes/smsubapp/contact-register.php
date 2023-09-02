<?= $this->layout("dashboard", ["head" => $head]); ?>

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

                    <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="contact-registers" action="<?=url("/dashboard/cadastrar-contato")?>" method="post" enctype="multipart/form-data">

                        <?=csrf_input();?>

                        <div class="row justify-content-center mb-3">
                            <div class="col-6">
                                <?=flash();?>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-6">
                                <strong><label for="inputSector" class="col-3 col-form-label"><i class="fas fa-table"></i> SETOR</label></strong>

                                <input data-toggle="tooltip" title="DIGITE O SETOR" class="form-control form-control sector" type="text" name="sector" placeholder="DIGITE O SETOR"/>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-2">
                            <div class="col-6">
                                <strong><label for="inputSector" class="col-3 col-form-label"><i class="fas fa-user-plus"></i> NOME</label></strong>
                                <input data-toggle="tooltip" title="DIGITE O NOME" class="form-control form-control" type="text" name="collaborator" placeholder="DIGITE O NOME"/>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <strong><label  for="inputSector" class="col-3 col-form-label"><i class="fas fa-phone-alt"></i> RAMAL</label></strong>
                                <input data-toggle="tooltip" title="DIGITE O RAMAL" maxlength="4" class="form-control form-control ramal" type="number" name="ramal" placeholder="DIGITE O SETOR"/>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3 mt-3">
                            <div class="col-md-3">
                                <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="SALVAR CONTATO" type="submit" class="btn btn-outline-success me-4"><strong><i class="fas fa-"></i> SALVAR</strong></button>
                                <button data-bs-toggle="tooltip" title="CRIAR CONTATO" class="btn btn-outline-info">LISTA</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>