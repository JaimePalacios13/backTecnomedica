<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    #descripcion {
        font-family: sans-serif, monospace;
        font-size: 15px;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #c1c1c1;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h2><b>Productos</b></h2>
            </div>
        </div>

    </div>
    <div class="card-body">

        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo producto</a>
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
                                            <th>Nombre</th>
                                            <th>Foto</th>
                                            <th>Categoria</th>
                                            <th>Marca</th>
                                            <th>Descripción</th>
                                            <!-- <th>Acciones</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;

                                        foreach ($productos as $value) {  ?>
                                            <tr>
                                                <th><?=$i?></th>
                                                <th><?= $value["producto"] ?></th>
                                                <th><img class="img-fluid" src="<?=$value["foto_producto"] ?>" alt=""></th>
                                                <th><?= $value["categoria"] ?></th>
                                                <th><?=$value["marca"]?></th>
                                                <th><?= $value["descripcion"] ?></th>
                                            </tr>
                                        <?php $i++; }
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
                                            <label for="producto">Nombre del producto</label>
                                            <input type="text" class="form-control input_txt" id="producto">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="categoria">Categoría</label>
                                            <select name="" class="form-control" id="categoria">
                                                <option value="0"> Seleccione...</option>
                                                <?php foreach ($categorias as $categoria) { ?>
                                                    <option value="<?= $categoria["id_categoria"] ?>"><?= $categoria["nombre"] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <select name="" class="form-control" id="marca">
                                                <option value="0"> Seleccione...</option>
                                                <?php foreach ($marcas as $marca) { ?>
                                                    <option value="<?= $marca["idmarca"] ?>"><?= $marca["marca"] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-productos">Seleccione una imagen</label>
                                            <input type="file" accept="image/png,image/jpeg" class="form-control-file" id="image-productos">
                                        </div>
                                    </div>
                                    <div class="col-12 container-image">
                                        <img src="" class="img-selection-upload" alt="">
                                        <input type="text" hidden value="" id="input_path_img">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="marca">Descripción</label>
                                    <textarea class="form-control" name="" id="descripcion" cols="30" rows="10" placeholder="Descripción..."></textarea>
                                </div>
                                <div id="upload-demo"></div>
                            </div>
                            <div class="container-img">
                                <img src="" class="img-selection" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <button type="button" class="btn btn-btn btn-block btn-warning btn-upload-image-producto">Recortar imagen</button>
                                <button type="button" class="btn btn-btn btn-block btn-primary btn-save-producto">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="<?=base_url()?>/assets/js/productos.js"></script>