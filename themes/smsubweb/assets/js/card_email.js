function dounloadAss() {
    var node = document.getElementById('assinatura-download');
    var nome = document.getElementById('asnome').innerText;

    domtoimage.toJpeg(node)
        .then(function (dataUrl) {
            window.saveAs(dataUrl, nome + ".jpg");
        }).catch(function (error) {
        console.error('Desculpe, algo deu errado !!!!', error);
    });
}

$(function () {
    $('.asnome').html("NOME COMPLETO");
    $('.ascargo').html("CARGO");
    $('.assector').html("SETOR");
    $('.aslogotitle').html("SUBPREFEITURAS");
    $('.aslogosubtitle').html("");
    $('.asemail').html("email@smsub.prefeitura.sp.gov.br");
    $('.asramal').html("Tel : +55 (11) 4934-3000");
    $('.asendereco').html("Rua São Bento, 405 / Rua Líbero Badaró, 504 - Centro ");

    $('.logotitleinp').on('focusout',function(){
        var aslogotitle = $('#logotitleinp').val().toUpperCase();
        if(aslogotitle==='') {
            $('.aslogosubtitle').html("");
            $('.aslogotitle').html("SUBPREFEITURAS");
        } else {
            $('.aslogosubtitle').html("SUBPREFEITURA");
            $('.aslogotitle').html(aslogotitle);
        }
    });
    $('.nomeinp').on('keyup',function(){
        $(this).val($(this).val().toUpperCase());
        var asnome = $('.nomeinp').val().toUpperCase();
        if(asnome==='') {
            $('.asnome').html("NOME COMPLETO");
        } else {
            $('.asnome').html(asnome);
        }
    });
    $('.cargoinp').on('keyup',function() {
        $(this).val($(this).val().toUpperCase());
        var ascargo = $('.cargoinp').val().toUpperCase();
        if(ascargo==='') {
            $('.ascargo').html("CARGO");
        } else {
            $('.ascargo').html(ascargo);
        }
    });
    $('.sector').on( "focusout", function() {
        var sector = $('#sector').val().toUpperCase();
        if(sector==='') {
            $('.assector').html("SETOR");
        } else {
            $('.assector').html(sector);
        }
    });
    $('.emailinp').on('keyup',function() {
        $(this).val($(this).val().toLowerCase());
        var asemail = $('.emailinp').val().toLowerCase();
        var alias = '@smsub.prefeitura.sp.gov.br';
        if(asemail==='') {
            $('.asemail').html("email@smsub.prefeitura.sp.gov.br");
        } else {
            $('.asemail').html(asemail + alias);
        }
    });
    $('.ramalinp').on('keyup',function() {
        var astelefone = 'Tel : +55 (11) 4934-';
        var asramal = $('.ramalinp').val();
        if(asramal==='') {
            $('.asramal').html("Tel : +55 (11) 4934-3000");
        } else {
            $('.asramal').html(astelefone + asramal);
        }
    });
    $('.andarinp').on('keyup',function() {
        var asandar = $('.andarinp').val().toUpperCase();
        var nomeAndar = 'º Andar';
        if(asandar==='') {
            $('.asandar').html("");
        } else {
            $('.asandar').html(asandar + nomeAndar);
        }
    });
    $('.salainp').on('keyup',function() {
        $(this).val($(this).val().toUpperCase());
        var nomeSala = ' - Sala ';
        var assala = $('.salainp').val().toUpperCase();
        if(assala==='') {
            $('.assala').html("");
        } else {
            $('.assala').html(nomeSala + assala);
        }
    });
});
