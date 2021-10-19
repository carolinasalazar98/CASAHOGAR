<?php

namespace App\Controllers;

class Productos extends BaseController
{
    public function index()
    {
        return view('registroproductos');
    }

    public function registrar()
    {
        //1.variables  peticion REQUIRE  recibo todo los datos enviados desde el formulario.
        //lo ue tengo entregetPost(" ")  es el name que puse a cada input.
        $productos = $this->request->getPost("productos");
        $fotografia = $this->request->getPost("fotografia");
        $precio = $this->request->getPost("precio");
        $descripcion = $this->request->getPost("descripcion");
        $tipo = $this->request->getPost("tipo");

        //3 valido que llego
        if ($this->validate('producto')) {

            echo ("TODO BIEN CUCHO");
            //ruta para guardar datos en la BD
        } else {
            $mensaje = "tienes datos pendientes";

            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);

            //echo("tienes un error");
        }

        //2.crear un arreglo asociativo con los datos punto1

        /*$datos=array(
            "productos"=>$productos,
            "fotografia"=>$fotografia,
            "precio"=>$descripcion,
            "tipo"=>$tipo,
        );

        //imprimo el arreglo
        print_r($datos);*/
    }
}
