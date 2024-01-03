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

//  data-bs-toggle="tooltip" Bootstrap Title
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-togglee="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

$(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var load = $(".ajax_load");

        load.fadeIn(200).css("display", "flex");

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: form.serialize(),
            dataType: "json",
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    load.fadeOut(200);
                }

                //Error
                if (response.message) {
                    $(".ajax_response").html(response.message).effect("bounce");
                }
            },
            error: function (response) {
                load.fadeOut(200);
            }
        });
    });
});
});