<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class Tabla_ofertas extends Model {

        protected $table      = 'ofertas';
        protected $primaryKey = 'id_oferta';
        protected $returnType = 'object';

        protected $allowedFields = [
                                    'estatus_ofertas', 'id_oferta', 'descuento', 'fin_oferta', 'id_calzado'
                                    ];
        
        //Funciones que nos ayudaran a realizar peticiones (consultas) para obtener la información que deseemos
        public function data_table_ofertas() {
            $resultado = $this
                    ->select('
                                calzados.estatus_calzado, calzados.id_calzado, calzados.marca, calzados.modelo, calzados.color, calzados.talla,
                                calzados.genero, calzados.precio, calzados.imagen_calzado, calzados.destacado, ofertas.estatus_ofertas,
                                ofertas.id_oferta, ofertas.descuento, ofertas.fin_oferta, ofertas.id_calzado
                            ')
                    ->join('calzados','ofertas.id_calzado = calzados.id_calzado')
                    ->orderBy('modelo', 'ASC')
                    ->findAll();
             return $resultado;
        }//end data_table_ofertas

        public function obtener_oferta_calzado($id_oferta = 0){
            $resultado = $this
                        ->select('
                                    calzados.estatus_calzado, calzados.id_calzado, calzados.marca, calzados.modelo, calzados.color, calzados.talla,
                                    calzados.genero, calzados.precio, calzados.imagen_calzado, calzados.destacado, ofertas.estatus_ofertas,
                                    ofertas.id_oferta, ofertas.descuento, ofertas.fin_oferta, ofertas.id_calzado
                                ')
                        ->where('id_oferta', $id_oferta)
                        ->join('calzados','ofertas.id_calzado = calzados.id_calzado')
                        ->first();
            return $resultado;
        }//end obtener_oferta_calzado

        public function obtener_calzado_oferta($id_calzado = 0){
            $resultado = $this
                        ->select('
                                    estatus_ofertas, id_oferta, descuento, fin_oferta, id_calzado
                                ')
                        ->where('id_calzado', $id_calzado)
                        ->first();
            return $resultado;
        }//end obtener_calzado_oferta

    }//End Model calzados
    



