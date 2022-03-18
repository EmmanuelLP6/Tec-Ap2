<?php 
    namespace App\Controllers\Usuario;
    use App\Controllers\BaseController;

    class Acceso extends BaseController{

        public function index(){
            $session = session();
            if(isset($session->tarea_actual)){
                return redirect()->to(route_to('dashboard'));
            }//end if existe usuario logeado
            else{
                return $this->crear_vista("usuario/new_acceso");
            }//end else existe usuario logeado
        }//end index

        private function crear_vista($nombre_vista){
            return view($nombre_vista);
        }//end crear_vista

          
        public function validar_acceso(){
            //Obtener datos del formulario
            $email = $this->request->getPost("email");
		    $password = $this->request->getPost("password");

            //Cargamos el modelo correspondiente
            $tabla_usuarios = new \App\Models\Tabla_usuarios;

            //query  (petición)
            $usuario = $tabla_usuarios->login($email, hash("sha256", $password));
            if($usuario != null){

                if ($usuario->estatus_usuario == -1) {
                    mensaje("Este usuario esta deshabilitado, comunicate con el administrador.", WARNING_ALERT);  
                    return redirect()->to(route_to('acceso'));
                }//end if usuario deshabilitado

                //Creación de la variable de sesion
                $session = session();
                $session->set("sesion_iniciada", TRUE);
                $session->set("id_usuario",$usuario->id_usuario);
                $session->set("nombre_usuario",$usuario->nombre_usuario);
                $session->set("usuario_completo",$usuario->nombre_usuario.' '.$usuario->ap_paterno_usuario.' '.$usuario->ap_materno_usuario);
                $session->set("sexo_usuario",$usuario->sexo_usuario);
                $session->set("email_usuario",$usuario->email_usuario);
                $session->set("imagen_usuario",$usuario->imagen_usuario);
                $session->set("rol_actual",$usuario->id_rol);
                $session->set("tarea_actual",TAREA_DASHBOARD);

                mensaje("Hola de nuevo ".$session->nombre_usuario." al panel de administración", INFO_ALERT);
                return redirect()->to(route_to('dashboard'));

            }//end if 
            else{
                mensaje("Correo y/o contraseña son incorrectas, intente de nuevo.", DANGER_ALERT);
                return redirect()->to(route_to('acceso'));
            }//end else

        }//end validar_acceso

    }//End Class Acceso
