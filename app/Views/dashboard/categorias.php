<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h2><b>Categorias</b></h2>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true"> categorias creadas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false"> Crear categoria </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-4">
                            <div class="col">
                                <table id="tbl_categorias" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Categoria</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                            foreach ($categorias as $value) {
                                                $estado = '';
                                                if ($value['estado'] == 1) {
                                                    $estado = 'ACTIVO';
                                                }else {
                                                    $estado = 'INACTIVO';
                                                }
                                                echo '
                                                <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$value['nombre'].'</td>
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
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h2>Crear nueva caracteristica</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="categoria_input">Categoria</label>
                                                            <input type="text" class="input_txt form-control"
                                                                id="categoria_input">
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="margin-top:26px;">
                                                        <button type="button" id="nueva-categoria" class="btn btn-block btn-primary"> Agregar </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>