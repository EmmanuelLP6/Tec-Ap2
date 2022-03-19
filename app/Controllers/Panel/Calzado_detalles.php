<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;

    class Calzado_detalles extends BaseController{

        private $session;
        private $permitido = TRUE;

        public function __construct(){
            //cargar el permiso roles
            helper('permisos_roles_helper');
            //instancia de la sesion
            $session = session();
            //Verifica si el usuario logeado cuenta con los permiso de esta area
            if (acceso_usuario(TAREA_CALZADO_DETALLES)) {
                $session->tarea_actual = TAREA_CALZADO_DETALLES;
            }//end if 
            else{
                $this->permitido = FALSE;
            }//end else
        }//end constructor

        public function index($id_calzado = NULL){
            //verifica si tiene permisos para continuar o no
            if($this->permitido){
                $tabla_calzados = new \App\Models\Tabla_calzados;
                if($tabla_calzados->find($id_calzado) == null){
                    mensaje('No se encuentra el calzado propocionado.', WARNING_ALERT);
                    return redirect()->to(route_to('usuarios'));
                }//end if no existe el usuario
                else{
                    return $this->crear_vista("panel/calzado_detalles", $this->cargar_datos($id_calzado));
                }//end else no existe el usuario
            }//end if rol permitido
            else{
                mensaje("No tienes permiso para acceder a este módulo, contacte al administrador", WARNING_ALERT);
                return redirect()->to(route_to('acceso'));
            }//end else rol no permitido
        }//end index

        private function cargar_datos($id_calzado = NULL){
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
            //Cargamos el modelo correspondiente
            $tabla_calzados = new \App\Models\Tabla_calzados;
            $calzado = $tabla_calzados->obtener_calzado($id_calzado);

            //Datos propios por vista y controlador
            $datos['nombre_pagina'] = 'Detalles del calzado: '.$calzado->modelo;
            $datos['calzado'] = $calzado;
            // dd($datos['calzado']);
            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            $contenido['menu'] = crear_menu_panel(TAREA_USUARIO_DETALLES, '');
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
                $file_info['width'] <= 1200 && $file_info['height'] <= 1200){
                $file->move(IMG_DIR_CALZADOS, $file_name);
                return $file_name;
            }//end if la imagen cumple con los requisitos
            else{
                mensaje('Tu imagen no cumple con los requisitos solicitados.', DANGER_ALERT);
                return NULL;
            }//end else
        }//end subir_archivo

        private function eliminar_archivo ($file = NULL){
            
            if (!empty($file)) {
                if(file_exists(IMG_DIR_CALZADOS.'/'.$file)){
                    unlink(IMG_DIR_CALZADOS.'/'.$file);
                    return TRUE;
                }//end if
            }//end if is_null
            else{
                return FALSE;
            }//end else is_null
        }//end eliminar_archivo

        // -----------------------------------------------------
        // -----------------------------------------------------
        public function editar() {
            $id_calzado = $this->request->getPost('id_calzado');
            $calzado_anterior = $this->request->getPost('calzado_anterior');

            ///Cargamos el modelo correspondiente
            $tabla_calzados = new \App\Models\Tabla_calzados;

            //Declaración del arreglo 
            $calzado = array();
            $calzado['estatus_calzado'] = ESTATUS_HABILITADO;
            $calzado['marca'] = $this->request->getPost('marca_calzado');
            $calzado['modelo'] = $this->request->getPost('modelo_calzado');
            $calzado['color'] = $this->request->getPost('color_calzado');
            $calzado['talla'] = $this->request->getPost('talla_calzado');
            $calzado['genero'] = $this->request->getPost('categoria_calzado');
            $calzado['precio'] = $this->request->getPost('precio_calzado');
            $calzado['descripcion'] = $this->request->getPost('descripcion_calzado');
            $calzado['destacado'] = $this->request->getPost('destacado_calzado');
            
            //verificar si tiene algo el input de file
            if(!empty($this->request->getFile('image_calzado')) && $this->request->getFile('image_calzado')->getSize() > 0){
                $this->eliminar_archivo($calzado_anterior);
                $calzado['imagen_calzado'] = $this->subir_archivo($this->request->getFile('image_calzado'));
            }//end if existe imagen

            if($tabla_calzados->update($id_calzado, $calzado) > 0){
                mensaje("La información del calzado ha sido actualizada exitosamente", SUCCESS_ALERT);
                // return redirect()->to(route_to('usuarios'));
                return ($calzado['genero']  != TIPO_CALZADO_DAMA) ? redirect()->to(route_to('catalogo_caballero_panel')) : redirect()->to(route_to('catalogo_dama_panel')) ;
            }//end if se actualiza el usuario
            else{
                mensaje("Hubo un error al actualizar la información del calzado. Intente nuevamente, por favor", DANGER_ALERT);
                return redirect()->to(route_to('editar_calzado',$id_calzado));
            }//end else se inserta el usuario
            
        }//end editar

    }//End Class Calzado_detalles
