<?php

namespace App\Models;
use CodeIgniter\Model;
class UsuariosModel extends Model{

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'nombre', 
        'usuario', 
        'password'
    ];

    public function getDataUser(){
        $this->select('*');
        return $this->findAll();
    }

    public function verificateUser($data){
        $this->select('*');
        $this->where('usuario',$data['usuario']);
        return $this->findAll();
    }
}