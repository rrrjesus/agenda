$(function () {

    $.validator.setDefaults({
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        },

        errorElement: 'label',
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

    $.validator.addMethod('ascento', function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    });

    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element)
            || value.length >= 8
    }, 'Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere.');


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

    //ajax form jquery
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