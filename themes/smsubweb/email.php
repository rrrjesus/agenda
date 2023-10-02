<?= $this->layout("_theme", ["head" => $head]); ?>


<head>
    <script src="<?=theme("/assets/js/assinatura/dom-to-image.js")?>"></script>
    <script src="<?=theme("/assets/js/assinatura/fileSaver2.js")?>"></script>
</head>

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
                            <div class="col-4">
                                <strong><label for="inputLogoTitle" class="col-4 col-form-label col-form-label-sm"><i class="bi bi-user-plus"></i> SUBPREFEITURA/S</label></strong>
                                <input data-bs-togglee="tooltip" data-bs-placement="left" maxlength="30" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite sua secretaria" class="form-control form-control-sm logotitleinp" name="logotitleinp" id="logotitleinp" type="text" placeholder="DIGITE A SECRETARIA/SUBPREFEIRURA"/>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-2">
                            <div class="col-4">
                                <strong><label for="inputNome" class="col-4 col-form-label col-form-label-sm"><i class="bi bi-user-plus"></i> NOME</label></strong>
                                <input data-bs-togglee="tooltip" data-bs-placement="left" maxlength="30" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite seu nome completo" class="form-control form-control-sm nomeinp" name="nomeinp" type="text" placeholder="DIGITE O NOME COMPLETO"/>
                            </div>

                            <div class="col-4">
                                <strong><label for="inputCargo" class="col-4 col-form-label col-form-label-sm"><i class="fas fa-user-plus"></i> CARGO</label></strong>
                                <input data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite seu cargo" class="form-control form-control-sm cargoinp" type="text" maxlength="42" name="cargoainp" placeholder="DIGITE O CARGO"/>
                            </div>

                            <div class="col-4">
                                <strong><label for="inputSector" class="col-4 col-form-label col-form-label-sm"><i class="fas fa-table"></i> SETOR</label></strong>
                                <input data-bs-togglee="tooltip" data-bs-placement="top"
                                       data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite seu setor"  class="form-control form-control-sm sector" type="text" maxlength="35" id="sector" name="sector" placeholder="DIGITE O SETOR"/>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-5">
                                <strong><label for="inputEmail" class="col-4 col-form-label col-form-label-sm"><i class="fas fa-phone-alt"></i> E-MAIL</label></strong>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" data-bs-togglee="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Digite apenas o início do e-mail" class="form-control form-control-sm emailinp" maxlength="47" placeholder="DIGITE APENAS O INÍCIO DO EMAIL">
                                    <span class="input-group-text">@smsub.prefeitura.sp.gov.br</span>
                                </div>
                            </div>

                            <div class="col-3">
                                <strong><label for="inputTelefone" class="col-2 col-form-label col-form-label-sm"><i class="fas fa-phone-alt"></i> RAMAL</label></strong>
                                <div class="input-group  input-group-sm mb-3">
                                    <span class="input-group-text">(11) 4934-</span>
                                    <input type="text" data-bs-togglee="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Digite apenas o ramal do telefone" class="form-control form-control-sm ramalinp" name="ramalinp" maxlength="4" placeholder="DIGITE OS 4 DÍGITOS">

                                </div>
                            </div>

                            <div class="col-2">
                                <strong><label for="inputEmail" class="col-2 col-form-label col-form-label-sm"><i class="fas fa-phone-alt"></i> ANDAR</label></strong>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" data-bs-togglee="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Digite apenas o número do andar" class="form-control form-control-sm andarinp" maxlength="2" placeholder="10, 23 ou 24" name="andarinp">
                                    <span class="input-group-text">º Andar</span>
                                </div>
                            </div>

                            <div class="col-2">
                                <strong><label for="inputTelefone" class="col-2 col-form-label col-form-label-sm"><i class="fas fa-phone-alt"></i> SALA</label></strong>
                                <div class="input-group  input-group-sm mb-3">
                                    <span class="input-group-text">Sala</span>
                                    <input type="text" data-bs-togglee="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Digite apenas o número e letra da sala" class="form-control form-control-sm salainp" maxlength="4" placeholder="Nº e LETRA" name="salainp">

                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="assinatura-email">
                                <div id="assinatura-download" class="assinatura-download">
                                    <div class="assinatura-logo p-3">
                                        <span class="me-0">
                                            <img id="logo-assinatura mb-0" src="<?=theme("/assets/images/assinatura/logo_assinatura_smsub.png")?>">
                                            <p class="aslogosubtitle fw-bold m-0 text-center"></p>
                                            <p class="aslogotitle fw-bold m-0 text-center"></p>
                                        </span>
                                    </div>
                                    <div class="assinatura-escrita">
                                        <div></div>
                                        <h4 class="asnome fw-bold m-0" id="asnome"></h4>
                                        <p class="cargo-setor m-0"><span class="ascargo"></span> / <span class="assector"></span> </p>
                                        <span class="informacoes">
                                            <p class="asemail m-0"></p>
                                            <p class="asramal m-0"></p>
                                            <p class="m-0"><small class="asendereco"></small><small class="asandar"></small><small class="assala"></small></p>
                                            <p class="m-0">01011 000 | São Paulo | SP</p>
                                            <p class="m-0">www.prefeitura.sp.gov.br/cidade/secretarias/subprefeituras</small></p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3 mb-3">
                            <div class="col-auto">
                                <button data-bs-togglee="tooltip" data-bs-placement="bottom"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Clique para gravar o registro" class="btn btn-outline-success btn-sm fw-bold me-3" onclick="dounloadAss()"><i class="bi bi-card-text me-1"></i> GERAR</button>
                                <a href="<?=url("/email")?>" data-bs-togglee="tooltip" data-bs-placement="bottom" role="button" data-bs-custom-class="custom-tooltip"
                                   data-bs-title="Clique para listar as assinaturas" class="btn btn-outline-danger btn-sm fw-bold"><i class="bi bi-list-columns me-2"></i>APAGAR</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

