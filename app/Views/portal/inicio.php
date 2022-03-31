<?= $this->extend("plantillas/portal_base") ?>

<!-- CSS -->
<?= $this->section("css") ?>
<style>
    .img-fluid-calzado{
        max-width: 80%;
        height: 80%;
    }

</style>    
<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
                        <?php
                            foreach ($calzados as $calzado) {
                                echo '
                                    <!-- single-slide -->
                                    <div class="row single-slide align-items-center d-flex">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="banner-content">
                                                <h1>'.$calzado->modelo.'</h1>
                                                <p>'.$calzado->descripcion.'</p>
                                                <div class="add-bag d-flex align-items-center">
                                                <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                                    <span class=" add-text text-uppercase">Detalles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="banner-img">
                                                <img class="img-fluid-calzado" src="'.base_url(IMG_DIR_CALZADOS.$calzado->imagen_calzado).'" alt="imagen_calzado">
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Productos nuevos -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Productos Actuales</h1>
                        <p>Estos son nuestros productos más reciente que puedes encontrar en nuestra tienda.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    foreach ($calzados_actuales as $cal_act ) {
                        echo '
                            <!-- single product -->
                            <div class="col-lg-3 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="'.base_url(IMG_DIR_CALZADOS.$cal_act->imagen_calzado).'" alt="">
                                    <div class="product-details">
                                        <h6>'.$cal_act->modelo.'</h6>
                                        <div class="price">
                                            <h6>Marca: '.MARCA_CALZADO[$cal_act->marca].'</h6>
                                        </div>
                                        <div class="add-bag d-flex align-items-center justify-content-center">
                                            <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                            <span class="add-text text-uppercase">Detalles</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }//end foreach
                ?>
            </div>
        </div>
    </section>
    <!-- Productos nuevos -->
    <!--  -->
	<!-- End banner Area -->
<?= $this->endSection(); ?>
<!-- End  -->

<!-- JS -->
<?= $this->section("js") ?>
<?= $this->endSection(); ?>
<!-- End  -->