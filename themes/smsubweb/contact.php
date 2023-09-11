
<?= $this->layout("_theme", ["head" => $head]); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-info" href="<?=url("")?>"><i class="bi bi-house-door"></i> Início</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-info" href="<?=url("/contatos")?>"><i class="bi bi-telephone"></i> Contatos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-list"></i> Lista de Contatos</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <p class="fs-2 fw-normal text-body-emphasis pb-0"><i class="bi bi-book-half"></i> Agenda Inteligente SMSUB</p>
        <p class="fs-6 text-body-secondary pt-0">Na barra <strong>Pesquisar</strong> cada espaço aplicado interliga as palavras digitadas para a pesquisa inteligente</p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
        <table id="contact" class="table table-bordered border-info table-striped" style="width:100%">
            <thead class="table-info">
            <tr>
                <th class="text-center">NOME</th>
                <th class="text-center">SETOR</th>
                <th class="text-center">RAMAL</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contact as $lista): ?>
            <tr>
                <td class="text-center"><?=$lista->collaborator?></td>
                <td class="text-center"><?=$lista->sector()->sector_name?></td>
                <td class="text-center"><?=$lista->ramal?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

