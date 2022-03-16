<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class Tabla_usuarios extends Model {

        protected $table      = 'usuarios';
        protected $primaryKey = 'id_usuario';
        protected $returnType = 'object';

        protected $allowedFields = [
                                    'estatus_usuario', 'id_usuario', 'nombre_usuario',
                                    'ap_paterno_usuario', 'ap_materno_usuario', 'sexo_usuario',
                                    'imagen_usuario', 'email_usuario', 'password_usuario', 
                                    'id_rol'
                                    ];
        
        //Funciones que nos ayudaran a realizar peticiones (consultas) para obtener la información que deseemos
        
        public function login($email = NULL, $password = NULL){
            $resultado = $this
                        ->select('estatus_usuario, id_usuario, nombre_usuario,ap_paterno_usuario, ap_materno_usuario,
                                    sexo_usuario, imagen_usuario, email_usuario, password_usuario, roles.id_rol, roles.rol')
                        ->join('roles', 'roles.id_rol = usuarios.id_rol')
                        ->where('email_usuario', $email)
                        ->where('password_usuario', $password)
                        ->first();
            return $resultado;
        }//end login
        
        public function data_table_usuarios($id_rol_sesion = 0) {
            $resultado = $this
                    ->select('
                                id_usuario, estatus_usuario, nombre_usuario, ap_paterno_usuario, ap_materno_usuario,
                                sexo_usuario, imagen_usuario, email_usuario, roles.rol
                            ')
                    ->join('roles', 'roles.id_rol = usuarios.id_rol')
                    ->where('id_usuario !=',$id_rol_sesion)
                    ->orderBy('ap_paterno_usuario', 'ASC')
                    ->findAll();
        return $resultado;
        }//end data_table_usuarios
    }//End Model usuarios
    



