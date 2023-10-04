function dounloadAss() {
    var node = document.getElementById('assinatura-download');
    var nome = document.getElementById('asnome').innerText;

    domtoimage.toPng(node)
        .then(function (dataUrl) {
            window.saveAs(dataUrl, nome + ".png");
        }).catch(function (error) {
        console.error('Desculpe, algo deu errado !!!!', error);
    });
}

$(function(){
    $("input[name='nomeinp']").blur(function(){
        var $emailinp = $("input[name='emailinp']");

        $emailinp.val('Carregando...');

        $.getJSON(
            'themes/smsubweb/complete.php',
            { nomeinp: $( this ).val() },
            function( json )
            {
                $emailinp.val( json.emailinp );
            }
        );
    });
});

$(function () {
    $('.asnome').html("NOME COMPLETO");
    $('.ascargo').html("CARGO");
    $('.assector').html("SETOR");
    $('.aslogotitle').html("SUBPREFEITURAS");
    $('.aslogosubtitle').html("");
    $('.asendereco').html("Rua Líbero Badaró, 504 - Edifício Martinelli - Centro ");
    $('.ascep').html("01008-906");
    $('.asemail').html("email@smsub.prefeitura.sp.gov.br");
    $('.asramal').html("Tel : +55 (11) 4934-3000");

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
    $('.nomeinp').on('focusout',function(){
        var asnome = $('#nomeinp').val().toUpperCase();
        if(asnome==='') {
            $('.asnome').html("NOME COMPLETO");
        } else {
            $('.asnome').html(asnome);
        }
    });
    $('.cargoinp').on('focusout',function() {
        var ascargo = $('#cargoinp').val().toUpperCase();
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

    $('.enderecoinp').on( "keyup", function() {
        var asendereco = $('.enderecoinp').val().toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
            return a.toUpperCase();
        });
        if(asendereco==='') {
            $('.asendereco').html("Rua Líbero Badaró, 504 - Edifício Martinelli - Centro ");
        } else {
            $('.asendereco').html(asendereco);
        }
    });

    $('.cepinp').on( "keyup", function() {
        var ascep = $('.cepinp').val().toUpperCase();
        if(ascep==='') {
            $('.ascep').html("01008-906");
        } else {
            $('.ascep').html(ascep);
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
    $('.ramalinp').on('focusout',function() {
        var astelefone = 'Tel : +55 (11) 4934-';
        var asramal = $('#ramalinp').val();
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


