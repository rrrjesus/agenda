
<?= $this->layout("_theme", ["head" => $head]); ?>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h6 class="display-6 fw-normal text-body-emphasis">Agenda Inteligente SMSUB</h6>
            <p class="fs-6 text-body-secondary">Na barra <strong>Pesquisar</strong> cada espaço aplicado interliga as palavras digitadas para a pesquisa inteligente</p>
        </div>

        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="col-9">
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

