<?= $this->layout("dashboard", ["head" => $head]); ?>

<section class="contact_page">
    <div class="contact_page_content content">
        <header class="contact_header text-center">
            <h1>Lista de Setores de SMSUB</h1>
            <a class="btn btn-outline-success" href="<?=url("/dashboard/cadastrar-setor")?>" role="button"><i class="fas fa-plus-circle"></i> NOVO</a>
        </header>

            <table id="sector" class="table table-bordered border-danger table-striped" style="width:100%">
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

</section>

