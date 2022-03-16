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
    </style>
<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Registrar nuevo usuario</h5>
                    <h6>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('',['id' => 'form-user-register','class' => 'user']); ?>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Email address (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'email',
                                            'id' => 'email',
                                            'name' => 'email',
                                            'class' => 'form-control form-control-user',
                                            'aria-describedby' => 'email',
                                            'placeholder' => 'ejemplo@live.com',
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</button>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-lg fa-save"></i> Registrar</button>
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
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email es requerido'
                            },
                            emailAddress: {
                                message: 'Email esta mal formado (ejemplo@live.com).'
                            }
                        }//validacion
                    },//end email
                }//end fields
            });
        });
    </script>
<?= $this->endSection(); ?>
<!-- End  -->