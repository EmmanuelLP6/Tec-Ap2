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
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Información del calzado</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <?php
                                    $img = array(
                                                    'id' => 'img-preview',
                                                    'src'    => base_url(IMG_DIR_CALZADOS.$calzado->imagen_calzado),
                                                    'alt'    => 'Calzado_para_dama',
                                                    'class'  => 'img-profile',
                                                    'height' => '150px',
                                                );
                                    echo img($img);
                                ?>
                            </center>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><b>Marca: </b></label>
                                <div class="col-sm-9">
                                    <?= form_input(['type' => 'text','class' => 'form-control-plaintext form-control-user','id' => 'calzado', 'value'=> MARCA_CALZADO[$calzado->marca], 'readonly'=>'readonly']);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><b>Talla: </b></label>
                                <div class="col-sm-10">
                                    <?= form_input(['type' => 'text','class' => 'form-control-plaintext form-control-user','id' => 'calzado', 'value'=>$calzado->talla, 'readonly'=>'readonly']);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><b>Categoría: </b></label>
                                <div class="col-sm-9">
                                    <?= form_input(['type' => 'text','class' => 'form-control-plaintext form-control-user','id' => 'calzado', 'value'=>($calzado->genero != TIPO_CALZADO_DAMA) ? TIPO_CALZADO[0] : TIPO_CALZADO[1] , 'readonly'=>'readonly']);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><b>Precio: </b></label>
                                <div class="col-sm-9">
                                    <?= form_input(['type' => 'text','class' => 'form-control-plaintext form-control-user','id' => 'precio', 'value'=> '$'.number_format($calzado->precio,2,'.',','), 'readonly'=>'readonly']);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><b>Precio descuento: </b></label>
                                <div class="col-sm-8">
                                    <?= form_input(['type' => 'text','class' => 'form-control-plaintext form-control-user','id' => 'precio-descuento', 'value'=> ($oferta != NULL) ? '$'.number_format($calzado->precio-($calzado->precio*$oferta->descuento/100),2,'.',',') : '' , 'readonly'=>'readonly']);?>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Agregar/Actualizar oferta</h5>
                    <h6>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('actualizar_oferta',['id' => 'form-ofertas','class' => 'user']); ?>
                        <?= form_input(['type' => 'hidden', 'name' => 'id_calzado', 'value' => $calzado->id_calzado]);?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark" for="">Descuento en % (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'descuento-calzado',
                                            'name' => 'descuento_calzado',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => '000.00',
                                            // 'value' => set_value('descuento_calzado')
                                            'value' => ($oferta != NULL) ? number_format($oferta->descuento,2,'.',',') : set_value('descuento_calzado') 
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark" for="">Fin de la oferta (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'date',
                                            'id' => 'fecha-oferta',
                                            'name' => 'fecha_oferta',
                                            'class' => 'form-control form-control-user',
                                            'value' => ($oferta != NULL) ? $oferta->fin_oferta : set_value('fecha_oferta')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <a class="btn btn-danger" id="bnt-cancelar" href="<?= route_to('ofertas'); ?>"><i class="fa fa-times"></i> Cancelar</a>
                            <?php
                                $btn_submit = array(
                                                    'name'    => 'btn_submit',
                                                    'id'      => 'btn-submit',
                                                    'value'   => 'true',
                                                    'type'    => 'submit',
                                                    'class' => 'btn btn-success',
                                                    'content' => '<i class="fa fa-lg fa-save"></i> Registrar oferta',
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
    <script>

        //Form validation
        $(document).ready(function () {
            $('#form-ofertas').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    descuento_calzado: {
                        validators: {
                            notEmpty: {
                                message: 'El porcentaje del descuento es requerido'
                            },
                            numeric: {
                                message: 'El porcentaje debe de ser númerico'
                            }
                        }
                    },//end 
                    fecha_oferta: {
                        validators: {
                            notEmpty: {
                                message: 'Fecha fin de la oferta es requerida'
                            }
                        }//validacion
                    },//end 
                }//end fields
            });
        });//end 


        $(document).on('keyup', '#descuento-calzado', function() {
            //Se obtiene el porcentaje de descuento
            let porcentaje = document.getElementById('descuento-calzado').value;
            //se obtiene el precio actual
            let precio = `<?= $calzado->precio; ?>`;
            //Se calcula el precio con descuento
            let precioDescuento = precio-(precio*porcentaje/100);
            //Se actualiza el precio con descuento
            const formatoMoneda = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' });
            let descuento = (isNaN(precioDescuento)) ? 0 :  precioDescuento;
            document.getElementById("precio-descuento").value = formatoMoneda.format(descuento);
        });//end onchange descuento

    </script>


<?= $this->endSection(); ?>
<!-- End  -->