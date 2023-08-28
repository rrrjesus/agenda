<?= $this->layout("app", ["head" => $head]); ?>


<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1><i class="fas fa-comments"></i> Contato</h1>
        </header>
        <input type="hidden" name="code" value="<?=$ramal; ?>">
        <form class="auth_form" action="<?=url("/app/contato/editar")?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?=flash();?></div>
            <?=csrf_input();?>

            <label>
                <div><span class="icon-user-plus setor">Setor:</span></div>
                    <input type="text" name="sector" placeholder="Último nome:"/>
            </label>

            <label>
                <div><span class="icon-user">Nome:</span></div>
                <input type="text" name="collaborator" placeholder="Primeiro nome:"/>
            </label>

            <label>
                <div><span class="icon-envelope">Ramal:</span></div>
                <input type="text" name="ramal" placeholder="3000:"/>
            </label>

            <button class="auth_form_btn transition gradient gradient-red gradient-hover">Criar conta</button>
        </form>
    </div>
</article>