<?= $this->extend("plantillas/panel_base") ?>
<!-- CSS -->
<?= $this->section("css") ?>
    <!-- BostrapValidator css -->
    <link rel="stylesheet" href="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'css/boostrapvalidator.min.css');?>">

    <!-- Show the validation -->
    <style>
        .has-error .help-block{
            line-height: 45px;
            color: red;
        }
        .has-error input{
            border-color: red !important;
        }
        .has-success input{
            border-color: green !important;
        }
        .has-error select{
            border-color: red !important;
        }
        .has-success select{
            border-color: green !important;
        }
        .has-error textarea{
            border-color: red !important;
        }
        .has-success textarea{
            border-color: green !important;
        }
    </style>
<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Editar calzado</h5>
                    <h6>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('editar_calzado',['id' => 'form-user-register','class' => 'user']); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <center>
                                    <?php
                                        $img = array(
                                                        'id' => 'img-preview',
                                                        'src'    => base_url(RECURSOS_CONTENIDO_IMAGE.'calzados/'.$calzado->imagen_calzado),
                                                        'alt'    => 'Calzado_para_dama',
                                                        'class'  => 'img-profile',
                                                        'height' => '150px',
                                                    );
                                        echo img($img);
                                        echo form_input(['type' => 'hidden', 'name' => 'calzado_anterior', 'value' => $calzado->imagen_calzado]);
                                        echo form_input(['type' => 'hidden', 'name' => 'id_calzado', 'value' => $calzado->id_calzado]);
                                    ?>
                                </center><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Marca (<font color="red">*</font>):</label>
                                    <?php
                                        $select = array('class' => 'form-control form-select',
                                                            'id' => 'marca-calzado'
                                                            );
                                        echo form_dropdown('marca_calzado', [''=>'Selecciona una marca para el calzado']+MARCA_CALZADO, $calzado->marca, $select);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Módelo del calzado (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'modelo-calzado',
                                            'name' => 'modelo_calzado',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Módelo del calzado',
                                            'value' => $calzado->modelo
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Color del calzado (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'color-calzado',
                                            'name' => 'color_calzado',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Color del calzado',
                                            'value' => $calzado->color
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Talla del calzado (<font color="red">*</font>):</label><br>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'talla-calzado',
                                            'name' => 'talla_calzado',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Talla del calzado',
                                            'value' => $calzado->talla
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Categoría del calzado (<font color="red">*</font>):</label>
                                    <?php
                                        $select = array('class' => 'form-control form-select',
                                                            'id' => 'categoria-calzado'
                                                            );
                                        echo form_dropdown('categoria_calzado', [''=>'Selecciona una categoría para el calzado']+TIPO_CALZADO, $calzado->genero, $select);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Precio del calzado (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'number',
                                            'id' => 'precio-calzado',
                                            'name' => 'precio_calzado',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => '0000.00',
                                            'min' => '1',
                                            'value' => $calzado->precio
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark" for="">Destacado (<font color="red">*</font>):</label>
                                    <?php
                                        $select = array('class' => 'form-control form-select',
                                                            'id' => 'destacado-calzado'
                                                            );
                                        echo form_dropdown('destacado_calzado', [''=>'Selecciona una opción para el calzado']+CALZADO_DESTACADO, $calzado->destacado, $select);
                                    ?>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark" for="">Descripción (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'id' => 'descripcion-area',
                                            'name' => 'descripcion_calzado',
                                            'placeholder' => 'Escribe aquí la descripción de tu calzado...',
                                            'class' => 'form-control',
                                            'rows' => '4',
                                            'value' => $calzado->descripcion
                                        );
                                        echo form_textarea($input);
                                    ?>      
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="">Imagen del calzado (<font color="blue">Opcional</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'file',
                                            'id' => 'imagen-calzado',
                                            'name' => 'image_calzado',
                                            'class' => 'form-control',
                                        );
                                        echo form_input($input);
                                    ?>      
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <a class="btn btn-danger" id="bnt-cancelar" href="<?= route_to('catalogo_dama_panel'); ?>"><i class="fa fa-times"></i> Cancelar</a>
                            <?php
                                $btn_submit = array(
                                                    'name'    => 'btn_submit',
                                                    'id'      => 'btn-submit',
                                                    'value'   => 'true',
                                                    'type'    => 'submit',
                                                    'class' => 'btn btn-success',
                                                    'content' => '<i class="fa fa-lg fa-save"></i> Editar',
                                                );
                                echo form_button($btn_submit);
                            ?>
                        </div>

                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
<!-- End  -->

<!-- JS -->
<?= $this->section("js") ?>
    <!-- Js boostrap Validation -->
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bostrap-validator.min.js')?>"></script>
    <!--  -->
    <script type="text/javascript">
        document.getElementById("imagen-calzado").onchange = function(e) {
            // Se crea un objeto FileReader
            let reader = new FileReader();
            // Se leé el archivo seleccionado y se pasa como argumento al objeto FileReader
            reader.readAsDataURL(e.target.files[0]);
            // Se visualiza la imagen una vez que fue cargada en el objeto FileReader
            reader.onload = function(){
                let imgPreview = document.getElementById('img-preview');
                imgPreview.src = reader.result;
            };
        }
    </script>
    <!-- Form validation -->
    <script>
        $(document).ready(function () {
            $('#form-user-register').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    marca_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'La marca del calzado es requerida'
                            },
                        }//validacion
                    },//end 
                    modelo_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'Módelo del calzado es requerido'
                            },
                        }//validacion
                    },//end 
                    color_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'Color del calzado es requerido'
                            },
                        }//validacion
                    },//end 
                    talla_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'Talla del calzado es requerida'
                            },
                        }//validacion
                    },//end 
                    categoria_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'La categoría del calzado es requerida'
                            },
                        }//validacion
                    },//end 
                    precio_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'Precio del calzado es requerida'
                            },
                        }//validacion
                    },//end 
                    destacado_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'Precio del calzado es requerida'
                            },
                        }//validacion
                    },//end 
                    descripcion_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'Descripción del calzado es requerida'
                            },
                        }//validacion
                    },//end 
                    image_calzado: {
                        validators: {
                            // notEmpty: {
                            //     message: 'La imagen del calzado es requerida'
                            // },
                            file: { 
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                // maxSize: 2048 * 1024,
                                message: 'El archivo seleccionado no es valido'
                            }
                        }
                    }
                }//end fields
            });
        });
    </script>
<?= $this->endSection(); ?>
<!-- End  -->