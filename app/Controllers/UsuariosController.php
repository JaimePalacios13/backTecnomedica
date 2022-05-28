<?php

namespace App\Controllers;
use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{
    public function index()
    {
        try {
            $session = session();
            if(isset($_SESSION['sesion_activa'])){
                $UsuariosModel = new UsuariosModel();
                
                $data['usuarios'] = $UsuariosModel->getDataUser();
                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/usuarios',$data);
                echo view('template/footer');
            }else {
                header("Location:".base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function deleteUser(){
        try {
            $UsuariosModel = new UsuariosModel();
            if ($UsuariosModel->where('id_usuario',$_POST['iduser'])->delete($_POST['iduser'])) {
                echo json_encode('success');
                exit();
            }else {
                echo json_encode('error');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function nuevo_usuario(){
        try {
            $UsuariosModel = new UsuariosModel();
            $data = [
              'nombre' => $this->request->getPost('nombre'),
              'usuario' => $this->request->getPost('usuario'),
              'password' => md5($this->request->getPost('pwd'))
            ];

            $verificateUser = $UsuariosModel->verificateUser($data);
            if (count($verificateUser) > 0) {
                echo json_encode('existe');
            }else {
                if ($UsuariosModel->insert($data)) {
                    echo json_encode('success');
                }else{
                    echo json_encode('error');
                }
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}
