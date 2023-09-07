<?= $this->layout("_theme", ["head" => $head]); ?>

        <div class="form-signin w-100 m-auto">
            <form action="<?=url("/entrar")?>" method="post" enctype="multipart/form-data">
                <div class="ajax_response"><?=flash();?></div>
                <?=csrf_input();?>

                <img class="mb-4" width="130" height="40" src="<?=theme("/assets/images/smsub_logo/SUBPREFEITURAS_HORIZONTAL_FUNDO_ESCURO.png")?>" alt="">
                <h1 class="h3 mb-3 fw-normal">Fazer Login</h1>

                <div class="form-floating">
                    <input class="form-control" type="email" name="email" value="<?=($cookie ?? null)?>" id="floatingInput"
                       placeholder="name@example.com" required>
                    <label for="floatingInput"><i class="bi bi-at"></i> Informe Seu E-mail</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword"><i class="bi bi-lock-fill"></i> Informe sua senha</label>
                </div>

                <p><a class="fw-bold text-decoration-none text-info" title="Recuperar senha" href="<?= url("/recuperar"); ?>">Esqueceu a senha?</a></p>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault" <?=($cookie ? "checked" : "")?> name="save">
                    <label class="form-check-label" for="flexCheckDefault">
                        Lembrar dados?
                    </label>
                </div>
                <button class="btn w-100 py-2 fw-bold text-light transition gradient gradient-blue gradient-hover" type="submit">Entrar</button>
            </form>
        </div>