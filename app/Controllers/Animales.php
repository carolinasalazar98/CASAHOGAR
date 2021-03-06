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
        //lo que tengo entregetPost(" ")  es el name que puse a cada input.
        $nombre = $this->request->getPost("nombre");
        $fotografia = $this->request->getPost("fotografia");
        $edad = $this->request->getPost("edad");
        $descripcion = $this->request->getPost("descripcion");
        $tipo = $this->request->getPost("tipo");


        //2 valido que llego.
        if ($this->validate('animal')) {

            //se organizan los datos en un array 
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

    public function buscar()
    {
        try {
            $modelo = new AnimalModelo();
            $resultado = $modelo->findAll();
            $animales = array('animales' => $resultado);
            return view('listaAnimales', $animales);
        } catch (\Exception $error) {
            return redirect()->to(site_url('/animal/registro'))->with('mensaje', $error->getMessage());
        }
        return view('listaAnimales');
    }

    public function eliminar($id)
    {

        try {
            $modelo = new AnimalModelo();
            $modelo->where('id', $id)->delete();
            return redirect()->to(site_url('/animal/registro'))->with('mensaje', "Exito eliminando Animal");
        } catch (\Exception $error) {
            return redirect()->to(site_url('/animal/registro'))->with('mensaje', $error->getMessage());
        }
    }

    public function editar($id)
    {
        //RECIBO DATOS.

        $nombre = $this->request->getPost("nombre");
        $edad = $this->request->getPost("edad");

        //VALIDACION DE DATOS.
        //if ($this->validate('animal')) {

        //ORGANIZO LOS DATOS EN UN ARRAY ASOCIATIVO.
        $datos = array(
            'nombre' => $nombre,
            'edad' => $edad,
        );
        //echo("estamos editando el pructo".$id);
        //print_r($datos);

        //CREAR UN OBJETO DEL MODELO

        try {
            $modelo = new AnimalModelo();
            $modelo->update($id, $datos);
            return redirect()->to(site_url('/animal/registro'))->with('mensaje', "Exito editando el producto");
        } catch (\Exception $error) {
            return redirect()->to(site_url('/animal/registro'))->with('mensaje', $error->getMessage());
        }
    }

}

