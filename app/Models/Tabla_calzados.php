<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class Tabla_calzados extends Model {

        protected $table      = 'calzados';
        protected $primaryKey = 'id_calzado';
        protected $returnType = 'object';

        protected $allowedFields = [
                                    'estatus_calzado', 'id_calzado', 'marca', 'modelo', 'color', 'talla',
                                    'genero', 'precio', 'imagen_calzado', 'destacado', 'descripcion', 'fecha'
                                    ];
        
        //Funciones que nos ayudaran a realizar peticiones (consultas) para obtener la información que deseemos
        public function data_table_calzados($tipo_categoria = 0) {
            $resultado = $this
                    ->select('
                                estatus_calzado, id_calzado, marca, modelo, color, talla,
                                genero, precio, imagen_calzado, destacado
                            ')
                    ->where('genero',$tipo_categoria)
                    ->orderBy('modelo', 'ASC')
                    ->findAll();
             return $resultado;
        }//end data_table_calzados

        public function obtener_calzado($id_calzado = 0){
            $resultado = $this
                        ->select('
                                    estatus_calzado, id_calzado, marca, modelo, color, talla,
                                    genero, precio, imagen_calzado, destacado, descripcion
                                ')
                        ->where('id_calzado', $id_calzado)
                        ->first();
            return $resultado;
        }//end obtener_calzado

        public function calzados_limit($limit) {
            $resultado = $this
                ->select('
                            estatus_calzado, id_calzado, marca, modelo, color, talla,
                            genero, precio, imagen_calzado, destacado, descripcion
                        ')
                ->orderBy('modelo', 'ASC')
                ->limit($limit)
                ->findAll();
            return $resultado;
        }// 

        public function calzados_actuales($fecha ='0000-00-00',$limit = 0) {
            $resultado = $this
                ->select('
                            estatus_calzado, id_calzado, marca, modelo, color, talla,
                            genero, precio, imagen_calzado, destacado, descripcion
                        ')
                ->orderBy('modelo', 'ASC')
                ->where('fecha',$fecha)
                ->limit($limit)
                ->findAll();
            return $resultado;
        }// 
    }//End Model calzados
    



