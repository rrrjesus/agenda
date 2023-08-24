<?= $this->layout("_theme", ["head" => $head]); ?>

<!--FEATURED-->
<article class="home_featured">
    <div class="home_featured_content container content">
        <header class="home_featured_header">
            <h1>Agenda Inteligente</h1>
            <p>Faça já sua busca por setor, nome ou ramal. Para efetuar a atualização de ramais, favor enviar: Nome, Ramal e Setor para o e-mail</p>
            <a href="mailto:<?=CONF_SITE_EMAIL?>" title="Suporte"
               class="about_page_cta_btn transition radius icon-check-square-o"><?=CONF_SITE_EMAIL?></a>
            <p class="features">Rápido | Simples | Funcional</p><br>
        </header>
    </div>

</article>