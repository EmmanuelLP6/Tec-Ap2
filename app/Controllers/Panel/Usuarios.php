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
            //Verifica si el usuario logeado cuenta con los permiso de esta area
            if (acceso_usuario(TAREA_USUARIOS)) {
                $session->tarea_actual = TAREA_USUARIOS;
            }//end if 
            else{
                $this->permitido = FALSE;
            }//end else
        }//end constructor

        public function index(){
            //verifica si tiene permisos para continuar o no
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
        
        private function eliminar_archivo ($file = NULL){    
            if (!empty($file)) {
                if(file_exists(IMG_DIR_USUARIOS.'/'.$file)){
                    unlink(IMG_DIR_USUARIOS.'/'.$file);
                    return TRUE;
                }//end if
            }//end if is_null
            else{
                return FALSE;
            }//end else is_null
        }//end eliminar_archivo

        public function eliminar($id_usuario = 0) {
            //Cargamos el modelo correspondiente
            $tabla_usuarios = new \App\Models\Tabla_usuarios;
            //Query
            $usuario = $tabla_usuarios->obtener_usuario($id_usuario); 
            if (!empty($usuario)) {
                //Borra la imagen del usuario en caso de que tenga
                $this->eliminar_archivo($usuario->imagen_usuario);
                //Se va a eliminar el usuario
                if($tabla_usuarios->delete($id_usuario)) {
                    mensaje("El usuario ha sido eliminado exitosamente", SUCCESS_ALERT);
                }//end if eliminar
                else {
                    mensaje("Hubo un error al eliminar a este usuario, intenta nuevamente", DANGER_ALERT);
                }//end else

            }//end if count
            else {
                mensaje("El usuario que deseas eliminar no existe", WARNING_ALERT);
            }//end else count
            //redirecciona al modulo de usuarios
            return redirect()->to(route_to('usuarios'));
        }//end eliminar

        public function estatus($id_usuario = 0, $estatus = NULL) {
             //Cargamos el modelo correspondiente
            $tabla_usuarios = new \App\Models\Tabla_usuarios;
            //Query
            $usuario = $tabla_usuarios->obtener_usuario($id_usuario); 
            if (!is_null($usuario)) {
                //Se va a actualizar el estatus del usuario
                if($tabla_usuarios->update($id_usuario, ['estatus_usuario' => $estatus]) > 0){
                    mensaje("El estatus de este usuario ha sido actualizado exitosamente", SUCCESS_ALERT);
                }//end if actualizar 
                else {
                    mensaje("Hubo un error al cambiar el estatus de este usuario, intenta nuevamente", DANGER_ALERT);
                }//end else
            }//end if is_null
            else {
                mensaje("El usuario que deseas cambiar su estatus no existe", WARNING_ALERT);
            }//end else is_null
            //redirecciona al modulo de usuarios
            return redirect()->to(route_to('usuarios'));
        }//end estatus
        
    }//End Class Usuarios
