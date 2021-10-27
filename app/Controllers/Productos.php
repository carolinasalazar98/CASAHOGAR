<?php

namespace App\Controllers;

//se trae (importa) el modelo de datos.
use App\Models\ProductoModelo;

class Productos extends BaseController
{
    public function index()
    {
        return view('registroproductos');
    }

    public function registrar()
    {
        //1.variables  peticion REQUIRE  recibo todo los datos enviados desde el formulario.
        //lo ue tengo entre getPost(" ")  es el name que puse a cada input.
        $productos = $this->request->getPost("productos");
        $fotografia = $this->request->getPost("fotografia");
        $precio = $this->request->getPost("precio");
        $descripcion = $this->request->getPost("descripcion");
        $tipo = $this->request->getPost("tipo");

        //2 valido que llego
        if ($this->validate('producto')) {

            //se organizan los datos d¿en un array 
            //los naranjados (claves) deben coincidir
            //con el nombre de las columnas de BD
            $datos = array(
                "producto" => $productos,
                "foto" => $fotografia,
                "precio" => $precio,
                "descripcion" => $descripcion,
                "tipo" => $tipo,
            );

            //4 intentamos grabar los datos en BD

            try {
                $modelo = new ProductoModelo();
                $modelo->insert($datos);
                return redirect()->to(site_url('/productos/registro'))->with('mensaje', "Exito agragando el producto");
            } catch (\Exception $error) {
                return redirect()->to(site_url('/productos/registro'))->with('mensaje', $error->getMessage());
            }

            //imprimo el arreglo
            print_r($datos);
        } else {
            $mensaje = "tienes datos pendientes";

            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);
        }

        //2.crear un arreglo asociativo con los datos punto1


    }

    public function buscar()
    {
        try {
            $modelo = new ProductoModelo();
            $resultado = $modelo->findAll();
            $productos = array('productos' => $resultado);
            return view('listaProductos', $productos);
        } catch (\Exception $error) {
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $error->getMessage());
        }
    }

    public function eliminar($id)
    {

        try {
            $modelo = new ProductoModelo();
            $modelo->where('id', $id)->delete();
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', "Exito eliminando el producto");
        } catch (\Exception $error) {
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $error->getMessage());
        }
    }
}
