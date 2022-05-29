<style>
    #text-area-m,
    #text-area-v {
        font-family: sans-serif, monospace;
        font-size: 15px;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #c1c1c1;
    }
</style>

<div class="container mt-3">
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h2><b>Misión y visión</b></h2>
                </div>
            </div>

        </div>
        <div class="card-body">


            <div class="row mt-3">

                <div class="col-sm-2 mb-5  align-self-center">
                    <ul class="list-unstyled timeline">
                        <li>
                            <div class="tags float-right">
                                <a href="" class="tag d-block">
                                    <span style="font-size: 15px">Misión</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-10 mx-auto">
                    <textarea required id="text-area-m" class="form-control" maxlength="400" rows="5" name="vision" placeholder="Misión..."><?= $data[0]["mision"] ?></textarea>
                </div>

                <div class="col-sm-12 mt-2 text-right">
                    <div class="counter font-weight-bolder">0/400</div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-sm-2 mb-5  align-self-center">
                    <ul class="list-unstyled timeline">
                        <li>
                            <div class="tags">
                                <a href="" class="tag">
                                    <span style="font-size: 15px">Visión</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-10 mx-auto">
                    <textarea required id="text-area-v" class="form-control" maxlength="400" rows="5" name="vision" placeholder="Visión.."><?= $data[0]["vision"] ?></textarea>
                </div>
                <div class="col-sm-12 mt-2 text-right">
                    <div class="counter font-weight-bolder">0/400</div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <button class="btn-primary btn float-right update-mv">Guardar Cambios</button>
                </div>
            </div>


        </div>
    </div>
</div>

<script src="<?=base_url()?>/assets/js/mision_vision.js"></script>