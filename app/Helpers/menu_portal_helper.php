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

    function configurar_menu_portal($pagina_actual = '') {
        //Arreglo que almacenra todo el menu
        $menu = array();
        //Arreglo que almacenra las opciones del menu
        $menu_opcion = array();
        //Arreglo que almacenra las opciones del menu
        $menu_sub_opcion = array();

        //Pagina Inicio
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == PAGINA_INICIO) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('inicio');
        $menu_opcion['text'] = 'Inicio';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['inicio'] = $menu_opcion;

        //Pagina Catalogo Dama
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == PAGINA_CATALOGO_DAMA) ? TRUE : FALSE ;
        $menu_opcion['href'] = '#';
        $menu_opcion['text'] = 'Catálogo';
        $menu_opcion['icon'] = 'fa fa-book';
        $menu_opcion['submenu'] = array();
            $menu_sub_opcion = array();
            $menu_sub_opcion['href'] = route_to('catalogo_dama');
            $menu_sub_opcion['text'] = 'Dama';
            $menu_opcion['submenu']['dama'] = $menu_sub_opcion;
            $menu_sub_opcion = array();
            $menu_sub_opcion['href'] = route_to('catalogo_caballero');
            $menu_sub_opcion['text'] = 'Caballero';
            $menu_opcion['submenu']['caballero'] = $menu_sub_opcion;
        $menu['catalogo'] = $menu_opcion;


        //Pagina Galeria
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == PAGINA_GALERIA) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('galeria');
        $menu_opcion['text'] = 'Galeria';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['galeria'] = $menu_opcion;

        //Pagina Ofertas
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == PAGINA_OFERTA) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('ofertas');
        $menu_opcion['text'] = 'Ofertas';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['ofertas'] = $menu_opcion;

        //Pagina Contacto
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == PAGINA_CONTACTO) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('contacto');
        $menu_opcion['text'] = 'Contacto';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['contacto'] = $menu_opcion;

        //Pagina Acerca de
        $menu_opcion = array();
        $menu_opcion['is_active'] = ($pagina_actual == PAGINA_ACERCA_DE) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to('acerca_de');
        $menu_opcion['text'] = 'Acerca de';
        $menu_opcion['icon'] = 'fa fa-address-book';
        $menu_opcion['submenu'] = array();
        $menu['acerca_de'] = $menu_opcion;

        return $menu;
    }//end configurar_menu_portal

    function crear_menu_portal($pagina_actual = '') {
        $menu = configurar_menu_portal($pagina_actual);
        // d($menu);
        $html = '';
        $html.='<ul class="nav navbar-nav menu_nav ml-auto">';
            foreach ($menu as $opcion) {
                if(sizeof($opcion['submenu']) > 0){
                    $html.='<li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">'.$opcion['text'].'</a>
                                <ul class="dropdown-menu">';
                                    foreach ($opcion['submenu'] as $sub_opcion_menu) {
                                        $html.='<li class="nav-item"><a class="nav-link" href="'.$sub_opcion_menu['href'].'">'.$sub_opcion_menu['text'].'</a></li>';
                                    }//end foreach
                                $html.='</ul>
                            </li>';
                }//end if 
                else{
                    $html.='<li class="nav-item';$html.= ($opcion['is_active'] != FALSE) ? ' active ' : '' ;$html.='"><a class="nav-link" href="'.$opcion['href'].'">'.$opcion['text'].'</a></li>';
                }
            }//end foreach
        $html.='</ul>';
        return $html;
    }//end crear_menu_portal






