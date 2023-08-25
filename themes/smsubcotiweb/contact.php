
<?= $this->layout("_theme", ["head" => $head]); ?>

<article class="blog_article">
                    <table id="example" class="table table-bordered border-info table-striped" style="width:100%">
                        <thead class="table-info">
                        <tr>
                            <th class="text-center"><i class="fas fa-pencil" aria-hidden="true">EDITAR</th>
                            <th class="text-center"><i class="fas fa-facebook" aria-hidden="true">SETOR</th>
                            <th class="text-center">NOME</th>
                            <th class="text-center">RAMAL</th>
                            <th class="text-center"><i class="fas fa-pencil" aria-hidden="true">EXCLUIR</th>
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
</article>
