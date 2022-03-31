<?= $this->extend("plantillas/portal_base") ?>

<!-- CSS -->
<?= $this->section("css") ?>

<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Cátalogo para damas</h1>
					<nav class="d-flex align-items-center">
						<a href="<?= route_to('inicio');?>">Inicio<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Damas</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

    <!-- End Banner Area -->
	<div class="container">
		<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <section class="lattest-product-area pb-40 category-list">
					<div class="row">
                        <?php
                            $html='';
                            foreach ($calzados as $calzado) {
                                $descuento = number_format($calzado->precio-($calzado->precio*$calzado->descuento/100),2,'.',',');
                                $html.='
                                    <!-- single product -->
                                    <div class="col-md-4">
                                        <div class="single-product">
                                            <img class="img-fluid" src="'.base_url(IMG_DIR_CALZADOS.$calzado->imagen_calzado).'" alt="">
                                            <div class="product-details">
                                                <h6>'.$calzado->modelo.'</h6>
                                                <div class="price">';
                                                    // <h6>$150.00</h6>';
                                                    $html.= ($calzado->descuento != NULL) ? '<h6 class="">$'.$descuento.' mxn</h6>' : '<h6>$'.number_format($calzado->precio,2,'.',',').' mxn</h6>' ;
                                                    $html.= ($calzado->descuento != NULL) ? '<h6 class="l-through">$'.number_format($calzado->precio,2,'.',',').' mxn</h6>' : '' ;
                                                $html.='</div>
                                                <div class="prd-bottom">
                                                    <a href="'.route_to("informacion_calzado",$calzado->id_calzado).'"" class="social-info">
                                                        <span class="ti-bag"></span>
                                                        <p class="hover-text">Detalles</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single product -->
                                ';
                            }//end foreach    
                            echo $html;                     
                        ?>
                    </div>
                </section>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>


<?= $this->endSection(); ?>
<!-- End  -->

<!-- JS -->
<?= $this->section("js") ?>
<?= $this->endSection(); ?>
<!-- End  -->