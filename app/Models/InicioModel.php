<?php

namespace App\Models;
use CodeIgniter\Model;
class InicioModel extends Model{

    protected $table = 'inicio';
    protected $primaryKey = 'id_index';
    protected $allowedFields = [
        "mision",
        "vision",
        "politica",
        "compromiso",
        "historia",
        "frase",
        "img_historia"
    ];

}