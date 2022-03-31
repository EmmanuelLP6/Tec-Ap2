<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;

    class Oferta_nueva extends BaseController{

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

        public function index($id_calzado = 0){
            //verifica si tiene permisos para continuar o no
            if($this->permitido){
                $tabla_calzados = new \App\Models\Tabla_calzados;
                if($tabla_calzados->find($id_calzado) == null){
                    mensaje('No se encuentra el calzado propocionado.', WARNING_ALERT);
                    return redirect()->to(route_to('usuarios'));
                }//end if no existe el usuario
                else{
                    return $this->crear_vista("panel/oferta_nueva", $this->cargar_datos($id_calzado));
                }//end else no existe el usuario
            }//end if rol permitido
            else{
                mensaje("No tienes permiso para acceder a este módulo, contacte al administrador", WARNING_ALERT);
                return redirect()->to(route_to('acceso'));
            }//end else rol no permitido
        }//end index

        private function cargar_datos($id_calzado = 0){
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

            //Cargar el modelo
            $tabla_ofertas = new \App\Models\Tabla_ofertas;
            $tabla_calzados = new \App\Models\Tabla_calzados;
            $calzado = $tabla_calzados->obtener_calzado($id_calzado);
            //Datos propios por vista y controlador
            $datos['nombre_pagina'] = 'Oferta para el calzado: '.$calzado->modelo;
            $datos['calzado'] = $calzado;
            $datos['oferta'] = $tabla_ofertas->obtener_calzado_oferta($id_calzado);
            // dd($datos['oferta']);
            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            $contenido['menu'] = crear_menu_panel(TAREA_OFERTA, '');
            return view($nombre_vista, $contenido);
        }//end crear_vista

        public function actualizar(){
            //Cargamos el modelo correspondiente
            $tabla_ofertas = new \App\Models\Tabla_ofertas;

            $id_calzado = $this->request->getPost('id_calzado');
            //Declaración del arreglo 
            $oferta = array();
            $oferta['descuento'] = $this->request->getPost('descuento_calzado');
            $oferta['fin_oferta'] = $this->request->getPost('fecha_oferta');
            $oferta['id_calzado'] = $id_calzado;
            
            //Realiza la peticion para verificar si existe la oferta
            $existe_oferta = $tabla_ofertas->obtener_calzado_oferta($id_calzado);
            //Verifica si la peticion es diferente de true
            if (!is_null($existe_oferta)) {
                //Actualiza la oferta
                if($tabla_ofertas->update($existe_oferta->id_oferta,$oferta) > 0){
                    mensaje("Se ha actualizado la oferta de este calzado", SUCCESS_ALERT);
                    return redirect()->to(route_to('ofertas'));
                }//end if se inserta el usuario
                else{
                    mensaje("Hubo un error al actualizar la oferta para este calzado. Intente nuevamente, por favor", DANGER_ALERT);
                    return $this->index();
                }//end else se inserta el usuario
            }//end sizeof
            else {
                //Inserta la oferta
                $oferta['estatus_oferta'] = ESTATUS_HABILITADO;
                if($tabla_ofertas->insert($oferta) > 0){
                    mensaje("Este calzado ya cuenta con una oferta", SUCCESS_ALERT);
                    return redirect()->to(route_to('ofertas'));
                }//end if se inserta el usuario
                else{
                    mensaje("Hubo un error al asignar una oferta para este calzado. Intente nuevamente, por favor", DANGER_ALERT);
                    return $this->index();
                }//end else se inserta el usuario
            }//end else sizeof
        }//end actualizar_oferta


        public function eliminar($id_calzado = 0) {
            //Cargamos el modelo correspondiente
            $tabla_ofertas = new \App\Models\Tabla_ofertas;
            //Query
            $oferta = $tabla_ofertas->obtener_calzado_oferta($id_calzado); 
            if (!empty($oferta)) {
                //Se va a eliminar la oferta
                if($tabla_ofertas->delete($oferta->id_oferta)) {
                    mensaje("La oferta ha sido eliminada exitosamente", SUCCESS_ALERT);
                }//end if eliminar
                else {
                    mensaje("Hubo un error al eliminar la oferta, intenta nuevamente", DANGER_ALERT);
                }//end else

            }//end if count
            else {
                mensaje("La oferta que deseas eliminar no existe", WARNING_ALERT);
            }//end else count
            //redirecciona al modulo de usuarios
            return redirect()->to(route_to('ofertas'));
        }//end eliminar

    }//End Class Oferta_nueva
