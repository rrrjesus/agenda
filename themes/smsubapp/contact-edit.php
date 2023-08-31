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

            <div class="ajax_response"><?=flash();?></div>
            <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="contact-registers" action="<?=url("/dashboard/editar-contato")?>" method="post" enctype="multipart/form-data">

                <?=csrf_input();?>

                <div class="row justify-content-lg-center mb-3">
                    <div class="col-lg-4">
                        <label for="inputSector" class="col-lg-3 col-form-label-lg"><i class="icon-user-plus"></i>SETOR</label>
                        <input data-toggle="tooltip" value="<?=$edit->sector()->sector_name?>" title="DIGITE O SETOR" class="form-control form-control-lg sector" type="text" name="sector" placeholder="COTI"/>
                    </div>
                </div>

                <div class="row justify-content-lg-center mb-2">
                    <div class="col-lg-4">
                        <label for="inputCollaborator" class="col-lg-3 col-form-label-lg"><i class="fas fa-user-plus"></i> NOME</label>
                        <input data-toggle="tooltip" value="<?=$edit->collaborator?>" title="DIGITE O NOME" class="form-control form-control-lg" type="text" name="collaborator" placeholder="Primeiro nome:"/>
                    </div>
                </div>

                <div class="row justify-content-lg-center">
                    <div class="col-lg-4">
                        <label for="inputRamal" class="col-lg-3 col-form-label-lg"><i class="fas fa-contact-card"></i>RAMAL</label>
                        <input data-toggle="tooltip" value="<?=$edit->ramal?>" title="DIGITE O RAMAL" class="form-control form-control-lg ramal" type="text" name="ramal" placeholder="3000:"/>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?=$edit->id?>">

                <div class="row justify-content-lg-center mb-3">
                    <div class="col-lg-6">
                        <button data-toggle="tooltip" title="CRIAR CONTATO" class="auth_form_btn transition gradient gradient-red gradient-hover">Editar Contato</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>