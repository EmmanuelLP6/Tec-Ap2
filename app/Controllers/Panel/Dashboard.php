<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;

    class Dashboard extends BaseController{

        private $session;
        private $permitido = true;

        public function __construct(){
            // $session = session();
            // if(!Permisos::is_rol_permitido(TAREA_DASHBOARD, isset($session->rol_actual['clave']) ? $session->rol_actual['clave'] : -1)) {
            //     $this->permitido = false;
            // }//end if rol permitido
            // else{
            //     $session->tarea_actual = TAREA_DASHBOARD;
            // }//end else rol permitido
        }//end constructor

        public function index(){
            // if($this->permitido){
                return $this->crear_vista("panel/dashboard", $this->cargar_datos());
            // }//end if rol permitido
            // else{
            //     return redirect()->to(route_to('login'));
            // }//end else rol no permitido
        }//end index

        private function cargar_datos(){
            //declaración del arreglo
            $datos = array();
            //
            $datos['nombre_pagina'] = 'Dashboard';

            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            // $contenido['menu'] = crear_menu_panel();
            $contenido['menu'] = crear_menu_panel(TAREA_DASHBOARD, '');
            return view($nombre_vista, $contenido);
        }//end crear_vista

    }//End Class Dashboard
