<?php

namespace App\Controllers;

//se trae (importa) el modelo de datos.
use App\Models\AnimalModelo;

class Animales extends BaseController
{
    public function index()
    {
        return view('registroAnimales');
    }

    public function registrar()
    {
        //1.variables  peticion REQUIRE  recibo todo los datos enviados desde el formulario.
        //lo ue tengo entregetPost(" ")  es el name que puse a cada input.
        $nombre = $this->request->getPost("nombre");
        $fotografia = $this->request->getPost("fotografia");
        $edad = $this->request->getPost("edad");
        $descripcion = $this->request->getPost("descripcion");
        $tipo = $this->request->getPost("tipo");


        //2 valido que llego.
        if ($this->validate('animal')) {

            //se organizan los datos d¿en un array 
            //los naranjados (claves) deben coincidir
            //con el nombre de las columnas de BD
            $datos = array(
                "nombre" => $nombre,
                "fotografia" => $fotografia,
                "edad" => $edad,
                "descripcion" => $descripcion,
                "tipo" => $tipo,
            );
            //4 intentamos grabar los datos en BD

            try {
                $modelo = new AnimalModelo();
                $modelo->insert($datos);
                return redirect()->to(site_url('/animal/registro'))->with('mensaje', "Exito agragando Animal");
            } catch (\Exception $error) {
                return redirect()->to(site_url('/animal/registro'))->with('mensaje', $error->getMessage());
            }

            //imprimo el arreglo
            print_r($datos);
        } else {
            $mensaje = "tienes datos pendientes(Animal)";

            return redirect()->to(site_url('/animal/registro'))->with('mensaje', $mensaje);
        }
    }
}
