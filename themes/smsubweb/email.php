<?= $this->layout("_theme", ["head" => $head]); ?>


<!DOCTYPE html>
<html lang="pt-BR">

<div class="container-fluid">
    <div class="d-flex justify-content-center mt-3">
        <div class="col-lg-12 col-sm-12 col-md-12"><!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-chevron p-3 mg-0 bg-body-tertiary rounded-3">
                    <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-info" href="<?=url("")?>"><i class="bi bi-house-door"></i> Início</a></li>
                    <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-info" href="<?=url("/email")?>"><i class="bi bi-envelope-at"></i> E-mail</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-credit-card-2-front"></i> Gerador de Assinatura de E-mail</li>
                </ol>
            </nav>

            <div class="pricing-header mx-auto text-center">
<!--                <img src="--><?php //=theme("/assets/images/smsub_logo/SUBPREFEITURAS_CETRALIZADO_FUNDO_CLARO.png")?><!--" class="img-fluid" width="100" height="100">-->
                <p class="fs-2 fw-normal text-body-emphasis pb-0"><i class="bi bi-credit-card-2-front me-2"></i> Assinatura de E-mail SMSUB</p>
                <p class="fs-6 text-body-secondary pt-0">Gerador de assinatura de e-mail no padrão estabelecido no Manual de Identidade Visual da
                    <a class="text-decoration-none text-info fw-semibold" href="https://www.prefeitura.sp.gov.br/cidade/secretarias/upload/comunicacao/arquivos/manual_identidade_visual/manual_identidade/manual_de_identidade.pdf"
                    target="_blank">SECOM</a></p>
            </div>

            <div class="d-flex justify-content-center">
                <div class="col-12">
                    <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="email" action="<?=url("/email")?>" method="post" enctype="multipart/form-data">

                        <div class="row justify-content-center mb-3">
                            <div class="col-6 ajax_response">
                                <?=flash();?>
                            </div>
                        </div>

                        <?=csrf_input();?>

                        <div class="row justify-content-center mb-2">
                            <div class="col-6">
                                <strong><label for="inputNome" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-user-plus"></i> NOME COMPLETO</label></strong>
                                <input data-bs-togglee="tooltip" data-bs-placement="left" maxlength="26" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite seu nome completo" class="form-control form-control-sm" type="text" name="nome" placeholder="DIGITE O NOME COMPLETO"/>
                            </div>
                            <p class="nome">RODOLFO</p>
                        </div>

                        <div class="row justify-content-center mb-2">
                            <div class="col-3">
                                <strong><label for="inputCargo" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-user-plus"></i> CARGO</label></strong>
                                <input data-bs-togglee="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite seu cargo" class="form-control form-control-sm" type="text" id="cargo" maxlength="35" name="cargo" placeholder="DIGITE O CARGO"/>
                            </div>

                            <div class="col-3">
                                <strong><label for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-table"></i> SETOR</label></strong>
                                <input data-bs-togglee="tooltip" data-bs-placement="left"
                                       data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite o setor"  class="form-control form-control-sm sector" type="text" id="setorinput" maxlength="35" name="sector" placeholder="DIGITE O SETOR"/>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <strong><label for="inputEmail" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-phone-alt"></i> E-MAIL</label></strong>
                                <div class="input-group  input-group-sm mb-3">
                                    <input type="text" data-bs-togglee="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Digite apenas o início do e-mail" class="form-control form-control-sm" id="emailinput" maxlength="47" name="email" placeholder="DIGITE APENAS O INÍCIO DO EMAIL">
                                    <span class="input-group-text">@smsub.prefeitura.sp.gov.br</span>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <strong><label for="inputTelefone" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-phone-alt"></i> RAMAL</label></strong>
                                <div class="input-group  input-group-sm mb-3">
                                    <span class="input-group-text">(11) 4934-</span>
                                    <input type="text" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Digite apenas o telefone sem o DDD" class="form-control form-control-sm" id="phone1" maxlength="4" placeholder="DIGITE O RAMAL DE 4 DÍGITOS" name="telefone">

                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?=theme("/assets/images/assinatura/new_logo_assinatura.png")?>" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h4 class="card-title cardnome"> ROMAIOLI</h4>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<!--                                    <div id="row-input" class="row"><div class="col-sm"><input type="text" class="form-control" id="endinput" maxlength="35" placeholder="Endereço"></div></div>-->
<!--                                    <div id="row-input" ><div class="col-sm"><input type="text" class="form-control" id="compinput" maxlength="35" placeholder="Complemento"></div></div>-->
<!--                                    <div id="row-input" class="row"><div class="col-sm"><input type="text" class="form-control" id="cepinput" maxlength="9" placeholder="CEP"></div></div>-->
<!--                                    <div id="row-input" ><div class="col-sm"><input type="text" class="form-control" id="cidadeinput" maxlength="30" placeholder="Cidade"></div></div>-->
<!--                                    <div id="row-input" ><div class="col-sm"><input type="text" class="form-control" id="estadoinput" maxlength="2" placeholder="Estado"></div></div>-->

                        <div class="row justify-content-center mt-3 mb-3">
                            <div class="col-auto">
                                <button data-bs-togglee="tooltip" data-bs-placement="bottom"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Clique para gravar o registro" class="btn btn-outline-success btn-sm fw-bold me-3" onclick="downloadimg()"><i class="bi bi-disc-fill me-1"></i> GRAVAR</button>
                                <a href="<?=url("/email")?>" data-bs-togglee="tooltip" data-bs-placement="bottom" role="button" data-bs-custom-class="custom-tooltip"
                                   data-bs-title="Clique para listar as assinaturas" class="btn btn-outline-danger btn-sm fw-bold"><i class="bi bi-list-columns me-2"></i>APAGAR</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>



