<?php
    /**
     * Esta funcion nos va a permitir crear el menu co todas
     * las opciones del menu y sus subseciones en caso de que las tenga
     * [Menu]
     *      [Opcion 1]
     *      [Opcion 2]
     * *      [SubOpcion 2.1]
     * *      [SubOpcion 2.2]
    */

    function configurar_menu_panel($pagina_actual = '', $sub_pagina_actual = '') {
        //Arreglo que almacenra todo el menu
        $menu = array();
        //Arreglo que almacenra las opciones del menu
        $menu_opcion = array();
        //Arreglo que almacenra las opciones del menu
        $menu_sub_opcion = array();

        //Tarea Inicio
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == TAREA_DASHBOARD) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('dashboard');
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['inicio'] = $menu_opcion;

        //Tarea Usuarios
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == TAREA_USUARIOS || $pagina_actual == TAREA_USUARIO_NUEVO || $pagina_actual == TAREA_USUARIO_DETALLES) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('usuarios');
        $menu_opcion['text'] = 'Usuarios';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['usuarios'] = $menu_opcion;

        //Pagina Catalogo Dama
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == TAREA_CATALOGO) ? TRUE : FALSE ;
        $menu_opcion['href'] = '#';
        $menu_opcion['text'] = 'Catálogo';
        $menu_opcion['icon'] = 'fa fa-book';
        $menu_opcion['submenu'] = array();
            $menu_sub_opcion = array();
            $menu_sub_opcion['is_active'] = ($sub_pagina_actual == TAREA_CATALOGO_DAMA) ? TRUE : FALSE ;
            $menu_sub_opcion['href'] = route_to('catalogo_dama_panel');
            $menu_sub_opcion['text'] = 'Dama';
            $menu_opcion['submenu']['dama'] = $menu_sub_opcion;
            $menu_sub_opcion = array();
            $menu_sub_opcion['is_active'] = ($sub_pagina_actual == TAREA_CATALOGO_CABALLERO) ? TRUE : FALSE ;
            $menu_sub_opcion['href'] = route_to('catalogo_caballero_panel');
            $menu_sub_opcion['text'] = 'Caballero';
            $menu_opcion['submenu']['caballero'] = $menu_sub_opcion;
        $menu['catalogo'] = $menu_opcion;

        //Pagina Ofertas
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == TAREA_OFERTA) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('ofertas');
        $menu_opcion['text'] = 'Ofertas';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['ofertas'] = $menu_opcion;

        return $menu;
    }//end configurar_menu_portal

    function crear_menu_panel($pagina_actual = '', $sub_pagina_actual = '') {
        $menu = configurar_menu_panel($pagina_actual, $sub_pagina_actual);
        $html = '';
        foreach ($menu as $opcion) {
            $html .= '
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
            ';
            if(sizeof($opcion['submenu']) > 0){
                $html.='
                    <li class="nav-item';$html.= ($opcion['is_active'] != FALSE) ? ' active ' : '' ;$html.='">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#'.$opcion['text'].'"
                            aria-expanded="true" aria-controls="'.$opcion['text'].'">
                            <i class="'.$opcion['icon'].'"></i>
                            <span>'.$opcion['text'].'</span>
                        </a>
                        <div id="'.$opcion['text'].'" class="collapse ';$html.= ($opcion['is_active'] != FALSE) ? ' show ' : '' ;$html.='" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">';
                                foreach ($opcion['submenu'] as $sub_opcion_menu) {
                                    $html.='<a class="collapse-item';$html.= ($sub_opcion_menu['is_active'] != FALSE) ? ' active ' : '';$html.='" href="'.$sub_opcion_menu['href'].'">'.$sub_opcion_menu['text'].'</a>';
                                }//end foreach
                            $html.='</div>
                        </div>
                    </li>
                ';
            }//end if 
            else{
                $html.='
                    <li class="nav-item';$html.= ($opcion['is_active'] != FALSE) ? ' active ' : '' ;$html.='">
                        <a class="nav-link" href="'.$opcion['href'].'">
                            <i class="'.$opcion['icon'].'"></i>
                            <span>'.$opcion['text'].'</span></a>
                    </li>
                ';
            }//end else
        }//end foreach
        return $html;
    }//end crear_menu_portal






