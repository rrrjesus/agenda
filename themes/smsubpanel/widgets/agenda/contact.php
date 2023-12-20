<?= $this->layout("_panel"); ?>

<h2 class="mt-4 mb-4">Agenda</h2>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card mb-4 border-primary">
            <div class="card-header text-center fs-5 border-primary text-primary"><i class="bi bi-book-half me-1"></i> Contatos</div>
                <div class="card-body">
                    <div class="container-fluid">

                        <div class="d-flex justify-content-center">
                            <div class="col-12">
                                <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="contact-register" action="<?=url("/painel/agenda/contatos/novo")?>" method="post" enctype="multipart/form-data">

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
                                            <strong><label for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-table"></i> SETOR</label></strong>
                                            <input data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                   data-bs-custom-class="custom-tooltip"
                                                   data-bs-title="Digite o setor"  class="form-control form-control-sm sector" type="text" name="sector" placeholder="DIGITE O SETOR"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mb-2">
                                        <div class="col-xl-4 col-md-6">
                                            <strong><label for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-user-plus"></i> NOME</label></strong>
                                            <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                                   data-bs-title="Digite o nome" class="form-control form-control-sm" type="text" name="collaborator" placeholder="DIGITE O NOME"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-4 col-md-6">
                                            <strong><label  for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-phone-alt"></i> RAMAL</label></strong>
                                            <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                                   data-bs-title="Digite o ramal"  maxlength="4" class="form-control form-control-sm ramal" type="number" name="ramal" placeholder="DIGITE O SETOR"/>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mt-3 mb-3">
                                        <div class="col-auto">
                                            <button data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Clique para gravar o registro"
                                                    class="btn btn-outline-success btn-sm fw-bold me-3" type="submit"><i class="bi bi-disc-fill me-1"></i> GRAVAR</button>
                                            <a href="<?=url("/painel/agenda/contatos")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" role="button"
                                               data-bs-custom-class="custom-tooltip"
                                               data-bs-title="Clique para listar os contatos" class="btn btn-outline-info btn-sm fw-bold"><i class="bi bi-list-columns me-2"></i>LISTAR</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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