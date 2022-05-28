<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h2><b>Detalles de Contacto</b></h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm">
                <div class="mb-3">
                    <label for="validationTextarea">Sobre nosotros* </label>
                    <textarea class="sobre-nosotros form-control" id="validationTextarea" rows="10"><?=$contacto[0]['about_us']?></textarea>
                </div>
            </div>
            <div class="col-sm">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="correo"> Correo Electronico* </label>
                            <input type="email" class="form-control" value="<?=$contacto[0]['correo']?>" id="correo">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="facebook"> URL Facebook </label>
                            <input type="text" class="form-control" value="<?=$contacto[0]['web']?>" id="facebook">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="direccion"> Direccion* </label>
                            <input type="text" class="form-control" value="<?=$contacto[0]['direccion']?>" id="direccion">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="celular-contact"> Contacto celular* </label>
                            <input type="text" class="form-control" value="<?=$contacto[0]['celular']?>" id="celular-contact">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="fijo-contact"> Contacto fijo* </label>
                            <input type="text" class="form-control" value="<?=$contacto[0]['telefono']?>" id="fijo-contact">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm">
                <button type="button" class="btn btn-block btn-primary btn-save-contacto"> Guardar cambios </button>
            </div>
        </div>
    </div>
</div>