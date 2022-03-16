<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;

    class Usuarios extends BaseController{

        private $session;
        private $permitido = TRUE;

        public function __construct(){
            //cargar el permiso roles
            helper('permisos_roles_helper');
            //instancia de la sesion
            $session = session();

            if (acceso_usuario(TAREA_USUARIOS)) {
                $session->tarea_actual = TAREA_USUARIOS;
            }//end if 
            else{
                $this->permitido = FALSE;
            }//end else
        }//end constructor

        public function index(){
            if($this->permitido){
                return $this->crear_vista("panel/usuarios", $this->cargar_datos());
            }//end if rol permitido
            else{
                mensaje("No tienes permiso para acceder a este módulo, contacte al administrador", WARNING_ALERT);
                return redirect()->to(route_to('acceso'));
            }//end else rol no permitido
        }//end index

        private function cargar_datos(){
            //======================================================================
            //==========================DATOS FUNDAMENTALES=========================
            //======================================================================
            //Declaración del arreglo
            $datos = array();
            //Instancia de la variable de sesión
            $session = session();

            //Datos fundamentales para la plantilla base
            $datos['nombre_completo_usuario'] = $session->usuario_completo;
            $datos['nombre_usuario'] = $session->nombre_usuario;
            $datos['email_usuario'] = $session->email_usuario;
            $datos['imagen_usuario'] = ($session->imagen_usuario != NULL) 
                                            ? base_url(RECURSOS_CONTENIDO_IMAGE.'/usuarios/'.$session->imagen_usuario) 
                                            : (($session->sexo_usuario == SEXO_FEMENINO) ? base_url(RECURSOS_CONTENIDO_IMAGE.'/usuarios/female.png') : base_url(RECURSOS_CONTENIDO_IMAGE.'/usuarios/male.png'));
            $datos['nombre_pagina'] = 'Usuario';
            
            //Datos propios por vista y controlador
            $tabla_usuarios = new \App\Models\Tabla_usuarios;
            $datos['usuarios'] = $tabla_usuarios->data_table_usuarios($session->id_usuario);

            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            $contenido['menu'] = crear_menu_panel(TAREA_USUARIOS, '');
            return view($nombre_vista, $contenido);
        }//end crear_vista

    }//End Class Usuarios
