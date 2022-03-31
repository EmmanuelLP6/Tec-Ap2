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
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Detalles del calzado</h1>
					<nav class="d-flex align-items-center">
						<a href="<?= route_to('inicio');?>">Inicio<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?= ($calzado->genero == TIPO_CALZADO_CABALLERO) ? route_to("categoria_caballero") : route_to("categoria_dama") ;?>"><?= ($calzado->genero == TIPO_CALZADO_CABALLERO) ? 'Catálogo Caballero' : 'Catálogo Dama' ;?><span class="lnr lnr-arrow-right"></span></a>
						<a href="#"><?= $calzado->modelo;?></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

    <!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
                    <img class="img-fluid-calzado" src="<?= base_url(IMG_DIR_CALZADOS.$calzado->imagen_calzado);?>" alt="">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
						</div>
                    </div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?= $calzado->modelo; ?></h3>
                        <?php
                            $precio = ($calzado->descuento != NULL) ? number_format($calzado->precio-($calzado->precio*$calzado->descuento/100),2,'.',',') : number_format($calzado->precio,2,'.',',');
						    echo '<h2>$'.$precio.' mxn</h2>';
                        ?>
						<ul class="list">
							<li><a class="active" href="#"><span>Marca:</span> <?= MARCA_CALZADO[$calzado->marca];?></a></li>
						</ul>
						<p><?= $calzado->descripcion; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

<?= $this->endSection(); ?>
<!-- End  -->

<!-- JS -->
<?= $this->section("js") ?>
<?= $this->endSection(); ?>
<!-- End  -->