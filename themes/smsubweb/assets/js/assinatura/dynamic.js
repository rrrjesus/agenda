function dynamictext(){
    document.getElementById('nomeass').innerHTML = "Nome do Profissional";
    document.getElementById('cargoass').innerHTML = "Cargo";
    document.getElementById('setorass').innerHTML = "Setor";
    document.getElementById('emailass').innerHTML = "@smsub.prefeitura.sp.gov.br"
    document.getElementById('telass').innerHTML = "";
    document.getElementById('endass').innerHTML = "Endereço : ";
    document.getElementById('compass').innerHTML = "";
    document.getElementById('cepass').innerHTML = "Cep";
    document.getElementById('cidadeass').innerHTML = "São Paulo";
    document.getElementById('estadoass').innerHTML = "SP";


    document.getElementById('nomeinput').addEventListener('input', function(e){
        document.getElementById('nomeass').innerHTML = e.target.value.toUpperCase();
    });

    document.getElementById('cargoinput').addEventListener('input', function(e){
        document.getElementById('cargoass').innerHTML = e.target.value.toUpperCase();
    });

    document.getElementById('setorinput').addEventListener('focusout', function(e){
        document.getElementById('setorass').innerHTML = e.target.value.toUpperCase();
    });

    document.getElementById('emailinput').addEventListener('input', function(e){
        document.getElementById('emailass').innerHTML = e.target.value.toLowerCase().concat('@smsub.prefeitura.sp.gov.br');
    });

    document.getElementById('emailinput').addEventListener('input', function(e){
        document.getElementById('emailass').innerHTML = e.target.value.toLowerCase().concat('@smsub.prefeitura.sp.gov.br');
    });

    document.getElementById('phone1').addEventListener('input', function(e){
        document.getElementById('telass').innerHTML = '(11) 4934-'.concat(e.target.value);
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

}