
<?= $this->layout("_theme", ["head" => $head]); ?>

<article class="blog_article">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center">SETOR</th>
                            <th class="text-center">NOME</th>
                            <th class="text-center">RAMAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($contact as $lista): ?>
                        <tr>
                            <td class="text-center"><?=$lista->sector()->sector_name?></td>
                            <td class="text-center"><?=$lista->collaborator?></td>
                            <td class="text-center"><?=$lista->ramal?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
</article>
