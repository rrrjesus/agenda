<?= $this->layout("_panel"); ?>

<h2 class="mt-4">Agenda</h2>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Lixeira de Contatos</li>
</ol>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card mb-4 border-secondary">
            <div class="card-header text-center fs-5 border-secondary text-secondary"><i class="bi bi-trash me-1"></i> Lista de Ramais Desativados <span class="badge bg-secondary rounded-pill"><?=$lixeira?></span>
            </div>
            <div class="card-body">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-12 ajax_response">
                            <?=flash();?>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-12 ml-auto text-center">
                            <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Clique para listar contatos" class="btn btn-outline-danger btn-sm fw-semibold" href="<?=url("/painel/agenda/lista")?>"
                               role="button"><i class="bi bi-arrow-right-circle me-2"></i>Sair</a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="col-12">
                            <table id="contactAppTrash" class="table table-sm table-bordered border-secondary table-striped" style="width:100%">
                                <thead class="table-secondary">
                                <tr>
                                    <th class="text-center">SETOR</th>
                                    <th class="text-center">NOME</th>
                                    <th class="text-center">RAMAL</th>
                                    <th class="text-center">EXCLUIDO EM:</th>
                                    <th class="text-center">RESTAURAR</th>
                                    <th class="text-center">DEFINITIVO?</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(!empty($contacts)):
                                        foreach ($contacts as $list):
                                ?>
                                    <tr>
                                        <?php if(!empty($list->sector) && $list->sector()->status == "post"):
                                            echo '<td class="text-center">'.$list->sector()->sector_name;
                                        else:
                                            echo '<td class="text-center text-danger"><del>'.$list->sector()->sector_name.'<del>';
                                        endif;
                                        ?></td>
                                        <td class="text-center"><?=$list->collaborator?></td>
                                        <td class="text-center"><span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill"><?=$list->ramal?></span></td>
                                        <td class="text-center"><?php if(empty($list->deleted_at)) {echo '';} else {date('d/m/Y H\hi', strtotime($list->deleted_at));}?></td>
                                        <td class="text-center"><?=$list->id?></td>
                                        <td class="text-center"><?=$list->id?></td>
                                    </tr>
                                <?php
                                        endforeach;
                                            else:
                                                echo '<div class="alert alert-danger fw-semibold text-center" role="alert"><i class="bi bi-book-half fs-5 me-2"></i> Não existem contatos na lixeira !!!</div>';
                                            endif;
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

