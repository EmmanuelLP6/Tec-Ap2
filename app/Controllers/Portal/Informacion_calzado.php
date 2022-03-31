<?php
    namespace App\Controllers\Portal;
    use App\Controllers\BaseController;

    class Informacion_calzado extends BaseController {

        public function __construct(){

        }//end __construct

        public function index($id_calzado = 0){
            $tabla_calzados = new \App\Models\Tabla_calzados;
            if($tabla_calzados->find($id_calzado) == null){
                // mensaje('No se encuentra al usuario propocionado.', WARNING_ALERT);
                return redirect()->to(route_to('inicio'));
            }//end if no existe el usuario
            else{
                return $this->crear_vista('portal/informacion_calzado',$this->cargar_datos($id_calzado));
            }//end else no existe el usuario
        }//end index

        private function cargar_datos($id_calzado = 0){
            //declaración del arreglo
            $datos = array();
            //
            $datos['nombre_pagina'] = 'Información del calzado';

            $tabla_calzados = new \App\Models\Tabla_calzados;
            $datos['calzado'] = $tabla_calzados->obtener_oferta_calzados($id_calzado);

            return $datos;
        }//end index

        public function crear_vista($nombre_vista = '', $contenido = array()) {
            $contenido['menu'] = crear_menu_portal(PAGINA_CATALOGO);
            return view($nombre_vista, $contenido);
        }//end crear vista

    }//end class Inicio