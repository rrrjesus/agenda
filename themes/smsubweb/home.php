<?= $this->layout("_theme", ["head" => $head]); ?>

<!--FEATURED-->
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?=theme("/assets/images/help_desk_coti.jpg")?>" width="100%" height="100%">
                <div class="container">
                    <div class="carousel-caption" style="text-shadow: 0.1em 0.1em 0.2em #063cee">
                        <h1>Service Desk COTI.</h1>
                        <p>As vantagens e agilidade que o serviço de suporte traz para seu dia dia na SMSUB.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Saiba Mais">Saiba Mais</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>One more for good measure.</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Os 3 pilares do Suporte de TI COTI</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-success bg-gradient fs-2 mb-3">
                    <i class="bi bi-wrench-adjustable-circle mb-3"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">Service Desk COTI</h3>
                <p>Para <a href="<?=url("/blog/suporte-tecnico")?>" class="text-decoration-none fw-bold">suporte técnico</a> é necessário a abertura de chamado no
                    <a href="<?=url("/blog/servicedesk")?>" class="text-decoration-none fw-bold">Service Desk COTI</a>.
                    Basta clicar no icone do aplicativo que fica na área de trabalho dos computadores de <strong>SMSUB</strong> e abrir um chamado. É possivel acompanhar
                    as tratativas do chamado no aplicativo.</p>
                <a href="<?=url("/blog/servicedesk")?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="bottom" data-bs-title="Saiba Mais">Saiba Mais</a>
            </div>
            <div class="feature col">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-warning bg-gradient fs-2 mb-3">
                    <i class="bi bi-envelope-at mb-3 text-light"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">E-mail COTI</h3>
                <p>Existe um e-mail de contato para <strong>COTI</strong> caso necessário : <a class="text-decoration-none fw-bold" href="mailto:<?=CONF_SITE_EMAIL?>"><?=CONF_SITE_EMAIL?></a>,
                    mas os chamados de suporte técnico ainda assim devem ser realizados através do nosso
                    <a href="<?=url("/blog/servicedesk")?>" class="text-decoration-none fw-bold">Service Desk COTI</a> para que sejam devidamente tratados e solucionados.</p>
                <a href="<?=url("/blog/e-mail-coti")?>" class="btn btn-primary">Saiba Mais</a>
            </div>
            <div class="feature col">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-danger bg-gradient fs-2 mb-3">
                    <i class="bi bi-telephone-forward mb-3 text-light"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">Ramais COTI</h3>
                <p>Por fim e não menos importante, os ramais de atendimento <strong>COTI</strong> na
                    <a href="<?=url("/contatos")?>" class="text-decoration-none fw-bold">agenda</a> de <strong>SMSUB</strong>. É só acessar e pesquisar na agenda por
                    <strong>COTI</strong> e aparecerão os ramais de contato com os nomes dos servidores que atenderão os mesmos.</p>
                <a href="<?=url("/blog/ramais-coti")?>" class="btn btn-primary">Saiba Mais</a>
            </div>
        </div>
    </div>

<!--BLOG-->
    <?php if(!empty($blog)): ?>
    <div class="container px-4 py-5" id="featured-3">
        <div class="row text-center">
            <h2>Nossos artigos</h2>
            <p class="fs-5">Confira nossas dicas para faciltar seu suporte</p>
        </div>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <?php foreach ($blog as $post): ?>
                    <?php $this->insert("blog-list", ["post" => $post]); ?>
                <?php endforeach; ?>
        </div>
    </div>
    <?php endif;?>