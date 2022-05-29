var bwidth;

$(window).resize(function () {
  cwidth = $(window).width();

  /* console.log(cwidth); */
  if (cwidth <= 480 && cwidth >= 320) {
    bwidth = cwidth - 40;
  } else {
    bwidth = 185;
  }
});

var image_crop_pic = $("#image_demo_pic").croppie({
  enableExif: true,
  viewport: {
    width: 263.56,
    height: 248.49,
    type: "square", //circle
  },
  boundary: {
    width: bwidth,
    height: 700,
  },
});

function eveent() {
  for (let index = 1; index <= 3; index++) {
    $("#upload_image_pic_carousel" + index).on("change", function () {
      var n = index;
      var reader = new FileReader();
      reader.onload = function (event) {
        image_crop_pic
          .croppie("bind", {
            url: event.target.result,
          })
          .then(function () {
            /* console.log('jQuery bind complete'); */
          });
      };
      reader.readAsDataURL(this.files[0]);

      $("#numberCarousel").val(n);
      $("#uploadimageModal_pic").modal("show");
    });
  }
}

eveent();

$(".crop_image_pic").click(function (event) {
  image_crop_pic
    .croppie("result", {
      type: "canvas",
      size: "viewport",
    })
    .then(function (response) {
      $.ajax({
        url: baseURL + "upload_pic",
        type: "POST",
        data: {
          image_pic: response,
          number: $("#numberCarousel").val(),
        },
        success: function (data) {
          if (data == "true") {
            $("#uploadimageModal_pic").modal("hide");
            $("#car" + $("#numberCarousel ").val() + " div").remove();

            var number = $("#numberCarousel").val();

            document.querySelector("#car" + number).innerHTML = `
                                    <div class="img-pic-carousel col-sm" style="background-image: url('${baseURL}/assets/upload/carousel/carousel${number}.jpg' );">
                                        <div class="overlay_pic_view col-sm"></div>
                                        <div class="button_edit_foto_pic">
                                            <button>
                                                <label for="upload_image_pic_carousel${number}">Editar</label>
                                                <input type="file" id="upload_image_pic_carousel${number}" hidden="">
                                            </button>
                                        </div>
                                    </div>
                                    <br><br><br><br><br><br>
                                    <br><br><br><br><br><br><br>`;
          }
          eveent();
          Swal.fire({
            icon: "success",
            title: "Registro actualizado",
            text: "Imagen  actualizada correctamente",
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: "OK",
            allowEscapeKey: false,
            allowOutsideClick: false,
          });

          window.location.reload();
        },
        error: function (data) {
          console.log(data);
        },
      }).done(function (data) {
        console.log(data);
      });
    });
});

$(".edit-lema").hide();
$(".btn-ver-lema").hide();
$(".btn-update-lema").hide();

document.querySelector(".btn-edit-lema").addEventListener("click", () => {
  $(".edit-lema").show();
  $(".view-lema").hide();
  $(".btn-ver-lema").show();
  $(".btn-update-lema").show();
  $(".btn-edit-lema").hide();
});

document.querySelector(".btn-ver-lema").addEventListener("click", () => {
  $(".edit-lema").hide();
  $(".view-lema").show();
  $(".btn-ver-lema").hide();
  $(".btn-update-lema").hide();
  $(".btn-edit-lema").show();
});

document.querySelector(".btn-update-lema").addEventListener("click", () => {
  $.ajax({
    type: "post",
    url: baseURL + "update/lemas-sublemas",
    data: {
      lema1: $("#edit_lema1").val(),
      sublema1: $("#edit_sublema1").val(),
      lema2: $("#edit_lema2").val(),
      sublema2: $("#edit_sublema2").val(),
      lema3: $("#edit_lema3").val(),
      sublema3: $("#edit_sublema3").val(),
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

      window.location.reload();
    },
  });
});
