<div class="feature col">
    <a title="<?=$post->title?>" href="<?= url("/blog/{$post->uri}"); ?>">
        <img class="img-thumbnail" title="<?=$post->title?>" alt="<?=$post->title?>" src="<?=image($post->cover, 600, 340)?>"/>
    </a>
    <p class="fs-6"><?=$post->category()->title?>
            &bull; Por <a title="Publicado por <?=$post->author()->first_name . $post->author()->last_name?>"
                    href="<?=url("/blog/por/{$post->author()->first_name}-{$post->author()->last_name}");?>">
                    <?="{$post->author()->first_name} {$post->author()->last_name}";?></a>
            &bull; <?=date_fmt($post->post_at)?></p>
        <h2><a title="<?=$post->title?>" href="<?= url("/blog/{$post->uri}"); ?>"><?=$post->title?></a></h2>
        <p><a title="<?=$post->title?>" href="<?= url("/blog/{$post->uri}"); ?>">
                <?=str_limit_chars($post->subtitle, 120)?></a></p>
    </header>
</div>