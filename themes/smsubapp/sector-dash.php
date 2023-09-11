<?= $this->layout("dashboard", ["head" => $head]); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/setores/")?>"><i class="bi bi-telephone"></i> Setores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-list"></i> Lista de Setores</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-2 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Lista de setores SMSUB</p>
    </div>

    <div class="row justify-content-center mb-0">
        <div class="col-md-12 ml-auto mt-3 text-center">
            <?=flash();?>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <table id="sectorApp" class="table table-bordered border-danger table-striped" style="width:100%">
                <thead class="table-danger">
                <tr>
                    <th class="text-center">EDITAR</th>
                    <th class="text-center">SETOR</th>
                    <th class="text-center">CRIADO</th>
                    <th class="text-center">EDITADO</th>
                    <th class="text-center">EXCLUIR</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($sector as $lista_sector): ?>
                <tr>
                    <td class="text-center"><?=$lista_sector->id?></td>
                    <td class="text-center"><?=$lista_sector->sector_name?></td>
                    <td class="text-center"><?=date('d/m/Y H\hi', strtotime($lista_sector->created_at))?></td>
                    <td class="text-center"><?=date('d/m/Y H\hi', strtotime($lista_sector->updated_at))?></td>
                    <td class="text-center"><?=$lista_sector->id?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

