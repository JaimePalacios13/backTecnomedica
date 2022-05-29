<?php

namespace App\Models;
use CodeIgniter\Model;
class ProductosModel extends Model{

    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = [
        "id_marca",
        "id_categoria",
        "nombre",
        "descripcion",
        "fotografia"
    ];

}