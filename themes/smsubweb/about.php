<?= $this->layout("_theme", ["head" => $head]); ?>

<section class="about_page">
    <div class="about_page_content content">
        <header class="about_header">
            <h1>É rápida, simples e funcional!</h1>
            <p>Com a agenda eletrônica você encontra os ramais dos mais variados setores de forma prática, rápida e eficiente.</p>
        </header>

        <!--FEATURES-->
        <div class="about_page_steps">
            <article class="radius">
                <header>
                    <span class="icon icon-check-square-o icon-notext"></span>
                    <h3>Utilize a agenda de contatos</h3>
                    <p>Basta digitar parte dos dados que a agenda localiza o setor, nome e ramal desejado.</p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <span class="icon icon-leanpub icon-notext"></span>
                    <h3>Setor, Nome e Ramal</h3>
                    <p>A agenda inteligente pesquisa cada palavra digitada e a cada espaço colocado combina a busca com a próxima palavra inserida.</p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <span class="icon icon-sign-in icon-notext"></span>
                    <h3>Envie seus dados</h3>
                    <p>Caso não encontre o ramal desejado, nos contate para caso necessário incluir o ramal não encontrado.</p>
                </header>
            </article>
        </div>
    </div>

    <aside class="about_page_cta">
        <div class="about_page_cta_content container content">
            <h2>Ainda não está usando a agenda inteligente?</h2>
            <p>Comece já, você tem acesso aos diversos ramais dos setores de SMSUB buscando por setor, nome e ramal. Caso não encontre o ramal desejado, entre em contato conosco no e-mail: <strong>cotisuporte@smsub.prefeitura.sp.gov.br</strong></p>
            <a href="mailto:<?=CONF_SITE_EMAIL?>" title="Suporte"
               class="about_page_cta_btn transition radius icon-check-square-o"><?=substr(CONF_SITE_EMAIL,0,12)?></a>
        </div>
    </aside>
</section>