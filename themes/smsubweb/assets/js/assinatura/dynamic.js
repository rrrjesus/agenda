function dynamictext(){
    document.getElementById('nomeass').innerHTML = "Nome do Profissional";
    document.getElementById('unidadeass').innerHTML = "Unidade";
    document.getElementById('cargoass').innerHTML = "Cargo";
    document.getElementById('setorass').innerHTML = "Setor";
    document.getElementById('emailass').innerHTML = "@smsub.prefeitura.sp.gov.br"
    document.getElementById('telass').innerHTML = "(11) 4934-0000";
    document.getElementById('endass').innerHTML = "Endereço";
    document.getElementById('compass').innerHTML = "";
    document.getElementById('cepass').innerHTML = "Cep";
    document.getElementById('cidadeass').innerHTML = "São Paulo";
    document.getElementById('estadoass').innerHTML = "SP";


    document.getElementById('nomeinput').addEventListener('input', function(e){
        document.getElementById('nomeass').innerHTML = e.target.value.toUpperCase();
    });

    document.getElementById('unidadeinput').addEventListener('input', function(e){
        document.getElementById('unidadeass').innerHTML = e.target.value.toUpperCase();
    });

    document.getElementById('cargoinput').addEventListener('input', function(e){
        document.getElementById('cargoass').innerHTML = e.target.value.toUpperCase();
    });

    document.getElementById('setorinput').addEventListener('input', function(e){
        document.getElementById('setorass').innerHTML = e.target.value.toUpperCase();
    });

    document.getElementById('emailinput').addEventListener('input', function(e){
        document.getElementById('emailass').innerHTML = e.target.value.toLowerCase();
    });

    document.getElementById('endinput').addEventListener('input', function(e){
        document.getElementById('endass').innerHTML = e.target.value;
    })

    document.getElementById('compinput').addEventListener('input', function(e){
        if(e.target.value.length > 0){
            document.getElementById('compass').innerHTML = " | " + e.target.value;
        }
        else document.getElementById('compass').innerHTML = "";
    })

    document.getElementById('cidadeinput').addEventListener('input', function(e){
        document.getElementById('cidadeass').innerHTML = e.target.value;
    })

    document.getElementById('estadoinput').addEventListener('input', function(e){
        document.getElementById('estadoass').innerHTML = e.target.value;
    })

    document.getElementById('cepinput').addEventListener('input', function(e){
        document.getElementById('cepass').innerHTML = e.target.value;
    })

    /* ----------------------- FORMATAÇÃO DE TELEFONE ---------------------- */
    let phone1 = document.getElementById('phone1');
    phone1.addEventListener('input', format);
    phone1.addEventListener('input', input);

    function format(e){
        let x = e.target.value.replace(/\D/g, '');
        if(x[2] == 9){
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,1})(\d{0,4})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '' + x[3] : '') + (x[4] ? '-' + x[4] : '');
        }else{
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        }
    }
    function input(e){
        document.getElementById('telass').innerHTML = e.target.value;
    }

    /* ----------------------- FORMATAÇÃO DE CEP ---------------------- */

    let campocep = document.getElementById('cepinput');

    campocep.addEventListener('keyup', e => {
        handleZipCode(e);
    })

    const handleZipCode = (event) => {
        let input = event.target
        input.value = zipCodeMask(input.value)
    }

    const zipCodeMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{5})(\d)/,'$1-$2')
        return value
    }

}

function limpar(){
    document.getElementById('nomeinput').value = '';
    document.getElementById('unidadeinput').value = '';
    document.getElementById('cargoinput').value = '';
    document.getElementById('setorinput').value = '';
    document.getElementById('emailinput').value = '';
    document.getElementById('phone1').value = '';
    document.getElementById('endinput').value = '';
    document.getElementById('compinput').value = '';
    document.getElementById('cidadeinput').value = '';
    document.getElementById('estadoinput').value = '';
    document.getElementById('cepinput').value = '';

    //Reseta os dados presentes no placeholder

    document.getElementById('nomeass').innerHTML = "Nome do Profissional";
    document.getElementById('cargoass').innerHTML = "Cargo";
    document.getElementById('setorass').innerHTML = "Setor";
    document.getElementById('emailass').innerHTML = "@smsub.prefeitura.sp.gov.br"
    document.getElementById('telass').innerHTML = "(11) 4934-0000";
    document.getElementById('endass').innerHTML = "Endereço";
    document.getElementById('compass').innerHTML = "";
    document.getElementById('cepass').innerHTML = "Cep";
    document.getElementById('cidadeass').innerHTML = "São Paulo";
    document.getElementById('estadoass').innerHTML = "SP";


}