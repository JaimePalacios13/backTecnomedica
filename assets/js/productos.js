document.querySelector(".btn-save-producto").addEventListener("click", () => {
  img = $("#input_path_img").val();
  img = img.replace(/"/g, "");

  if (
    $("#producto").val().length == 0 ||
    $("categoria").val() == 0 ||
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
      success: function (response) {
        Swal.fire({
          icon: "success",
          title: "Registro actualizado",
          text: "Los datos se han actualizado correctamente",
          showDenyButton: false,
          showCancelButton: false,
          confirmButtonText: "OK",
          allowEscapeKey: false,
          allowOutsideClick: false,
        });
      },
      error: function (data) {
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
    width: 250,
    height: 150,
    type: "square", //square
  },
  boundary: {
    width: 350,
    height: 300,
  },
});
$("#image-productos").on("change", function () {
  var reader = new FileReader();
  reader.onload = function (e) {
    resize
      .croppie("bind", {
        url: e.target.result,
      })
      .then(function () {
        console.log("jQuery bind complete");
      });
  };
  reader.readAsDataURL(this.files[0]);
  $(".btn-save-productos").attr("hidden", true);
  $(".btn-upload-image-producto").removeAttr("hidden");
});

$(".btn-upload-image-producto").on("click", function (ev) {
  resize
    .croppie("result", {
      type: "canvas",
      size: "viewport",
    })
    .then(function (img) {
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
        success: function (rsp) {
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
