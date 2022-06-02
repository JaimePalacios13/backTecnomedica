<?php

namespace App\Controllers;
use App\Models\ProductosModel;
use App\Models\CategoriasModel;
use App\Models\MarcasModel;

class ProductosController extends BaseController
{

    public $ProductosModel;
    public $MarcasModel;
    public $CategoriasModel;

    public function __construct()
    {
        $this->ProductosModel = new ProductosModel();
        $this->MarcasModel = new MarcasModel();
        $this->CategoriasModel = new CategoriasModel();    
        
    }

    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $data['productos'] = $this->ProductosModel
                ->select("*, producto.descripcion as producto_desc, categoria.nombre as categoria, producto.nombre as producto, producto.fotografia as foto_producto")
                ->join("marca","marca.idmarca = producto.id_marca")
                ->join("categoria","categoria.id_categoria = producto.id_categoria")
                ->findAll();

                $data['marcas'] = $this->MarcasModel->findAll();
                $data['categorias'] = $this->CategoriasModel->findAll();

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/productos',$data);
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

            $path =  $_SERVER['DOCUMENT_ROOT'].'/back-tecnomedica/assets/upload/productos/'.$image_name;

            file_put_contents($path, $image);
            $img = '/assets/upload/productos/'.$image_name;
            echo json_encode($img);
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }



    public function insert(){
        try {

            $data= [
                'nombre' => $this->request->getPost('nombre'),
                'id_categoria' => $this->request->getPost('id_categoria'),
                'id_marca' => $this->request->getPost('id_marca'),
                'descripcion' => $this->request->getPost('descripcion'),
                'fotografia' => $this->request->getPost('image')
            ];

/*             echo json_encode($data); */

            if ($this->ProductosModel->insert($data)) {
                echo json_encode('success');
            }else{
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function deleteProduct(){
        try {
            $id = $this->request->getPost('idproducto');
            if ($this->ProductosModel->where('id_producto', $id)->delete()) {
                echo json_encode('success');
            }else {
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
