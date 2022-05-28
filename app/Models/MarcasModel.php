<?php

namespace App\Models;
use CodeIgniter\Model;
class MarcasModel extends Model{

    protected $table = 'marca';
    protected $primaryKey = 'idmarca';
    protected $allowedFields = [
        'marca', 
        'fotomarca',
        'estado'
    ];

    public function getDataMarcas(){
        $this->select('*');
        return $this->findAll();
    }
}