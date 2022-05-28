<div class="card">
    <div class="card-body">
        <div class="row">
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
                                <td><img src="'.base_url().'/'.$value['fotomarca'].'"></td>
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
</div>