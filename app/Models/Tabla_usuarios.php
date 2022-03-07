<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class Tabla_usuarios extends Model{

        protected $table      = 'usuarios';
        protected $primaryKey = 'id_usuario';
        protected $returnType = 'object';

        protected $allowedFields = [
                                    'estatus_usuario', 'id_usuario', 'nombre_usuario',
                                    'ap_paterno_usuario', 'ap_materno_usuario', 'sexo_usuario',
                                    'imagen_usuario', 'email_usuario', 'password_usuario', 
                                    'id_rol'
                                    ];
        
        public function login($email = NULL, $password = NULL){
            $resultado = $this
                        ->select('estatus_usuario, id_usuario, nombre_usuario,ap_paterno_usuario, ap_materno_usuario,
                                    sexo_usuario, imagen_usuario, email_usuario, password_usuario')
                        ->where('email_usuario', $email)
                        ->where('password_usuario', $password)
                        ->first();
            return $resultado;
        }//end login

    }//End Model operadores
    







