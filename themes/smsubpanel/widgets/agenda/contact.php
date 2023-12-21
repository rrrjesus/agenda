<?= $this->layout("_panel"); ?>

<h2 class="mt-4 mb-4"><i class="bi bi-book-half me-1"></i> Agenda</h2>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <?php if (!$contact): ?>
        <div class="card mb-4 border-primary">
            <div class="card-header text-center bg-primary fs-4 border-primary text-light fw-semibold"><i class="bi bi-telephone-plus me-1"></i> Cadastrar Contato</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-center">
                            <div class="col-12">
                                <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="contact-register" action="<?=url("/painel/agenda/contatos")?>" method="post" enctype="multipart/form-data">

                                    <!-- ACTION SPOOFING-->
                                    <input type="hidden" name="action" value="create"/>

                                    <div class="row justify-content-center mb-3 mt-3">
                                        <div class="ajax_response col-xl-4 col-md-6">
                                            <?=flash();?>
                                        </div>
                                    </div>

                                    <?=csrf_input();?>

                                    <div class="row justify-content-center mb-3">
                                        <div class="col-xl-4 col-md-6">
                                            <strong><label for="inputSector" class="col-3 col-form-label"><i class="bi bi-globe-americas me-1"></i> SETOR</label></strong>
                                            <input data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                   data-bs-custom-class="custom-tooltip"
                                                   data-bs-title="Digite o setor"  class="form-control sector" type="text" name="sector" placeholder="DIGITE O SETOR"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-2">
                                        <div class="col-xl-4 col-md-6">
                                            <strong><label for="inputSector" class="col-3 col-form-label"><i class="bi bi-person-add me-1"></i> NOME</label></strong>
                                            <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                                   data-bs-title="Digite o nome" class="form-control" type="text" name="collaborator" placeholder="DIGITE O NOME"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-4 col-md-6">
                                            <strong><label  for="inputSector" class="col-3 col-form-label"><i class="bi bi-telephone me-1"></i> RAMAL</label></strong>
                                            <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                                   data-bs-title="Digite o ramal"  maxlength="4" class="form-control ramal" type="number" name="ramal" placeholder="DIGITE O SETOR"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mt-3 mb-3">
                                        <div class="col-auto">
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Clique para gravar o registro"
                                                    class="btn btn-outline-success fw-bold me-3"><i class="bi bi-disc-fill me-1"></i> GRAVAR</button>
                                            <a href="<?=url("/painel/agenda/lista")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" role="button"
                                               data-bs-custom-class="custom-tooltip"
                                               data-bs-title="Clique para listar os contatos" class="btn btn-outline-info fw-bold"><i class="bi bi-list-columns me-2"></i>LISTAR</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="card mb-4 border-primary">
            <div class="card-header text-center bg-primary fs-4 border-primary text-light fw-semibold"><i class="bi bi-telephone-plus me-1"></i> Editar Contato <?= $contact->id; ?></div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-center">
                        <div class="col-12">
                            <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="contact-register" action="<?=url("/painel/agenda/contatos/{$contact->id}")?>" method="post" enctype="multipart/form-data">

                                <!-- ACTION SPOOFING-->
                                <input type="hidden" name="action" value="update"/>

                                <div class="row justify-content-center mb-3 mt-3">
                                    <div class="ajax_response col-xl-4 col-md-6">
                                        <?=flash();?>
                                    </div>
                                </div>

                                <?=csrf_input();?>

                                <div class="row justify-content-center mb-3">
                                    <div class="col-xl-4 col-md-6">
                                        <strong><label for="inputSector" class="col-3 col-form-label"><i class="bi bi-globe-americas me-1"></i> SETOR</label></strong>
                                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Digite o setor"  class="form-control sector" type="text" name="sector"
                                               value="<?=(new \Source\Models\Sector())->findById($contact->sector)->sector_name?>" placeholder="DIGITE O SETOR"/>
                                    </div>
                                </div>

                                <div class="row justify-content-center mb-2">
                                    <div class="col-xl-4 col-md-6">
                                        <strong><label for="inputSector" class="col-3 col-form-label"><i class="bi bi-person-add me-1"></i> NOME</label></strong>
                                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Digite o nome" class="form-control" type="text" name="collaborator"
                                               value="<?=$contact->collaborator?>" placeholder="DIGITE O NOME"/>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-4 col-md-6">
                                        <strong><label  for="inputSector" class="col-3 col-form-label"><i class="bi bi-telephone me-1"></i> RAMAL</label></strong>
                                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Digite o ramal"  maxlength="4" class="form-control ramal" type="number"
                                               value="<?=$contact->ramal?>" name="ramal" placeholder="DIGITE O SETOR"/>
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-3 mb-3">
                                    <div class="col-auto">
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Clique para gravar o registro"
                                                class="btn btn-outline-success fw-bold me-3"><i class="bi bi-disc-fill me-1"></i> GRAVAR</button>
                                        <a href="<?=url("/painel/agenda/lista")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" role="button"
                                           data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Clique para listar os contatos" class="btn btn-outline-info fw-bold"><i class="bi bi-list-columns me-2"></i>LISTAR</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php  endif; ?>
    </div>
</div>

<script src="<?= url("/shared/scripts/jquery.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/typeahead.bundle.js"); ?>"></script>

    <script>

        let sector = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: <?=(new \Source\Models\Sector())->completeSector("sector_name")?>
        });
        sector.initialize();
        $('.sector').typeahead({hint: true, highlight: true, minLength: 1}, {source: sector});

        let ramal = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: <?=(new \Source\Models\Contact())->completeRamal("ramal")?>
        });
        sector.initialize();
        $('.ramal').typeahead({hint: true, highlight: true, minLength: 1}, {source: ramal});
    </script>