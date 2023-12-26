<?php $this->layout("_panel"); ?>

<div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-2 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-<?=CONF_PANEL_COLOR?>" href="<?=url("")?>"><i class="bi bi-house-door"></i> Painel</a></li>
            <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-<?=CONF_PANEL_COLOR?>" href="<?=url("/painel/agenda/ramais/ativados")?>"><i class="bi bi-telephone"></i> Ramais</a></li>
            <li class="breadcrumb-item fw-semibold active" aria-current="page"><i class="bi bi-list"></i> Ramais Ativos <span class="badge bg-<?=CONF_PANEL_COLOR?>" rounded-pill"><?=$ramais->ativos?></span></li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card mb-4 border-primary">
            <div class="card-body">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-12 ajax_response">
                            <?=flash();?>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-12 ml-auto text-center">
                            <a data-bs-togglee="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Clique para cadastrar novo contato" class="btn btn-outline-success btn-sm me-3 fw-semibold" href="<?=url("/painel/agenda/ramais/ramal")?>"
                               role="button"><i class="bi bi-telephone-plus me-2 mt-1"></i>Novo</a>
                            <?php if(!empty($ramais->desativados)){ ?>
                                <a role="button" href="<?=url("/painel/agenda/ramais/desativados")?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                                   data-bs-title="Clique para acessar a lixeira de contatos" class="btn btn-outline-secondary btn-sm position-relative fw-semibold mt-1"><i class="bi bi-trash-fill text-primary">
                                    </i> Lixo<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"><?=$ramais->desativados?></span></a>
                            <?php } ?>

                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="col-12">
                            <table id="extensions" class="table table-bordered table-sm border-primary table-hover" style="width:100%">
                                <thead class="table-primary">
                                <tr>
                                    <th class="text-center">EDITAR</th>
                                    <th class="text-center">SETOR</th>
                                    <th class="text-center">NOME</th>
                                    <th class="text-center">RAMAL</th>
                                    <th class="text-center">CRIADO EM:</th>
                                    <th class="text-center">EDITADO EM:</th>
                                    <th class="text-center">LIXEIRA</th>
                                    <th class="text-center">DEFINITIVO?</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($contatos as $lista): ?>
                                    <tr>
                                        <td class="text-center"><?=$lista->id?></td>
                                        <?php if(!empty($lista->sector) && $lista->sector()->status == 'active'):
                                            echo '<td class="text-center">'.$lista->sector()->sector_name.'</td>';
                                        else:
                                            echo '<td class="text-center text-primary">
                                                    <button type="button" class="btn btn-outline-success btn-sm rounded-circle me-2" data-bs-toggle="modal" data-bs-target="#trashModal">
                                                    <i class="bi bi-arrow-counterclockwise"></i></button>
                                                    <div class="modal fade" id="trashModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-secondary text-light">
                                                                    <h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-trash me-2"></i> Setor '.$lista->sector()->sector_name.'</h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body fw-semibold">Deseja reativar o setor : '.$lista->sector()->sector_name.' ?</div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>
                                                                    <a href="reativar-setor/'.$lista->sector.'" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <del>'.$lista->sector()->sector_name.'<del></td>';
                                        endif; ?>
                                        <td class="text-center"><?=$lista->collaborator?></td>
                                        <td class="text-center"><?=$lista->ramal?></td>
                                        <td class="text-center"><?=date('d/m/Y H\hi', strtotime($lista->created_at))?></td>
                                        <td class="text-center"><?=date('d/m/Y H\hi', strtotime($lista->updated_at))?></td>
                                        <td class="text-center"><?=$lista->id?></td>
                                        <td class="text-center"><?=$lista->id?></td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>