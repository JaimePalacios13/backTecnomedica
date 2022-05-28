<?php

namespace App\Models;
use CodeIgniter\Model;
class LoginModel extends Model{

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

    public function validateUser($user,$password){
        $this->select('*');
        $this->where('usuario',$user);
        $this->where('password',$password);
        return $this->findAll();
    }
}