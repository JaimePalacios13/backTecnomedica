<?php

namespace App\Controllers;
use App\Models\ContactoModel;

class ContactosController extends BaseController
{
    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $ContactoModel = new ContactoModel();
                $data['contacto'] = $ContactoModel->getDataContacto();
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/contacto',$data);
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }    
    public function update(){
        try {
            $ContactoModel = new ContactoModel();
            $id = 1;
            $data = [
                'correo'    => $_POST['correo'], 
                'direccion' => $_POST['direccion'],
                'celular'   => $_POST['celular'],
                'telefono'  => $_POST['fijo'],
                'about_us'  => $_POST['about_us'],
                'web'       => $_POST['web']
            ];

            if ($ContactoModel->update($id,$data)) {
                echo json_encode('success');
            }else {
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
