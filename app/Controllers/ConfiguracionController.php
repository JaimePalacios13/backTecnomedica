<?php

namespace App\Controllers;

use App\Models\CarouselModel;
use App\Models\InicioModel;

use Exception;

class ConfiguracionController extends BaseController
{

    public $InicioModel = "";

    public function __construct()
    {
        $this->InicioModel = new InicioModel();
    }

    public function carousel_edit()
    {
        try {
            $session = session();
            if (isset($_SESSION['sesion_activa'])) {

                $CarouselModel = new CarouselModel();

                $imgs["imgs"] = $CarouselModel->findAll();

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/conf_carousel', $imgs);
                echo view('template/footer');
            } else {
                header("Location:" . base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


    function upload_pic()
    {

        try {

            $data = $_POST["image_pic"];
            $n_carousel = $_POST["number"];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $img = base64_decode($image_array_2[1]);
            $image_name = "carousel$n_carousel.jpg";

            $path =  $_SERVER['DOCUMENT_ROOT'] . '/back-tecnomedica/assets/upload/carousel/' . $image_name;

            file_put_contents($path, $img);
            echo "true";
        } catch (Exception $e) {
            echo $e;
        }
    }


    public function mision_y_vision_edit()
    {
        try {
            $session = session();
            if (isset($_SESSION['sesion_activa'])) {


                $data["data"] = $this->InicioModel->findAll();

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/mision_vision', $data);
                echo view('template/footer');
            } else {
                header("Location:" . base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function update_mision_vision()
    {
        try {

            $id = 1;
            $data = [
                'mision' => $this->request->getPost('mision'),
                'vision' => $this->request->getPost('vision')
            ];

            if ($this->InicioModel->update($id, $data)) {
                echo json_encode("success");
            }
        } catch (Exception $th) {
            echo $th;
        }
    }


    public function politica_compromiso_edit()
    {
        try {
            $session = session();
            if (isset($_SESSION['sesion_activa'])) {


                $data["data"] = $this->InicioModel->findAll();

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/politica_compromiso', $data);
                echo view('template/footer');
            } else {
                header("Location:" . base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


    public function update_politica_compromiso()
    {
        try {

            $id = 1;

            $data = [
                'politica' => $this->request->getPost('politica'),
                'compromiso' => $this->request->getPost('compromiso')
            ];

            if ($this->InicioModel->update($id, $data)) {
                echo json_encode("success");
            }
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function historia_edit()
    {
        try {
            $session = session();
            if (isset($_SESSION['sesion_activa'])) {

                $data["data"] = $this->InicioModel->findAll();

                echo view('template/header');
                echo view('template/sidebar');
                echo view('dashboard/historia', $data);
                echo view('template/footer');
            } else {
                header("Location:" . base_url());
                exit();
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function update_historia_frase()
    {
        try {

            $id = 1;

            $data = [
                'historia' => $this->request->getPost('historia'),
                'frase' => $this->request->getPost('frase')
            ];

            if ($this->InicioModel->update($id, $data)) {
                echo json_encode("success");
            }
        } catch (Exception $th) {
            echo $th;
        }
    }

    function upload_pic_historia()
    {

        try {

            $data = $_POST["image_pic"]; // capturar imagen en base 64

            /* limpiar imagen base64 */
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);

            $img = base64_decode($image_array_2[1]); // decodificar imagen
            $image_name = "historia".time().".jpg"; // asignar nombre a la imagen 
            
            /* asignar ruta y nombre de imagen a subir */
            $path =  $_SERVER['DOCUMENT_ROOT'] . '/back-tecnomedica/assets/upload/historia/' . $image_name;
            //chmod($_SERVER['DOCUMENT_ROOT'] . '/back-tecnomedica/assets/upload/historia', 777);
            /*  subir imagen */
            file_put_contents($path, $img);

            $img = base_url().'/assets/upload/historia/'.$image_name; //ruta a almacenar en la bd
            $data = array(
                "img_historia" => $img,
            );

            /* actualizar : ya que es solo un registro siempre se busca el id 1 */
            if ($this->InicioModel->update(1, $data)) {
                echo "success";
            }


        } catch (Exception $e) {
            echo $e;
        }
    }

    function update_lemas_sublemas()
    {
        try {

            $id = 1;

            $data = [
                'lema1' => $this->request->getPost('lema1'),
                'sublema1' => $this->request->getPost('sublema1'),
                'lema2' => $this->request->getPost('lema2'),
                'sublema2' => $this->request->getPost('sublema2'),
                'lema3' => $this->request->getPost('lema3'),
                'sublema3' => $this->request->getPost('sublema3'),
            ];

            $CarouselModel = new CarouselModel();

            if ($CarouselModel->update($id, $data)) {
                echo json_encode("success");
            }
        } catch (Exception $th) {
            echo $th;
        }
    }
}
