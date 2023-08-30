
<?= $this->layout("_theme", ["head" => $head]); ?>

<section class="contact_page">
    <div class="contact_page_content content">
        <header class="contact_header text-center">
            <h1>Agenda Inteligente SMSUB-COTI</h1>
            <p>Na barra <strong>Pesquisar</strong> cada espaço aplicado interliga as palavras digitadas para a pesquisa inteligente</p>
        </header>

        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="col-8">
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
        </div>

</section>

