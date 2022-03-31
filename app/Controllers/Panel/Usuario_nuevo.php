<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;
    
    class Usuario_nuevo extends BaseController{

        private $session;
        private $permitido = TRUE;

        public function __construct(){
            //cargar el permiso roles
            helper('permisos_roles_helper');
            //instancia de la sesion
            $session = session();
            //Verifica si el usuario logeado cuenta con los permiso de esta area
            if (acceso_usuario(TAREA_DASHBOARD)) {
                $session->tarea_actual = TAREA_DASHBOARD;
            }//end if 
            else{
                $this->permitido = FALSE;
            }//end else
        }//end constructor

        public function index(){
            //verifica si tiene permisos para continuar o no
            if($this->permitido){
                return $this->crear_vista("panel/usuario_nuevo", $this->cargar_datos());
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

            //Datos propios por vista y controlador
            $datos['nombre_pagina'] = 'Usuario nuevo';
            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            $contenido['menu'] = crear_menu_panel(TAREA_USUARIO_NUEVO, '');
            return view($nombre_vista, $contenido);
        }//end crear_vista

        private function subir_archivo($file = NULL){
            $file_size = $file->getSize();
            $file_extension = $file->getClientExtension();
            $file_info = \Config\Services::image()
                                        ->withFile($file)
                                        ->getFile()
                                        ->getProperties(true);
            $file_name = (hash("sha256", fecha_actual())).'.'.$file_extension;
            if($file_size <= 2097152 &&
                ($file_extension == 'jpeg' || $file_extension == 'jpg' || $file_extension == 'png') &&
                $file_info['width'] <= 512 && $file_info['height'] <= 512){
                $file->move(IMG_DIR_USUARIOS, $file_name);
                return $file_name;
            }//end if la imagen cumple con los requisitos
            else{
                return NULL;
            }//end else
        }//end subir_archivo

        // -----------------------------------------------------
        // -----------------------------------------------------

        public function registrar() {
            
            //Cargamos el modelo correspondiente
            $tabla_usuarios = new \App\Models\Tabla_usuarios;

            //Declaración del arreglo 
            $usuario = array();
            $usuario['estatus_usuario'] = ESTATUS_HABILITADO;
            $usuario['nombre_usuario'] = $this->request->getPost('nombre');
            $usuario['ap_paterno_usuario'] = $this->request->getPost('apellido_paterno');
            $usuario['ap_materno_usuario'] = $this->request->getPost('apellido_materno');
            $usuario['sexo_usuario'] = $this->request->getPost('sexo');
            $usuario['id_rol'] = $this->request->getPost('rol');
            $usuario['email_usuario'] = $this->request->getPost('email');
            $usuario['password_usuario'] =  hash('sha256', $this->request->getPost('password'));

            //verificar si tiene algo el input de file
            if(!empty($this->request->getFile('foto_perfil')) && $this->request->getFile('foto_perfil')->getSize() > 0){
				$usuario['imagen_usuario'] = $this->subir_archivo($this->request->getFile('foto_perfil'));
			}//end if existe imagen

            if($tabla_usuarios->insert($usuario) > 0){
                mensaje("El usuario ha sido registrado exitosamente", SUCCESS_ALERT);
                return redirect()->to(route_to('usuarios'));
            }//end if se inserta el usuario
            else{
                mensaje("Hubo un error al registrar al usuario. Intente nuevamente, por favor", DANGER_ALERT);
                return $this->index();
            }//end else se inserta el usuario

        }//end registrar

    }//End Class Usuario_nuevo
