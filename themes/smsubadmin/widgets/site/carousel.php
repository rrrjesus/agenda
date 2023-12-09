<?php $this->layout("_admin"); ?>
<?php $this->insert("widgets/site/sidebar"); ?>

<section class="dash_content_app">
    <header class="dash_content_app_header">
        <h2 class="icon-pencil-square-o">Carrossel</h2>

    </header>

    <div class="dash_content_app_box">
        <section>
            <div class="app_blog_home">
                <?php if (!$carousels): ?>
                    <div class="message info icon-info">Ainda não existem carrosseis cadastrados no sistema.</div>
                <?php else: ?>
                    <?php foreach ($carousels as $carousel):
                        $carouselCover = ($carousel->cover ? image($carousel->cover, 300) : "");
                        ?>
                        <article>
                            <div style="background-image: url(<?= $carouselCover; ?>);"
                                 class="cover embed radius"></div>
                            <h3 class="tittle">
                                <a target="_blank" href=" <?= url("/"); ?>">
                                    <?php if ($carousel->updated_at > date("Y-m-d H:i:s")): ?>
                                        <span class="icon-clock-o"><?= $carousel->title; ?></span>
                                    <?php else: ?>
                                        <span class="icon-check"><?= $carousel->title; ?></span>
                                    <?php endif; ?>
                                </a>
                            </h3>

                            <div class="actions">
                                <a class="icon-pencil btn btn-blue" title=""
                                   href="<?= url("/admin/site/carousel/{$carousel->id}"); ?>">Editar</a>

                                <a class="icon-trash-o btn btn-red" title="" href="#"
                                   data-post="<?= url("/admin/site/carousel"); ?>"
                                   data-action="delete"
                                   data-confirm="Tem certeza que deseja deletar esse post?"
                                   data-post_id="<?= $carousel->id; ?>">Deletar</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </section>
    </div>
</section>