<?php

namespace App\Models;
use CodeIgniter\Model;
class ContactoModel extends Model{

    protected $table = 'contactos';
    protected $primaryKey = 'id_contactos';
    protected $allowedFields = [
        'correo', 
        'direccion',
        'celular',
        'telefono',
        'about_us',
        'web'
    ];

    public function getDataContacto(){
        $this->select('*');
        return $this->findAll();
    }
}