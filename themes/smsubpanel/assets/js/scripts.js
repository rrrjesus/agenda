/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$(document).ready(function() {

    $.validator.setDefaults({
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        },

        // errorElement: 'span',
        errorClass: 'help-block',

        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            }
            else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
                error.insertAfter(element.parent().parent());
            }
            else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                error.appendTo(element.parent().parent());
            }
            else if (element.prop('type') === 'password') {
                error.appendTo(element.parent());
            }
            else if (element.prop('type') === 'file') {
                error.appendTo(element.parent());
            }
            if (element.parent('select').length) {
                error.insertAfter(element.parent());
            }
            else {
                error.insertAfter(element);
            }
        }
    });

    $("#contact-register").validate({
        rules: {
            sector: {
                required: true
                // remote: "remote/valida-email.php"
            },
            collaborator: {
                required: true
            },
            ramal: {
                required: true,
                maxlength: 4
            }
        },
        messages: {
            sector: {
                required: "Digite o setor !!!"
                // remote: "Email não encontrado !!!"
            },
            collaborator: {
                required: "Digite o nome !!!"
            },
            ramal: {
                required: "Digite o ramal !!!",
                maxlength: "Ramais possuem apenas 4 dígitos !!!"
            }
        }
    });

    $("#sector-register").validate({
        rules: {
            sector: {
                required: true
            }
        },
        messages: {
            sector: {
                required: "Digite o setor !!!"
            }
        }
    });

    $("#contact-edit").validate({
        rules: {
            sector: {
                required: true
                // remote: "remote/valida-email.php"
            },
            collaborator: {
                required: true
            },
            ramal: {
                required: true
            }
        },
        messages: {
            sector: {
                required: "Digite o setor !!!"
                // remote: "Email não encontrado !!!"
            },
            collaborator: {
                required: "Digite o nome !!!"
            },
            ramal: {
                required: "Digite o ramal !!!"
            }
        }
    });

    $("#user-updated").validate({
        rules: {
            first_name: {
                required: true
                // remote: "remote/valida-email.php"
            },
            last_name: {
                required: true
            },
            email: {
                required: true
            },
            functional_record: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Digite o nome !!!"
                // remote: "Email não encontrado !!!"
            },
            last_name: {
                required: "Digite o sobrenome !!!"
            },
            email: {
                required: "Digite o e-mail !!!"
            },
            functional_record: {
                required: "Digite o RF !!!"
            }
        }
    });

    $("#user-profile").validate({
        rules: {
            first_name: {
                required: true
                // remote: "remote/valida-email.php"
            },
            last_name: {
                required: true
            },
            email: {
                required: true
            },
            functional_record: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Digite o nome !!!"
                // remote: "Email não encontrado !!!"
            },
            last_name: {
                required: "Digite o sobrenome !!!"
            },
            email: {
                required: "Digite o e-mail !!!"
            },
            functional_record: {
                required: "Digite o RF !!!"
            }
        }
    });

    $("#login").validate({
        rules: {
            email: {
                required: true
                // remote: "remote/valida-email.php"
            },
            password: {
                required: true,
                strongPassword: true
            }
        },
        messages: {
            email: {
                required: "Digite seu email !!!"
                // remote: "Email não encontrado !!!"
            },
            password: {
                required: "Digite sua senha !!!",
                strongPassword: "Sua senha deve ter pelo menos 8 caracteres"
            }
        }
    });

    $("#forget").validate({
        rules: {
            email: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Digite seu email !!!"
            }
        }
    });

    $("#email").validate({
        rules: {
            nomeinp: {
                required: true,
                maxlength: 50
            },
            cargoinp: {
                required: true,
                maxlength: 62
            },
            sector: {
                required: true,
                maxlength: 54
            },
            emailinp: {
                required: true
            }
        },
        messages: {
            nomeinp: {
                required: "Digite seu nome !!!",
                maxlength: "Por favor insira no máximo 50 caracteres"
            },
            cargoinp: {
                required: "Digite seu cargo !!!",
                maxlength: "Por favor insira no máximo 62 caracteres"
            },
            sector: {
                required: "Digite o setor !!!",
                maxlength: "Por favor insira no máximo 54 caracteres"
            },
            emailinp: {
                required: "Digite seu e-mail !!!"
            }
        }
    });

    // Exibir a senha no campo
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const password_re = document.querySelector('#password_re');

    togglePassword.addEventListener('click', () => {
        // Toggle the type attribute using
        // getAttribure() method
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        const type_re = password_re.getAttribute('type') === 'password' ? 'text' : 'password';
        password_re.setAttribute('type', type_re);
    });

    //  data-bs-toggle="tooltip" Bootstrap Title
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-togglee="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    //ajax form
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var load = $(".ajax_load");
        var flashClass = "ajax_response";
        var flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                }

                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>")
                            .find("." + flashClass).effect("bounce", 300);
                    }
                } else {
                    flash.fadeOut(100);
                }
            },
            complete: function () {
                load.fadeOut(200);

                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            }
        });
    })
});
