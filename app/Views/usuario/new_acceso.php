<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login|TenisShop</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(RECURSOS_PANEL_VENDOR.'fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(RECURSOS_PANEL_CSS.'sb-admin-2.min.css');?>" rel="stylesheet">
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
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(<?= base_url(RECURSOS_CONTENIDO_IMAGE.'icons/icono-login.jpg');?>);"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                          <h1 class="h4 text-gray-900 mb-4">Ingresa tus credenciales de acceso</h1>
                                    </div>
                                    <?= form_open('validar_acceso',["class"=>"user", "id"=>"formulario-acceso"]);?>
                                        <div class="form-group">
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
                                        <div class="form-group">
                                            <?php
                                                $input = array(
                                                    'type' => 'password',
                                                    'id' => 'password',
                                                    'name' => 'password',
                                                    'class' => 'form-control form-control-user',
                                                    'aria-describedby' => 'password',
                                                    'placeholder' => '********',
                                                );
                                                echo form_input($input);
                                            ?>
                                        </div>
                                    
                                            <?php
                                                $input = array(
                                                    'type' => 'submit',
                                                    'id' => 'btn-submit',
                                                    'value' => 'Ingresar',
                                                    'class' => 'btn btn-primary btn-user btn-block',
                                                );
                                                echo form_input($input);
                                            ?>
                                        
                                    <?= form_close();?>
                                    <hr>
                                    <a href="<?= route_to('inicio');?>" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Inicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(RECURSOS_PANEL_VENDOR.'jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url(RECURSOS_PANEL_VENDOR.'bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(RECURSOS_PANEL_VENDOR.'jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(RECURSOS_PANEL_JS.'js/sb-admin-2.min.js');?>"></script>
    
    <!-- BootstrapValidator JS -->
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bostrap-validator.min.js')?>"></script>

    <!-- ********************************************************** -->
    <!-- **************** BOOTSTRAP NOTIFY********************** -->
    <script src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'bootstrap-notify.min.js');?>"></script>
    
    <script>
        <?= mostrar_mensaje(); ?>
    </script>

    <!-- Validar formulario login -->
    <script>
        $(document).ready(function () {
            $('#formulario-acceso').bootstrapValidator({
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
                    }
                }//end fields
            });
        });
    </script>
</body>

</html>