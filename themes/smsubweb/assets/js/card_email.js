$(function () {
    $('.asnome').html("NOME COMPLETO");
    $('.ascargo').html("CARGO");
    $('.assetor').html("SETOR");
    $('.asemail').html("email@smsub.prefeitura.sp.gov.br");
    $('.astelefone').html("+55 (11) 4934-0000");
    $('.asendereco').html("Rua São Bento, 405 | ");
    $('.asandar').html("23");
    $('.assala').html("231A");

    $('.nomeinp').on('keyup',function(){
        var asnome = $('.nomeinp').val().toUpperCase();
        if(asnome==='') {
            $('.asnome').html("NOME COMPLETO");
        } else {
            $('.asnome').html(asnome);
        }
    });
    $('.cargoinp').on('keyup',function() {
        var ascargo = $('.cargoinp').val().toUpperCase();
        if(ascargo==='') {
            $('.ascargo').html("CARGO");
        } else {
            $('.ascargo').html(ascargo);
        }
    });
});
