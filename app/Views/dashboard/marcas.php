<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h2><b>Marcas</b></h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Marcas creadas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Nueva Marca</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-4">
                            <div class="col">
                                <table id="tbl_marcas" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Marca</th>
                                            <th>Foto</th>
                                            <th>Estado</th>
                                            <!-- <th>Acciones</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($marcas as $value) {
                                            $estado = '';
                                            if ($value['estado'] == 1) {
                                                $estado = 'ACTIVO';
                                            }else {
                                                $estado = 'INACTIVO';
                                            }
                                            echo '
                                            <tr>
                                                <td>'.$i.'</td>
                                                <td>'.$value['marca'].'</td>
                                                <td><img src="'.$value['fotomarca'].'"></td>
                                                <td>'.$estado.'</td>
                                            </tr>
                                            ';
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="grid">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="marcas">Nombre de la marca</label>
                                            <input type="text" class="form-control input_txt" id="marcas">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-marcas">Seleccione una imagen</label>
                                            <input type="file" accept="image/png,image/jpeg" class="form-control-file" id="image-marcas">
                                        </div>
                                    </div>
                                    <div class="col-12 container-image">
                                        <img src="" class="img-selection-upload" alt="">
                                        <input type="text" hidden value="" id="input_path_img">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div id="upload-demo"></div>
                            </div>
                            <div class="container-img">
                                <img src="" class="img-selection" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <button type="button" class="btn btn-btn btn-block btn-warning btn-upload-image">Recortar imagen</button>
                                <button type="button" class="btn btn-btn btn-block btn-primary btn-save-marcas">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>