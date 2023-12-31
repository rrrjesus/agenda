<?= $this->layout("_theme"); ?>

<!-- https://github.com/tsayen/dom-to-image version: 2.6.0 -->
<script src="<?=theme("/assets/js/email/dom-to-image.min.js")?>"></script>
<!-- https://github.com/eligrey/FileSaver.js version: 2.0.5 -->
<script src="<?=theme("/assets/js/email/FileSaver.min.js")?>"></script>

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
                <p class="fs-2 fw-normal text-body-emphasis pb-0"><i class="bi bi-credit-card-2-front me-2"></i> Gerador de Assinatura de E-mail SMSUB</p>
                <p class="fs-6 text-body-secondary pt-0">Gerador de assinatura de e-mail no padrão estabelecido no <strong>Manual de Identidade Visual da</strong>
                    <a class="text-decoration-none text-info fw-semibold" href="https://www.prefeitura.sp.gov.br/cidade/secretarias/upload/comunicacao/arquivos/manual_identidade_visual/manual_identidade/manual_de_identidade.pdf"
                    target="_blank">SECOM</a></p>
                <p class="fs-6 text-body-secondary pt-0">Em caso de dúvidas na utilização, acesse o
                    <a class="text-decoration-none text-info fw-semibold" href="<?=url("/themes/smsubweb/assets/manuais/manual_gerador_de_assinatura_smsub.pdf")?>"
                       target="_blank">Manual de Criação e Configuração de Assinatura</a></p>
            </div>

            <div class="d-flex justify-content-center">
                <div class="col-12">
                    <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="email" enctype="multipart/form-data">
                        <div class="row justify-content-center mb-2">

                            <div class="col-4">
                                <strong><label for="inputNome" class="col-4 col-form-label col-form-label-sm">NOME</label></strong>
                                <input tabindex="1" autofocus data-bs-togglee="tooltip" data-bs-placement="top" maxlength="50" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Comece a digitar seu nome, caso não apareça na lista, digite manualmente" class="form-control form-control-sm nomeinp" name="nomeinp" id="nomeinp" type="text" placeholder="DIGITE O NOME COMPLETO"/>
                            </div>

                            <div class="col-4">
                                <strong><label for="inputCargo" class="col-4 col-form-label col-form-label-sm">CARGO</label></strong>
                                <input tabindex="2" data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite o cargo que você ocupa" class="form-control form-control-sm cargoinp" type="text" maxlength="62" name="cargoinp" id="cargoinp" placeholder="DIGITE O CARGO"/>
                            </div>

                            <div class="col-4">
                                <strong><label for="inputSector" class="col-4 col-form-label col-form-label-sm">SETOR</label></strong>
                                <input tabindex="3" data-bs-togglee="tooltip" data-bs-placement="top"
                                       data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Digite o setor em que você trabalha"  class="form-control form-control-sm sector" type="text" maxlength="54" id="sector" name="sector" placeholder="DIGITE O SETOR"/>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-4">
                                <strong><label for="input" class="col-form-label col-form-label-sm">EMAIL</label></strong>
                                <div class="input-group input-group-sm mb-3">
                                    <input tabindex="4" type="text" aria-describedby="inputGroupPrepend" data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Preenchimento automático !!! Editável apenas se o e-mail não estiver preenchido !!!" class="form-control form-control-sm emailinp" id="emailinp"
                                           maxlength="47" name="emailinp" placeholder="DIGITE O INÍCIO">
                                    <span class="input-group-text" id="inputGroupPrepend">@smsub.prefeitura.sp.gov.br</span>
                                </div>
                            </div>

                            <div class="col-4">
                                <strong><label for="inputTelefone" class="col-2 col-form-label col-form-label-sm">RAMAL</label></strong>
                                <div class="input-group  input-group-sm mb-3">
                                    <input tabindex="5" type="text" data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Apenas se tiver, digite os 4 dígitos do ramal de telefone" class="form-control form-control-sm ramalinp" id="ramalinp"
                                           name="ramalinp" maxlength="4" placeholder="DIGITE OS 4 DÍGITOS">
                                </div>
                            </div>

                            <div class="col-2">
                                <strong><label for="inputAndar" class="col-2 col-form-label col-form-label-sm">ANDAR</label></strong>
                                <div class="input-group input-group-sm mb-3">
                                    <input tabindex="6" type="text" data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Apenas se tiver, digite apenas o número do andar" class="form-control form-control-sm andarinp" maxlength="2" placeholder="10, 23 ou 24" name="andarinp">
                                <span class="input-group-text">º Andar</span>
                                </div>
                            </div>

                            <div class="col-2">
                                <strong><label for="inputSala" class="col-2 col-form-label col-form-label-sm">SALA</label></strong>
                                <div class="input-group  input-group-sm mb-3">
                                    <input tabindex="7" type="text" data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                           data-bs-title="Apenas se tiver, digite apenas o número e letra da sala" class="form-control form-control-sm salainp" maxlength="4" placeholder="Nº e LETRA" name="salainp">
                                    <span class="input-group-text">Sala</span>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center mb-2">
                            <div class="col-5">
                                <strong><label for="inputLogoTitle" class="col-4 col-form-label col-form-label-sm">SMSUB/SUBS</label></strong>
                                <input tabindex="8" data-bs-togglee="tooltip" data-bs-placement="top" maxlength="50" data-bs-custom-class="custom-tooltip"
                                       value="SMSUB SAO BENTO" data-bs-title="Digite a Secretaria ou Subprefeitura" class="form-control form-control-sm secsubinp" name="secsubinp" id="secsubinp" type="text" placeholder="DIGITE A SECRETARIA/SUBPREFEIRURA"/>
                            </div>

                            <div class="col-5">
                                <strong><label for="inputLogoTitle" class="col-4 col-form-label col-form-label-sm">ENDEREÇO</label></strong>
                                <input tabindex="9" data-bs-togglee="tooltip" data-bs-placement="top" maxlength="64" data-bs-custom-class="custom-tooltip"
                                       data-bs-title="Preenchimento automático !!! Mas pode ser editado !!!" class="form-control form-control-sm enderecoinp" name="enderecoinp" id="enderecoinp" type="text"
                                       value="Rua São Bento, 405 - Edifício Martinelli - Centro " placeholder="ENDEREÇO DA SECRETARIA/SUBPREFEIRURA"/>
                            </div>

                            <div class="col-2">
                                <strong><label for="inputCep" class="col-4 col-form-label col-form-label-sm">CEP</label></strong>
                                <input tabindex="10" data-bs-togglee="tooltip" data-bs-placement="top" maxlength="9" data-bs-custom-class="custom-tooltip"
                                       value="01011-100" data-bs-title="Preenchimento automático !!! Mas pode ser editado !!!" class="form-control form-control-sm cepinp" name="cepinp" id="cepinp" type="text" placeholder="00000-000"/>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="assinatura-email">
                                <div id="assinatura-download" class="assinatura-download pt-3 pb-3">
                                    <div class="assinatura-logo pt-2 pb-2 pe-3 ps-3">
                                        <span class="aslogo me-0" id="aslogo"></span>
                                    </div>
                                    <div class="assinatura-escrita ps-4">
                                        <h4 class="asnome fw-bold m-0" id="asnome"></h4>
                                        <p class="cargo-setor mt-0 mb-2"><span class="ascargo"></span> / <span class="assector"></span> </p>
                                        <span class="informacoes">
                                            <p class="asemail m-0"></p>
                                            <p class="asramal m-0"></p>
                                            <p class="m-0"><small class="asendereco"></small></p>
                                             <p class="m-0"><small class="asandar"></small><small class="assala"></small></p>
                                            <p class="m-0"><small class="ascep"></small> | São Paulo | SP</p>
                                            <p class="asurl m-0">www.prefeitura.sp.gov.br/cidade/secretarias/subprefeituras</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3 mb-3">
                            <div class="col-auto">
                                <button tabindex="11" id="gerarpng" data-bs-togglee="tooltip" data-bs-placement="bottom"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Clique para gerar a assinatura" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="bi bi-card-text me-1"></i> GERAR</button>
                                <a href="<?=url("/email")?>" tabindex="12" data-bs-togglee="tooltip" data-bs-placement="bottom" role="button" data-bs-custom-class="custom-tooltip"
                                   data-bs-title="Clique para apagar os campos" class="btn btn-outline-secondary btn-sm fw-bold"><i class="bi bi-eraser me-1"></i>APAGAR</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php $this->start("scripts"); ?>
            <script>
                let ramalinp = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: <?=(new \Source\Models\Contact())->completeRamal("ramal")?>
                });
                ramalinp.initialize();
                $('.ramalinp').typeahead({hint: true, highlight: true, minLength: 1, limit: 8}, {source: ramalinp});

                let sector = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: <?=(new \Source\Models\Sector())->completeSector("sector_name")?>
                });
                sector.initialize();
                $('.sector').typeahead({hint: true, highlight: true, minLength: 1}, {source: sector});

                let nomeinp = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: <?=(new \Source\Models\Signature())->completeName("first_name, last_name")?>
                });
                nomeinp.initialize();
                $('.nomeinp').typeahead({hint: true, highlight: true, minLength: 1}, {source: nomeinp});



                let cargoinp = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: ['ANALISTA DE ORDENAMENTO TERRITORIAL' , 'ANALISTA FISCAL DE SERVICOS' , 'ASSESSOR I' , 'ASSESSOR II' , 'ASSESSOR III' ,
                        'ASSESSOR IV' , 'ASSESSOR JURIDICO II' , 'ASSESSOR V' , 'ASSESSOR VI' , 'ASSISTENTE ADMINISTRATIVO DE GESTAO' , 'ASSISTENTE DE SAUDE' ,
                        'ASSISTENTE DE SUPORTE OPERACIONAL' , 'CHEFE DE ASSESSORIA II' , 'CHEFE DE GABINETE' , 'COORDENADOR I' , 'DIRETOR I' , 'DIRETOR II' , 'DIRETOR JURIDICO I' ,
                        'FISCAL DE POSTURAS MUNICIPAIS' , 'PROCURADOR DO MUNICIPIO' , 'PROFISSIONAL ENG, ARQ, AGRONOMIA,GEOLOGIA - AGRONOMIA' , 'PROFISSIONAL ENG, ARQ, AGRONOMIA,GEOLOGIA - ARQUITETURA' ,
                        'PROFISSIONAL ENG, ARQ, AGRONOMIA,GEOLOGIA - ENGENHARIA CIVIL' , 'PROFISSIONAL ENG, ARQ, AGRONOMIA,GEOLOGIA - ENGENHARIA QUIMICA' , 'PROFISSIONAL ENG, ARQ, AGRONOMIA,GEOLOGIA - GEOLOGIA' ,
                        'SECRETARIO ADJUNTO' , 'SECRETARIO EXECUTIVO ADJUNTO' , 'SECRETARIO MUNICIPAL']
                });
                cargoinp.initialize();
                $('.cargoinp').typeahead({hint: true, highlight: true, minLength: 1}, {source: cargoinp});

                let secsubinp = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace, queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: <?=(new \Source\Models\Unit())->completeName("sigla, name")?>
                });
                secsubinp.initialize();
                $('.secsubinp').typeahead({hint: true, highlight: true, minLength: 1}, {source: secsubinp});
            </script>
            <?php $this->end(); ?>

