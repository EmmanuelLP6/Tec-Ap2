<?php 
    namespace App\Controllers\Usuario;
    use App\Controllers\BaseController;

    class Cerrar_acceso extends BaseController{

        public function index(){
            session()->destroy();
            return redirect()->to(route_to('acceso'));
        }//end index

    }//End Class Cerrar_acceso