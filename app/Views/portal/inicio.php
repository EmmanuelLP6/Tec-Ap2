<?= $this->extend("plantillas/portal_base") ?>

<!-- CSS -->
<?= $this->section("css") ?>
    
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
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Nike New <br>Collection!</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									<div class="add-bag d-flex align-items-center">
                                    <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
										<span class=" add-text text-uppercase">Detalles</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="<?= base_url(RECURSOS_PANEL_IMG.'banner/banner-img.png'); ?>" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Nike New <br>Collection!</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Add to Bag</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
                                    <img class="img-fluid" src="<?= base_url(RECURSOS_PANEL_IMG.'banner/banner-img.png'); ?>" alt="">
								</div>
							</div>
						</div>
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
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="<?= base_url(RECURSOS_PANEL_IMG.'product/p6.jpg'); ?>" alt="">
                        <div class="product-details">
                            <h6>addidas New Hammer sole
                                for Sports person</h6>
                            <div class="price">
                                <h6>Precio: $150.00</h6>
                            </div>
                            <div class="add-bag d-flex align-items-center justify-content-center">
                                <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                <span class="add-text text-uppercase">Detalles</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="<?= base_url(RECURSOS_PANEL_IMG.'product/p1.jpg'); ?>" alt="">
                        <div class="product-details">
                            <h6>addidas New Hammer sole
                                for Sports person</h6>
                            <div class="price">
                                <h6>$150.00</h6>
                                <h6 class="l-through">$210.00</h6>
                            </div>
                            <div class="add-bag d-flex align-items-center justify-content-center">
                                <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                <span class="add-text text-uppercase">Detalles</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                    <img class="img-fluid" src="<?= base_url(RECURSOS_PANEL_IMG.'product/p4.jpg'); ?>" alt="">
                        <div class="product-details">
                            <h6>addidas New Hammer sole
									for Sports person</h6>
                            <div class="price">
                                <h6>$150.00</h6>
                                <h6 class="l-through">$210.00</h6>
                            </div>
                            <div class="add-bag d-flex align-items-center justify-content-center">
                                <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                <span class="add-text text-uppercase">Detalles</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                    <img class="img-fluid" src="<?= base_url(RECURSOS_PANEL_IMG.'product/p5.jpg'); ?>" alt="">
                        <div class="product-details">
                            <h6>addidas New Hammer sole
									for Sports person</h6>
                            <div class="price">
                                <h6>$150.00</h6>
                                <h6 class="l-through">$210.00</h6>
                            </div>
                            <div class="add-bag d-flex align-items-center justify-content-center">
                                <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                <span class="add-text text-uppercase">Detalles</span>
                            </div>
                        </div>
                    </div>
                </div>
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