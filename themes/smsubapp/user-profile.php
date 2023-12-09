<?= $this->layout("dashboard"); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-2 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard/listar-usuarios")?>"><i class="bi bi-person"></i> Perfil</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-circle"></i> Editar Perfil</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-3 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Edição de Perfil SMSUB</p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="user-profile" action="<?=url("/dashboard/perfil")?>" method="post" enctype="multipart/form-data">

                <div class="row justify-content-center mb-3">
                    <div class="col-9 ajax_response">
                        <?=flash();?>
                    </div>
                </div>

                <?=csrf_input();?>

                <input type="hidden" name="update" value="true"/>

                <div class="app_formbox_photo">
                    <div class="rounded j_profile_image thumb" style="background-image: url('<?= $photo; ?>')"></div>
                    <div><input data-image=".j_profile_image" type="file" class="radius"  name="photo"/></div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-3">
                        <strong><label for="inputSector" class="col-2 col-form-label col-form-label-sm"><i class="bi bi-person me-2"></i> NOME</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom"
                               data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o setor"  class="form-control form-control-sm" type="text" name="first_name" value="<?=$user->first_name?>" placeholder="DIGITE O NOME"/>
                    </div>

                    <div class="col-5">
                        <strong><label for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-person me-2"></i>SOBRENOME</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o nome" class="form-control form-control-sm" type="text" name="last_name" value="<?=$user->last_name?>" placeholder="DIGITE O SOBRENOME"/>
                    </div>
                </div>


                <div class="row justify-content-center">
                    <label>
                        <span class="field icon-briefcase">Genero:</span>
                        <select name="genre" required>
                            <option value="">Selecione</option>
                            <option <?= ($user->genre == "male" ? "selected" : ""); ?> value="male">&ofcir; Masculino</option>
                            <option <?= ($user->genre == "female" ? "selected" : ""); ?> value="female">&ofcir; Feminino</option>
                            <option <?= ($user->genre == "other" ? "selected" : ""); ?> value="other">&ofcir; Outro</option>
                        </select>
                    </label>

                    <label>
                        <span class="field icon-calendar">Nascimento:</span>
                        <input class="radius mask-date" type="text" name="datebirth" placeholder="dd/mm/yyyy" required
                               value="<?= ($user->datebirth ? date_fmt($user->datebirth, "d/m/Y") : null); ?>"/>
                    </label>

                    <label>
                        <span class="field icon-briefcase">CPF:</span>
                        <input class="radius mask-doc" type="text" name="document" placeholder="Apenas números" required
                               value="<?= $user->document; ?>"/>
                    </label>
                </div>

                <div class="row justify-content-center">

                    <div class="col-3">
                        <strong><label  for="inputEmail" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-mailbox me-2"></i> EMAIL</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o email" class="form-control form-control-sm" type="email" name="email" value="<?=$user->email?>" placeholder="DIGITE O E-MAIL"/>
                    </div>

<!--                    <div class="col-3">-->
<!--                        <strong><label  for="inputLogin" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-mailbox me-2"></i> LOGIN</label></strong>-->
<!--                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"-->
<!--                               data-bs-title="Digite o login" class="form-control form-control-sm" type="text" name="functional_record" value="--><?php //=$user->functional_record?><!--" placeholder="DIGITE O E-MAIL"/>-->
<!--                    </div>-->
                </div>

                <div class="row justify-content-center">

                    <div class="col-3">
                        <strong><label  for="inputPassword" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-unlock me-2"></i> Senha</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite a nova senha" class="form-control form-control-sm" type="password" name="password"
                               placeholder="Sua senha de acesso"/>
                    </div>

                    <div class="col-3">
                        <strong><label  for="inputPassword" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-unlock me-2"></i>Repetir Senha</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite novamente a nova senha" class="form-control form-control-sm" type="password" name="password_re"
                               placeholder="Sua senha de acesso"/>
                    </div>
                </div>

                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-auto">
                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Clique para gravar o registro" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="bi bi-disc-fill me-1"></i> Atualizar</button>
                    </div>
                </div>
        </form>
    </div>
</div>

