$(document).ready(function() {
    $(document).ready(function() {
        $('#tbl_user').DataTable();
    });
});

function alertError(text) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: text
    })
}
$('.session-btn').on('click', () => {
    let user = $('#input_user').val(),
        pwd = $('#input_pwd').val(),
        band = 0;
    if (user.length == 0) {
        $('#input_user').css('border-color', 'red')
        band = 1
    } else if (pwd.length == 0) {
        $('#input_pwd').css('border-color', 'red')
        band = 1
    }
    if (band == 1) {
        var text = 'Campos vacios'
        alertError(text)
    } else {
        Swal.fire({
            title: 'Espere...',
            html: 'Verificando credenciales...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        $.ajax({
            type: "POST",
            url: baseURL + "verificar_datos",
            data: {
                user: user,
                pwd: pwd
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp == 'success') {
                    window.location.href = baseURL + 'home'
                } else {
                    $('#input_user').css('border-color', 'red')
                    $('#input_pwd').css('border-color', 'red')
                    alertError('Usuario o contraseña incorrectos')
                }
            }
        });
    }
})