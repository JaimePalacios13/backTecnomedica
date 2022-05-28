<div class="container">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_user"> Crear
                        usuario </button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm">
                    <table id="tbl_user" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $a = 1;
                        foreach ($usuarios as $value) {
                            echo '
                                <tr>
                                    <td>'.$a.'</td>
                                    <td>'.$value['nombre'].'</td>
                                    <td>'.$value['usuario'].'</td>
                                    <td> <button type="button" onclick="verUser('.$value['id_usuario'].')" class="btn btn-danger">Eliminar</button></td>
                                </tr>
                            ';
                            $a++;
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="new_user" tabindex="-1" role="dialog" aria-labelledby="new_userLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_userLabel">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre_user">Nombres</label>
                                <input type="text" class="form-control" id="nombre_user">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="input_pwd">Contraseña</label>
                                <input type="password" class="form-control" id="input_pwd">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="input_pwd">Generar nueva contraseña</label>
                                <button type="button" class="btn btn-secondary" onclick='generateP()'> Generar contraseña </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="check_viewpwd">
                                <label class="form-check-label" for="check_viewpwd">
                                    Mostrar contraseña
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary new_user">Guardar</button>
            </div>
        </div>
    </div>
</div>