function verUser(iduser) {
    Swal.fire({
        title: 'Quieres eliminar este usuario?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "POST",
                url: baseURL + "delete_user",
                data: {
                    iduser: iduser
                },
                dataType: "json",
                success: function(rsp) {
                    if (rsp == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario eliminado',
                            text: 'Usuario eliminado exitosamente',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'usuarios'
                            }
                        })
                    } else {
                        alertError('Al parecer ocurrio un error, intenta de nuevo')
                    }
                }
            });
        }
    })
}

function generateP() {
    var pass = '';
    var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +
        'abcdefghijklmnopqrstuvwxyz0123456789';

    for (i = 1; i <= 5; i++) {
        var char = Math.floor(Math.random() * str.length + 1);
        pass += str.charAt(char)
    }

    $('#input_pwd').val(pass);
}

$('#check_viewpwd').on('change', function() {
    if ($(this).is(':checked')) {
        $('#input_pwd').attr('type', 'text');
    } else {
        $('#input_pwd').attr('type', 'password');
    }
});

$('.new_user').on('click', () => {
    var nombre = $('#nombre_user').val(),
        usuario = $('#usuario').val(),
        pwd = $('#input_pwd').val(),
        band = 0

    if (nombre.length == 0) {
        $('#nombre_user').css('border-color', 'red')
        band = 1
    } else if (usuario.length == 0) {
        $('#usuario').css('border-color', 'red')
        band = 1
    } else if (pwd.length == 0 || pwd.length < 4) {
        $('#input_pwd').css('border-color', 'red')
        band = 1
    }

    if (band == 1) {
        alertError('Al parecer algunos campos estan vacios')
    } else {
        $('#nombre_user').css('border-color', 'green')
        $('#usuario').css('border-color', 'green')
        $('#input_pwd').css('border-color', 'green')
        Swal.fire({
            title: 'Espere...',
            html: 'Verificando datos...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        $.ajax({
            type: "POST",
            url: baseURL + "new_user",
            data: {
                nombre: nombre,
                usuario: usuario,
                pwd: pwd
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp == 'existe') {
                    alertError('El usuario ingresado ya existe');
                    $('#usuario').css('border-color', 'red')
                } else if (rsp == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario creado',
                        text: 'Usuario creado exitosamente',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'usuarios'
                        }
                    })
                } else {
                    alertError('Ocurrio un error al momento de crea un nuevo usuario. Intente de nuevo')
                }
            }
        });
    }

})