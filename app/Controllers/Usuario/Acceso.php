<?php 
    namespace App\Controllers\Usuario;
    use App\Controllers\BaseController;

    class Acceso extends BaseController{

        public function index(){
            // mensaje("El encargado ha sido registrado exitosamente", SUCCESS_ALERT);
            // $session = session();
            // if(isset($session->tarea_actual)){
            //     return redirect()->to(route_to('dashboard'));
            // }//end if existe usuario logeado
            // else{
                return $this->crear_vista("usuario/acceso");
            // }//end else existe usuario logeado
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

            $usuario = $tabla_usuarios->login($email, hash("sha256", $password));

            if($usuario != null){
            }//end if 
            else{
                mensaje("Correo y/o contraseña son incorrectas, intente de nuevo.", DANGER_ALERT);
                return redirect()->to(route_to('acceso'));
            }//end else

        }//end crear_vista

    }//End Class Acceso
