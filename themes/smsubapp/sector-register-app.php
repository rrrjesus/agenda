<?= $this->layout("dashboard", ["head" => $head]); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Cadastro de Setor</h1>
        </header>

        <form class="auth_form" action="<?=url("/cadastrar-contato");?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?=flash();?></div>
            <?=csrf_input();?>
            <label>
                <div><span class="icon-user">Nome:</span></div>
                <input type="text" name="name" placeholder="Nome:" required/>
            </label>

            <label>
                <div><span class="icon-user-plus">Setor:</span></div>
                <input type="text" name="sector" placeholder="Setor:" required/>
            </label>

            <label>
                <div><span class="icon-envelope">Ramal:</span></div>
                <input type="number" name="ramal" placeholder="Ramal:" required/>
            </label>

            <button class="auth_form_btn transition gradient gradient-red gradient-hover">Criar Contato</button>
        </form>
    </div>
</article>