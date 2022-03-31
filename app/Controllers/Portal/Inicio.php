<?php
    namespace App\Controllers\Portal;
    use App\Controllers\BaseController;
    class Inicio extends BaseController {

    public function __construct(){

    }//end __construct

        public function index(){
            return $this->crear_vista('portal/inicio',$this->cargar_datos());
        }//end index

        private function cargar_datos(){
            //declaración del arreglo
            $datos = array();
            //
            $datos['nombre_pagina'] = 'Inicio';

            $tabla_calzados = new \App\Models\Tabla_calzados;
            $datos['calzados'] = $tabla_calzados->calzados_limit(5);
            $datos['calzados_actuales'] = $tabla_calzados->calzados_actuales(fecha_actual(),5);
            // dd($datos['calzados_actuales']);

            return $datos;
        }//end index

        public function crear_vista($nombre_vista = '', $contenido = array()) {
            $contenido['menu'] = crear_menu_portal(PAGINA_INICIO);
            return view($nombre_vista, $contenido);
        }//end crear vista

    }//end class Inicio