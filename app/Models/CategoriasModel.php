<?php

namespace App\Models;
use CodeIgniter\Model;
class CategoriasModel extends Model{

    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = [
        'nombre', 
        'descripcion', 
        'fotografia'
    ];

    public function getDataCategorias(){
        $this->select('*');
        return $this->findAll();
    }
}