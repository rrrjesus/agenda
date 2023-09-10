<?= $this->layout("dashboard", ["head" => $head]); ?>

    <div class="row mb-0">
        <div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none fw-bold text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Painel</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none fw-bold text-danger" href="<?=url("/dashboard/listar-contatos")?>"><i class="bi bi-telephone"></i> Contatos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil"></i> Edição</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12 text-center">

            <div class="ajax_response"><?=flash();?></div>

            <form class="row gy-2 gx-3 align-items-center needs-validation mt-5" novalidate id="contact-edit" action="<?=url("/dashboard/editar-contato")?>" method="post" enctype="multipart/form-data">

                <?=csrf_input();?>

                <div class="row justify-content-center mb-3">
                    <div class="col-auto">
                        <label for="inputSector" class="col-form-label"><i class="icon-user-plus"></i>SETOR</label>
                    </div>
                    <div class="col-8 col-sm-4">
                        <input data-toggle="tooltip" value="<?=$edit->sector()->sector_name?>" title="DIGITE O SETOR" class="form-control sector" type="text" name="sector" placeholder="COTI"/>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-auto">
                        <label for="inputCollaborator" class="col-form-label"><i class="bi bi-user-plus"></i> NOME</label>
                    </div>
                    <div class="col-8 col-sm-4">
                        <input data-toggle="tooltip" value="<?=$edit->collaborator?>" title="DIGITE O NOME" class="form-control" type="text" name="collaborator" placeholder="Primeiro nome:"/>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-auto">
                        <label for="inputRamal" class="col-form-label"><i class="bi bi-contact-card"></i>RAMAL</label>
                    </div>
                    <div class="col-8 col-sm-4">
                        <input data-toggle="tooltip" maxlength="4" value="<?=$edit->ramal?>" title="DIGITE O RAMAL" class="form-control ramal" type="number" name="ramal" placeholder="3000:"/>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?=$edit->id?>">

                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-auto">
                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="CLIQUE PARA GRAVAR" class="btn btn-outline-success fw-bold me-3"><i class="bi bi-disc-fill me-1"></i> GRAVAR</button>
                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="CLIQUE PARA LISTAR" class="btn btn-outline-info fw-bold"><i class="bi bi-list-columns me-2"></i>LISTAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>