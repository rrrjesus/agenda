<?= $this->layout("_theme"); ?>

<div class="form-signin w-100 m-auto">
    <form class="needs-validation" novalidate id="forget" data-reset="true" action="<?=url("/recuperar")?>" method="post" enctype="multipart/form-data">
        <?=csrf_input();?>

        <img class="mb-4" width="130" height="40" src="<?=theme("/assets/images/smsub_logo/SUBPREFEITURAS_HORIZONTAL_FUNDO_ESCURO.png")?>" alt="">
        <h1 class="h3 mb-3 fw-normal">Recuperar Senha</h1>
        <p>Informe seu e-mail para receber um link de recuperação.</p>

        <div class="ajax_response"><?=flash();?></div>

        <div class="form-floating mb-3">
            <input class="form-control" type="email" name="email" id="email"
                   placeholder="name@example.com" required/>
        </div>

        <p><a class="text-decoration-none fw-semibold text-info" href="<?= url("/entrar"); ?>">Voltar e entrar !</a></p>

        <button class="btn w-100 py-2 fw-bold text-light transition gradient gradient-blue gradient-hover" type="submit">Recuperar</button>
    </form>
</div>