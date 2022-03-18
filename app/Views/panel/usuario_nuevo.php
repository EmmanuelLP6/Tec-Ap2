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
                    <?= form_open_multipart('registrar_usuario',['id' => 'form-user-register','class' => 'user']); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <center>
                                    <?php
                                        $img = array(
                                                        'id' => 'img-preview',
                                                        'src'    => base_url(RECURSOS_CONTENIDO_IMAGE.'usuarios/user.jpg'),
                                                        'alt'    => 'Perfil usuario',
                                                        'class'  => 'img-profile rounded-circle',
                                                        'height' => '150px',
                                                        'title'  => 'That was quite a night',
                                                    );
                                        echo img($img);
                                    ?>
                                </center>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Nombre(s) (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'nombre',
                                            'name' => 'nombre',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Nombre(s)',
                                            'value' => set_value('nombre')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Apellido paterno (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'apellido-paterno',
                                            'name' => 'apellido_paterno',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Apellido paterno',
                                            'value' => set_value('apellido_paterno')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Apellido materno (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'apellido-materno',
                                            'name' => 'apellido_materno',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Apellido materno',
                                            'value' => set_value('apellido_materno')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Sexo (<font color="red">*</font>):</label><br>
                                    <?php
                                        $select = array('class' => 'form-control form-select',
                                                            'id' => 'sexo'
                                                            );
                                        echo form_dropdown('sexo', [''=>'Selecciona el sexo del usuario']+SEXO, set_value('sexo'), $select);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Rol (<font color="red">*</font>):</label>
                                    <?php
                                        $select = array('class' => 'form-control form-select',
                                                            'id' => 'rol'
                                                            );
                                        echo form_dropdown('rol', [''=>'Selecciona el rol del usuario']+ROLES, set_value('rol'), $select);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Correo electrónico (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'email',
                                            'name' => 'email',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'correo-electronico@dominio.com',
                                            'value' => set_value('email')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Contraseña (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'password',
                                            'id' => 'password',
                                            'name' => 'password',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => '*******',
                                        );
                                        echo form_input($input);
                                    ?>      
                                </div>
                            </div>
                            <div class="col-lg-6">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Repetir contraseña (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'password',
                                            'id' => 'repetir-password',
                                            'name' => 'repeatPassword',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => '*******',
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="">Perfil (<font color="blue">opcional</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'file',
                                            'id' => 'imagen',
                                            'name' => 'foto_perfil',
                                            'class' => 'form-control',
                                        );
                                        echo form_input($input);
                                    ?>      
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <?php
                                $btn_cancel = array(
                                                    'name'    => 'btn_cancelar',
                                                    'id'      => 'btn-cancelar',
                                                    'value'   => 'true',
                                                    'class' => 'btn btn-danger',
                                                    'href' => route_to('usuarios'),
                                                    'content' => '<i class="fa fa-times"></i> Cancelar',
                                                );
                                $btn_submit = array(
                                                    'name'    => 'btn_submit',
                                                    'id'      => 'btn-submit',
                                                    'value'   => 'true',
                                                    'type'    => 'submit',
                                                    'class' => 'btn btn-success',
                                                    'content' => '<i class="fa fa-lg fa-save"></i> Registrar',
                                                );
                                echo form_button($btn_cancel);
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
        document.getElementById("imagen").onchange = function(e) {
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
                    nombre: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre(s) es requerido'
                            },
                        }//validacion
                    },//end nombre
                    apellido_paterno: {
                        validators: {
                            notEmpty: {
                                message: 'Apellido paterno es requerido'
                            },
                        }//validacion
                    },//end apellido_paterno
                    apellido_materno: {
                        validators: {
                            notEmpty: {
                                message: 'Apellido materno es requerido'
                            },
                        }//validacion
                    },//end apellido_materno
                    sexo: {
                        validators: {
                            notEmpty: {
                                message: 'Sexo es requerido'
                            },
                        }//validacion
                    },//end sexo
                    rol: {
                        validators: {
                            notEmpty: {
                                message: 'Rol es requerido'
                            },
                        }//validacion
                    },//end rol
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
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Contraseña es requerida.'
                            },
                            stringLength: {
                                min: 6,
                                message: 'La contraseña debe tener como minimo 6 caracteres.'
                            }
                        }
                    },//end password
                    repeatPassword: {
                        validators: {
                            notEmpty: {
                                message: 'Repetir contraseña es requerida.'
                            },
                            stringLength: {
                                min: 6,
                                message: 'Repetir contraseña debe tener como minimo 6 caracteres.'
                            },
                            identical: {
                                field: 'password',
                                message: 'Repetir contraseña es diferente a la anterior'
                            },
                        }
                    },//end password
                    foto_perfil: {
                        validators: {
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