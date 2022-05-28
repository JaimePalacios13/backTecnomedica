<?php

namespace App\Controllers;
use App\Models\MarcasModel;

class MarcasController extends BaseController
{
    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $MarcasModel = new MarcasModel();
                $data['marcas'] = $MarcasModel->getDataMarcas();
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/marcas',$data);
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
