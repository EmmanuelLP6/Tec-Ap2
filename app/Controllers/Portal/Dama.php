<?php
    namespace App\Controllers\Portal;
    use App\Controllers\BaseController;
    class Dama extends BaseController {

        public function __construct(){

        }//end __construct

        public function index(){
            return $this->crear_vista('portal/catalogo_dama',$this->cargar_datos());
        }//end index

        private function cargar_datos(){
            //declaración del arreglo
            $datos = array();
            //
            $datos['nombre_pagina'] = 'Categoría Dama';

            $tabla_calzados = new \App\Models\Tabla_calzados;
            $datos['calzados'] = $tabla_calzados->oferta_calzados(TIPO_CALZADO_DAMA,12);
            // dd($datos['calzados']);

            return $datos;
        }//end index

        public function crear_vista($nombre_vista = '', $contenido = array()) {
            $contenido['menu'] = crear_menu_portal(PAGINA_CATALOGO);
            return view($nombre_vista, $contenido);
        }//end crear vista

    }//end class Inicio