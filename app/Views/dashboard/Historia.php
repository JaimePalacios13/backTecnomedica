<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    textarea {
        font-family: sans-serif, monospace !important;
        font-size: 15px !important;
        border-radius: 10px !important;
        padding: 20px !important;
        border: 1px solid #c1c1c1 !important;
    }

    .cr-boundary{
        height: 300px !important;
    }
</style>
<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h2><b>Historia</b></h2>
            </div>
        </div>
    </div>

    <div class="card-body">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Historia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Imagen</a>
            </li>
        </ul>


        <div class="row mt-3">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-sm-9">
                                <h5> Historia: </h5>
                                <textarea class="form-control" maxlength="800" name="" id="historia" cols="30" rows="10" placeholder="Historia..."><?= $data[0]["historia"] ?></textarea>
                                <div class="counter font-weight-bolder text-right">0/800</div>
                            </div>
                            <div class="col-sm-3">
                                <h5>Frase:</h5>
                                <textarea class="form-control" name="" id="frase" maxlength="150" cols="30" rows="10" placeholder="Frase..."><?= $data[0]["frase"] ?></textarea>
                                <div class="counter font-weight-bolder text-right">0/800</div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-primary mt-3 float-right" id="btn-history">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <div class="grid">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="upload_image_pic">Seleccione una imagen</label>
                                            <input type="file" accept="image/png,image/jpeg" class="form-control-file" id="upload_image_pic">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 " id="container-img-historia">
                            <img src="" alt="" class="img-fluid img-selection-upload_h">
                            </div>
                            <div class="col-sm-6">
                                <div id="image_demo_pic">
                                </div>
                            </div>
                            <input type="text" id="input_path_img_historia">
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <button type="button" class="btn btn-btn btn-block btn-warning btn-upload-image">Recortar imagen</button>
                                <button type="button" hidden class="btn btn-btn btn-block btn-primary btn-save-image">Guardar imagen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/assets/js/historia.js"></script>