$(document).ready(function() {
    $('#tbl_marcas').DataTable();


    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: { // Default { width: 100, height: 100, type: 'square' } 
            width: 250,
            height: 150,
            type: 'square' //square
        },
        boundary: {
            width: 350,
            height: 300
        }
    });
    $('#image-marcas').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            resize.croppie('bind', {
                url: e.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('.btn-btn').removeClass('btn-primary').addClass('btn-warning');
        $('.btn-btn').removeClass('btn-save-marcas').addClass('btn-upload-image');
        $('.btn-btn').text('Recortar imagen')
    });

    $('.btn-upload-image').on('click', function(ev) {
        resize.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(img) {
            Swal.fire({
                title: 'Espere...',
                html: 'Recortando imagen...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                url: baseURL + "recortar-img",
                type: "POST",
                data: { "image": img },
                success: function(rsp) {
                    $('.btn-btn').removeClass('btn-warning').addClass('btn-primary');
                    $('.btn-btn').removeClass('btn-upload-image').addClass('btn-save-marcas');
                    $('.btn-btn').text('Guardar marca')
                    $(".container-image").html(rsp);
                    swal.close();
                }
            });
        });
    });
});