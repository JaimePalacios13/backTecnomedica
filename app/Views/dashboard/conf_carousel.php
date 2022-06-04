<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"
    integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="<?=base_url()?>/assets/css/carousel.css">
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h2><b>Imagenes del carousel</b></h2>
            </div>
        </div>

    </div>
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">Lemas</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Imagen Carousel 1</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Imagen Carousel 2</a>
                <a class="nav-item nav-link" id="carousel3-tab" data-toggle="tab" href="#carousel3" role="tab"
                    aria-controls="carousel3" aria-selected="false">Imagen Carousel 3</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row p-5">

                    <div class="col-sm-4">
                        <div class="row">
                            <!-- <div class="col-sm-12" id="car1">
            <div class="img-pic-carousel col-sm" style="background-image: url('<?= base_url() ?>/assets/upload/carousel/carousel1.jpg' );">
                <div class="overlay_pic_view col-sm"></div>
                <div class="button_edit_foto_pic">
                    <button>
                        <label for="upload_image_pic_carousel1">Editar</label>
                        <input type="file" id="upload_image_pic_carousel1" hidden="">
                    </button>
                </div>
            </div>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br><br>
        </div> -->

                            <div class="view-lema mt-3">
                                <div class="col-sm-12">
                                    Lema: <?= $imgs[0]["lema1"] ?>
                                </div>
                                <div class="col-sm-12">
                                    Sublema: <?= $imgs[0]["sublema1"] ?>
                                </div>
                            </div>

                            <div class="edit-lema mt-3">
                                <div class="col-sm-12">
                                    <label for="edit_lema1">Lema 1</label>
                                    <input type="text" class="form-control" value="<?= $imgs[0]["lema1"] ?>" name=""
                                        id="edit_lema1">
                                </div>
                                <div class="col-sm-12">
                                    <label for="edit_sublema1">Sublema 1</label>
                                    <input type="text" class="form-control" value="<?= $imgs[0]["sublema1"] ?>" name=""
                                        id="edit_sublema1">
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="col-sm-4">
                        <div class="row">
                            <!-- <div class="col-sm-12" id="car2">
            <div class="img-pic-carousel col-sm" style="background-image: url('<?= base_url() ?>/assets/upload/carousel/carousel2.jpg' );">
                <div class="overlay_pic_view col-sm"></div>
                <div class="button_edit_foto_pic">
                    <button>
                        <label for="upload_image_pic_carousel2">Editar</label>
                        <input type="file" id="upload_image_pic_carousel2" hidden="">
                    </button>
                </div>
            </div>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br><br>
        </div> -->

                            <div class="view-lema mt-3">
                                <div class="col-sm-12">
                                    Lema: <?= $imgs[0]["lema2"] ?>
                                </div>
                                <div class="col-sm-12">
                                    Sublema: <?= $imgs[0]["sublema2"] ?>
                                </div>
                            </div>

                            <div class="edit-lema mt-3">
                                <div class="col-sm-12">
                                    <label for="edit_lema2">Lema 2</label>
                                    <input type="text" class="form-control" value="<?= $imgs[0]["lema2"] ?>" name=""
                                        id="edit_lema2">
                                </div>
                                <div class="col-sm-12">
                                    <label for="edit_sublema2">Sublema 2</label>
                                    <input type="text" class="form-control" value="<?= $imgs[0]["sublema2"] ?>" name=""
                                        id="edit_sublema2">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="row">
                            <!-- <div class="col-sm-12" id="car3">
            <div class="img-pic-carousel col-sm" style="background-image: url('<?= base_url() ?>/assets/upload/carousel/carousel3.jpg' );">
                <div class="overlay_pic_view col-sm"></div>
                <div class="button_edit_foto_pic">
                    <button>
                        <label for="upload_image_pic_carousel3">Editar</label>
                        <input type="file" id="upload_image_pic_carousel3" hidden="">
                    </button>
                </div>
            </div>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br><br>
        </div> -->

                            <div class="view-lema mt-3">
                                <div class="col-sm-12">
                                    Lema: <?= $imgs[0]["lema3"] ?>
                                </div>
                                <div class="col-sm-12">
                                    Sublema: <?= $imgs[0]["sublema3"] ?>
                                </div>
                            </div>

                            <div class="edit-lema mt-3">
                                <div class="col-sm-12">
                                    <label for="edit_lema3">Lema 3</label>
                                    <input type="text" class="form-control" value="<?= $imgs[0]["lema3"] ?>" name=""
                                        id="edit_lema3">
                                </div>
                                <div class="col-sm-12">
                                    <label for="edit_sublema3">Sublema 3</label>
                                    <input type="text" class="form-control" value="<?= $imgs[0]["sublema3"] ?>" name=""
                                        id="edit_sublema3">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary float-right mt-3 btn-edit-lema"> Editar lemas y sublemas</button>
                        <button class="btn btn-primary float-right mt-3 btn-update-lema"> Guardar Cambios</button>
                        <button class="btn btn-primary float-right mt-3 btn-ver-lema"> Regresar</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row p-5">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="carousel1">Seleccione una imagen para el carousel 1</label>
                            <input type="file" class="form-control-file" id="carousel1">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm d-flex justify-content-center align-items-center">
                        <img src="" alt="" class="img-fluid img-selectioncarousel1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button type="button" hidden id="uploadImg1" class="btn-block btn btn-primary">Subir
                            imagen</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row p-5">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="carousel2">Seleccione una imagen para el carousel 2</label>
                            <input type="file" class="form-control-file" id="carousel2">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm d-flex justify-content-center align-items-center">
                        <img src="" alt="" class="img-fluid img-selectioncarousel2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button type="button" hidden id="uploadImg2" class="btn-block btn btn-primary">Subir
                            imagen</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="carousel3" role="tabpanel" aria-labelledby="carousel3-tab">
                <div class="row p-5">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="carousel_3">Seleccione una imagen para el carousel 3</label>
                            <input type="file" class="form-control-file" id="carousel_3">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm d-flex justify-content-center align-items-center">
                        <img src="" alt="" class="img-fluid img-selectioncarousel3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button type="button" hidden id="uploadImg3" class="btn-block btn btn-primary">Subir
                            imagen</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal cambio de pic carousel -->
        <div id="uploadimageModal_pic" class="modal" role="dialog">
            <div class="modal-dialog modal-lg w-50 mx-auto">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-muted">Recorte su imagen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mx-auto text-center">
                                <input type="hidden" id="numberCarousel">
                                <div id="image_demo_pic" style="height: auto;"></div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12">
                                <button class="btn btn-warning float-right crop_image_pic" id="upload_foto_pic"
                                    name="upload_foto_pic">Recortar y subir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="<?=base_url()?>/assets/js/carousel.js"></script>