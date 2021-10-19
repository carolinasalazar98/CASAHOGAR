<?php

namespace App\Controllers;

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


        //2.crear un arreglo asociativo con los datos punto1

        /*$datos = array(
            "nombre" => $nombre,
            "fotografia" => $fotografia,
            "edad" => $edad,
            "precio" => $descripcion,
            "tipo" => $tipo,
        );

        //imprimo el arreglo
        print_r($datos);*/


        //3 valido que llego
        if ($this->validate('animal')) {

            echo ("TODO BIEN CUCHO");
            //ruta para guardar datos en la BD
        } else {
            $mensaje = "tienes datos pendientes";

            return redirect()->to(site_url('/animal/registro'))->with('mensaje', $mensaje);

            //echo("tienes un error");
        }
    }
}
