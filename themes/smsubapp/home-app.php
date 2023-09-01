<?= $this->layout("dashboard", ["head" => $head]); ?>

<section class="contact_page">
    <div class="contact_page_content content">
        <header class="contact_header text-center">
            <h1>Painel de Controle SMSUB-TI</h1>
        </header>

        <div class="ajax_response"><?=flash();?></div>

        <table id="contact" class="table table-bordered border-danger table-striped" style="width:100%">
            <thead class="table-danger">
            <tr>
                <th class="text-center">EDITAR</th>
                <th class="text-center">NOME</th>
                <th class="text-center">E-MAIL</th>
                <th class="text-center">STATUS</th>
                <th class="text-center">FOTO</th>
                <th class="text-center">CRIADO</th>
                <th class="text-center">ALTERADO</th>
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
                        ?></td>
                    <td class="text-center"><?=$listausers->created_at?></td>
                    <td class="text-center"><?=$listausers->updated_at?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

</section>

