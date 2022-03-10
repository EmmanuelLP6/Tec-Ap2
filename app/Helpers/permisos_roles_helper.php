<?php
    /**
     * Archivo para validar los permisos que debe tener cada
     * tipo de usuario que ingrese al panel de administración
    */
    function acceso_usuario($tarea = '') {
        $permiso = FALSE;
        //instancia de la sesion
        $session = session();
        // d($session);
        // dd(PERMISOS_ADMIN);
        // dd($session->rol_actual);
        switch ($session->rol_actual) {
            case ROL_SUPERADMIN['clave']:
                $permiso = in_array($tarea, PERMISOS_ADMIN);
                break;

            case ROL_OPERADOR['clave']:
                $permiso = in_array($tarea, PERMISOS_OPERADOR);
                break;
            
            default:
                $permiso = FALSE;
                break;
        }
        return $permiso;
    }//end