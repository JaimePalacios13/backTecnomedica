document.querySelector(".btn-save-producto").addEventListener("click", () => {
    img = $("#input_path_img").val();
    img = img.replace(/"/g, "");

    if (
        $("#producto").val().length == 0 ||
        $("#categoria").val() == 0 ||
        $("#marca").val() == 0 ||
        $("#descripcion").val().length == 0
    ) {
        alertError("Al parecer algunos campos estan vacios");
    } else if (img.length == 0) {
        alertError("Seleccione imagen");
    } else {
        $.ajax({
            type: "post",
            url: baseURL + "insert/producto",
            data: {
                nombre: $("#producto").val(),
                id_categoria: $("#categoria").val(),
                id_marca: $("#marca").val(),
                descripcion: $("#descripcion").val(),
                image: img,
            },
            dataType: "json",
            success: function(response) {
                Swal.fire({
                    icon: "success",
                    title: "Enhorabuena",
                    text: "EL producto se registro correctamente",
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'productos'
                    }
                })
            },
            error: function(data) {
                console.log("error");
                console.log(data);
            },
        });
    }
});

$(".btn-save-productos").attr("hidden", true);

var resize = $("#upload-demo").croppie({
    enableExif: true,
    enableOrientation: true,
    viewport: {
        // Default { width: 100, height: 100, type: 'square' }
        width: 255,
        height: 260,
        type: "square", //square
    },
    boundary: {
        width: 350,
        height: 300,
    },
});
$("#image-productos").on("change", function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        resize
            .croppie("bind", {
                url: e.target.result,
            })
            .then(function() {
                console.log("jQuery bind complete");
            });
    };
    reader.readAsDataURL(this.files[0]);
    $(".btn-save-productos").attr("hidden", true);
    $(".btn-upload-image-producto").removeAttr("hidden");
});

$(".btn-upload-image-producto").on("click", function(ev) {
    resize
        .croppie("result", {
            type: "canvas",
            size: "viewport",
        })
        .then(function(img) {
            Swal.fire({
                title: "Espere...",
                html: "Recortando imagen...",
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
            $.ajax({
                url: baseURL + "recortar-img/producto",
                type: "POST",
                data: { image: img },
                success: function(rsp) {
                    console.log(img);
                    var path = rsp.replace(/\\/g, "");
                    var image = baseURL + path;
                    image = image.replace(/"/g, "");
                    $(".btn-upload-image-producto").attr("hidden", true);
                    $(".btn-save-productos").removeAttr("hidden");
                    $("#input_path_img").val(image);
                    $(".img-selection-upload").attr("src", image);
                    /* $(".container-image").html(rsp); */
                    swal.close();
                },
            });
        });
});

function deleteProduct(id) {
    Swal.fire({
        title: '¿Está seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Espere...',
                html: 'Eliminando producto...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                type: "POST",
                url: baseURL + "deleteProduct",
                data: {
                    idproducto: id
                },
                dataType: "json",
                success: function(rsp) {
                    swal.close();
                    if (rsp == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto Eliminado',
                            text: 'Producto eliminado exitosamente',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'productos'
                            }
                        })
                    } else {
                        alertError('Ocurrio un error al momento de eliminar un producto. Intente de nuevo')
                    }
                }
            });
        }
    })
}