<?= $this->layout("app", ["head" => $head, "user" => $user]); ?>

<section class="contact_page">
    <div class="contact_page_content content">
        <header class="contact_header text-center">
            <h1>Lista de Contatos de SMSUB</h1>
            <a class="btn btn-outline-success" href="<?=url("/app/cadastrar-contato")?>" role="button"><i class="fas fa-plus-circle"></i> NOVO</a>
        </header>

                    <table id="contactApp" class="table table-bordered border-danger table-hover table-responsive-sm" style="width:100%">
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

</section>

