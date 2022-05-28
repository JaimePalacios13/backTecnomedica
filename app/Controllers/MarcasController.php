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
    public function croppie(){
        try {
            $image = $_POST['image'];
            
            $img_array1 = explode(";",$image);
            $img_array2 = explode(",",$img_array1[1]);

            $image = base64_decode($img_array2[1]);

            $image_name = time().'.png';

            $path =  $_SERVER['DOCUMENT_ROOT'].'/back-tecnomedica/assets/upload/'.$image_name;

            file_put_contents($path, $image);
            echo '
                <img src="'.base_url('/assets/upload').'/'.$image_name.'">
            ';
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
