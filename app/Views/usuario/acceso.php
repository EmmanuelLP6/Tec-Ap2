<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url(RECURSOS_USUARIO_IMAGES.'cons/favicon.ico');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_USUARIO_VENDOR.'bootstrap/css/bootstrap.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_USUARIO_FONTS.'font-awesome-4.7.0/css/font-awesome.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_USUARIO_VENDOR.'animate/animate.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_USUARIO_VENDOR.'css-hamburgers/hamburgers.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_USUARIO_VENDOR.'select2/select2.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_USUARIO_CSS.'util.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url(RECURSOS_USUARIO_CSS.'main.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= base_url(RECURSOS_CONTENIDO_IMAGE.'/icons/icono-login.jpg');?>" alt="IMG">
                </div>

                
                <?= form_open('validar_acceso',['id' => 'registrationForm']); ?>
                    <span class="login100-form-title">
                        Ingresa tus credenciales
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Correo es rquerido: ejemplo@dominio.com">
                        <?php
                            $input = array(
                                        'class' => 'input100',        
                                        'type' => 'text',        
                                        'name' => 'email',        
                                        'placeholder' => 'Email',        
                                    );
                            echo form_input($input);
                        ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password es requerida">
                        <?php
                            $input = array(
                                        'class' => 'input100',        
                                        'type' => 'password',        
                                        'name' => 'password',        
                                        'placeholder' => 'Password',        
                                    );
                            echo form_input($input);
                        ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-136">
						<a class="txt2" href="<?= route_to('inicio');?>">
							Inicio
						</a>
					</div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?= base_url(RECURSOS_USUARIO_VENDOR.'jquery/jquery-3.2.1.min.js');?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(RECURSOS_USUARIO_VENDOR.'bootstrap/js/popper.js');?>"></script>
    <script src="<?= base_url(RECURSOS_USUARIO_VENDOR.'bootstrap/js/bootstrap.min.js');?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(RECURSOS_USUARIO_VENDOR.'select2/select2.min.js');?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(RECURSOS_USUARIO_VENDOR.'tilt/tilt.jquery.min.js');?>"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?= base_url(RECURSOS_USUARIO_JS.'main.js');?>"></script>
    
    <!-- ********************************************************** -->
    <!-- **************** BOOTSTRAP NOTIFY********************** -->
    <script src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'bootstrap-notify.min.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
        <?= mostrar_mensaje(); ?>
    </script>
    
    <script>
        // just for the demos, avoids form submit
        $( "#registrationForm" ).validate({
            success: "valid",
            rules: {
                email: {
                    required: true,
                    email: true 
                },
                password: {
                    required: true
                }
            },
            messages: {
                email:{
                    required: "Email es requerido.",
                    email: 'El email esta mal formado (ejemplo@domino.com).'
                },
                password:{
                    required: "Password es requerida."
                }
            },
        });
    </script>

</body>

</html>