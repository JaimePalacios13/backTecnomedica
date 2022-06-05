<?php

namespace App\Controllers;
use App\Models\CategoriasModel;

class CategoriasController extends BaseController
{
    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $CategoriasModel = new CategoriasModel();
                $data['categorias'] = $CategoriasModel->getDataCategorias();
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/categorias',$data);
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function new(){
        try {
            $CategoriasModel = new CategoriasModel();
            $categoria = $_POST['categoria'];

            $data = [
                'nombre' => $categoria
            ];

            if ($CategoriasModel->insert($data)) {
                echo json_encode('success');
            }else {
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function subir_imgHistoria(){
        try {
            if (($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/gif")) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../assets/upload/historia/".$_FILES['file']['name'])) {
                    //more code here...
                    echo "images/".$_FILES['file']['name'];
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }   
    }

}
