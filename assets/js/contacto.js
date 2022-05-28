$('.btn-save-contacto').on('click', () => {
    var about_us = $('.sobre-nosotros').val(),
        correo = $('#correo').val(),
        web = $('#facebook').val(),
        direccion = $('#direccion').val(),
        celular = $('#celular-contact').val(),
        fijo = $('#fijo-contact').val()

    if (about_us.length == 0 ||
        correo.length == 0 ||
        direccion.length == 0 ||
        celular.length == 0 ||
        fijo.length == 0) {
        alertError('Los campos con * son obligatorios')
    } else if (caracteresCorreoValido(correo)) {
        Swal.fire({
            title: 'Espere...',
            html: 'Actualizando datos...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        $.ajax({
            type: "POST",
            url: baseURL + "update-contacto",
            data: {
                about_us: about_us,
                correo: correo,
                web: web,
                direccion: direccion,
                celular: celular,
                fijo: fijo
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Contato actualizado',
                        text: 'Contato actualizado exitosamente',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'contactos'
                        }
                    })
                } else {
                    alertError('Ocurrio un error al momento de actualizar el contato. Intente de nuevo')
                }
            }
        });
    } else {
        alertError('El correo ingresado es incorrecto')
    }
})

function caracteresCorreoValido(email, div) {
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false) {
        return false;
    } else {
        return true;
    }
}