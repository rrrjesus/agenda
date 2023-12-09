<?= $this->layout("_theme"); ?>

<div class="form-signin w-100 m-auto mt-5">
    <form class="needs-validation" novalidate id="login" action="<?=url("/entrar")?>" method="post" enctype="multipart/form-data">
        <?=csrf_input();?>
        <h1 class="h3 mb-3 fw-normal">
            <img src="<?=theme("assets/images/logo_intra.png")?>" class="mb-1 me-2" alt="logo" width="30" height="30"><?=CONF_SITE_NAME?></h1>
        <p class="mb-4">Por favor insira seu login e senha!</p>
        <div class="ajax_response"><?=flash();?></div>

        <label for="inputPassword" class="form-label fw-semibold"><i class="bi bi-envelope-at pe-2"></i>Email</label>
        <div class="form-floating mb-3 mt-1">
            <input class="form-control" type="email" name="email" id="email" value="<?=($cookie ?? null)?>"
                   placeholder="nome@smsub.prefeitura.sp.gov.br" data-bs-togglee="tooltip" data-bs-placement="right"
                   data-bs-title="Digite seu email !!!">
        </div>

        <label for="inputPassword" class="form-label fw-semibold"><i class="bi bi-lock pe-2"></i>Senha</label>
        <div class="form-floating mb-3 mt-1">
            <input type="password" name="password" id="password" class="form-control" placeholder="********"
                   data-bs-togglee="tooltip" data-bs-placement="right" data-bs-title="Digite sua senha !!!">
        </div>

        <div class="form-check text-start my-2">
            <input class="form-check-input" type="checkbox" id="togglePassword">
            <label class="form-check-label" for="flexCheckDefault">
                Mostrar a Senha <span class="badge rounded-pill text-bg-dark ps-2" data-bs-togglee="tooltip" data-bs-placement="right"  data-bs-title="Selecione caso queira ver a senha">?</span>
            </label>
        </div>

        <p class="my-3"><a class="link-body-emphasis text-decoration-none fw-semibold text-danger" href="<?= url("/recuperar"); ?>">Esqueceu a senha ?</a></p>

        <div class="form-check text-start my-2">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault" <?=($cookie ? "checked" : "")?> name="save">
            <label class="form-check-label" for="flexCheckDefault">
                Lembrar dados? <span class="badge rounded-pill text-bg-dark ps-2" data-bs-togglee="tooltip"
                                     data-bs-placement="right"  data-bs-title="Selecione caso queira lembrar seus dados para login futuro">?</span>
            </label>
        </div>

        <div class="d-grid">
            <button class="btn btn-outline-<?=CONF_SITE_COLOR?> fw-semibold mt-3" type="submit" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-title="Clique para fazer o login">Entrar</button>
        </div>
    </form>
    <div>
        <p class="mb-0 mt-3">
            Não tem uma conta? <a href="<?=url("/cadastrar")?>" class="link-body-emphasis text-decoration-none fw-semibold text-primary"
                                  data-bs-togglee="tooltip" data-bs-placement="right" data-bs-title="Caso não tenha cadastro, clique aqui">
                Cadastre-se</a></p>
    </div>

</div>
