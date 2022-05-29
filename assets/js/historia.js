const counterElem = document.querySelectorAll(".counter");
const maxLengthCounter = 800;
const textareaElem = document.querySelector("#historia");
const textareaElem2 = document.querySelector("#frase");

counterElem[0].innerHTML = `${textareaElem.value.length}/${maxLengthCounter}`;
counterElem[1].innerHTML = `${textareaElem2.value.length}/${150}`;

textareaElem.addEventListener("input", function (val) {
  let countInput = textareaElem.value.length;
  counterElem[0].innerHTML = `${countInput}/${maxLengthCounter}`;
});

textareaElem2.addEventListener("input", function (val) {
  let countInput = textareaElem2.value.length;
  counterElem[1].innerHTML = `${countInput}/${150}`;
});

document.querySelector("#btn-history").addEventListener("click", () => {
  $.ajax({
    type: "post",
    url: baseURL + "update/historia-frase",
    data: {
      historia: $("#historia").val(),
      frase: $("#frase").val(),
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
});

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

$("#upload_image_pic").on("change", function () {
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
});

$(".btn-upload-image").click(function (event) {
  image_crop_pic
    .croppie("result", {
      type: "canvas",
      size: "viewport",
    })
    .then(function (response) {
      $.ajax({
        url: baseURL + "upload_pic/historia",
        type: "POST",
        data: {
          image_pic: response,
        },

        success: function (data) {
          $("#container-img-historia img").remove();
          $("#container-img-historia").append(
            `<img src="${baseURL}/assets/upload/historia/historia.jpg" alt="" class="img-fluid">`
          );

          Swal.fire({
            icon: "success",
            title: "Registro actualizado",
            text: "Imagen subida correctamente",
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: "OK",
            allowEscapeKey: false,
            allowOutsideClick: false,
          });

          if (data == "true") {
            setTimeout(window.forceReload(), 2000);
          }
        },
        error: function (data) {
          console.log(data);
        },
      }).done(function (data) {
        console.log(data);
      });
    });
});

/* Final  editar pic*/
