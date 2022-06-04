<?php

namespace App\Models;
use CodeIgniter\Model;
class CarouselModel extends Model{

    protected $table = 'carousel';
    protected $primaryKey = 'id_carousel';
    protected $allowedFields = [
        'lema1', 
        'sublema1',
        'lema2', 
        'sublema2', 
        'lema3', 
        'sublema3',
        'carousel1',
        'carousel2',
        'carousel3'
    ];

}