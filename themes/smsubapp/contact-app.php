<?= $this->layout("app", ["head" => $head, "user" => $user]); ?>

<section class="contact_page">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
                <nav style="--bs-breadcrumb-divider: \'\';" aria-label="breadcrumb" id="nav-inicio">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-home-user me-2 text-primary text-danger"></i> <a class="text-uppercase link-danger" href="/<?=CONF_SITE_DOMAIN?>/app">
                                <strong>INÍCIO </strong></a> <i class="fas fa-arrow-right ms-1 me-1"></i>
                        </li>
                        <li class="breadcrumb-item"> <a class="text-uppercase link-danger" href="/<?=CONF_SITE_DOMAIN?>/app/agenda">
                                <strong>AGENDA </strong></a> <i class="fas fa-arrow-right ms-1 me-1"></i>
                        </li>
                        <li class="breadcrumb-item text-uppercase"><strong>LISTA</strong> </li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12 text-center">
                <h3>Lista de Contatos de SMSUB</h3>
                    <div class="ajax_response"><?=flash();?></div>
                    <a class="btn btn-outline-success" href="<?=url("/app/contato")?>" role="button"><i class="fas fa-plus-circle"></i> NOVO</a>

                    <table id="contactApp" class="table table-bordered border-danger table-hover table-responsive-md" style="width:100%">
                        <thead class="table-danger">
                        <tr>
                            <th class="text-center">EDITAR</th>
                            <th class="text-center">SETOR</th>
                            <th class="text-center">NOME</th>
                            <th class="text-center">RAMAL</th>
                            <th class="text-center">EXCLUIR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($contact as $lista): ?>
                        <tr>
                            <td class="text-center"><?=$lista->id?></td>
                            <td class="text-center"><?=$lista->sector()->sector_name?></td>
                            <td class="text-center"><?=$lista->collaborator?></td>
                            <td class="text-center"><?=$lista->ramal?></td>
                            <td class="text-center"><?=$lista->id?></td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>

</section>

