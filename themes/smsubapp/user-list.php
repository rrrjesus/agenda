<?= $this->layout("dashboard", ["head" => $head, "users" => $users]); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/usuarios/")?>"><i class="bi bi-telephone"></i> Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-list"></i> Lista de Usuários</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-2 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Lista de Usuários SMSUB</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 ajax_response">
            <?=flash();?>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-12 ml-auto text-center">
            <a data-bs-togglee="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip"
               data-bs-title="Clique para cadastrar novo usuario" class="btn btn-outline-success btn-sm me-3 fw-semibold" href="<?=url("/dashboard/cadastrar-usuario")?>"
               role="button"><i class="bi bi-telephone-plus me-2"></i>Novo</a>
            <?php if(!empty($lixo)){ ?>
                <a role="button" href="<?=url("/dashboard/lixeira-usuarios")?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                   data-bs-title="Clique para acessar a lixeira de contatos" class="btn btn-outline-secondary btn-sm position-relative fw-semibold"><i class="bi bi-trash-fill text-danger me-2">
                    </i> Lixo<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?=$lixo?></span></a>
            <?php } ?>

        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <table id="userApp" class="table table-bordered border-danger table-striped" style="width:100%">
                <thead class="table-danger">
                <tr>
                    <th class="text-center">EDITAR</th>
                    <th class="text-center">NOME</th>
                    <th class="text-center">E-MAIL</th>
                    <th class="text-center">STATUS</th>
                    <th class="text-center">FOTO</th>
                    <th class="text-center">CRIADO</th>
                    <th class="text-center">ALTERADO</th>
                    <th class="text-center">EXCLUIR?</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $listausers): ?>
                    <tr>
                        <td class="text-center"><?=$listausers->id?></td>
                        <td class="text-center"><?=$listausers->first_name." ".$listausers->last_name?></td>
                        <td class="text-center"><?=$listausers->email?></td>
                        <td class="text-center"><?=$listausers->status?></td>
                        <td class="text-center">
                            <?php
                            if(!empty($listausers->foto)):
                                echo $listausers->foto;
                            else:
                                echo $listausers->id;
                            endif;
                            ?>
                        </td>
                        <td class="text-center"><?=$listausers->created_at?></td>
                        <td class="text-center"><?=$listausers->updated_at?></td>
                        <td class="text-center"><?=$listausers->id?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

