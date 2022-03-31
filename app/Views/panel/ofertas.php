<?= $this->extend("plantillas/panel_base") ?>
<!-- CSS -->
<?= $this->section("css") ?>
    <link href="<?= base_url(RECURSOS_PANEL_VENDOR.'datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
    <!-- <div class="row"> -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nuestras ofertas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoría</th>
                                <th>Calzado</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Precio actual</th>
                                <th>Descuento</th>
                                <th>Oferta</th>
                                <th>Fin oferta</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Categoría</th>
                                <th>Calzado</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Precio actual</th>
                                <th>Descuento</th>
                                <th>Oferta</th>
                                <th>Fin oferta</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $contador = 0;
                                $html= '';
                                foreach ($ofertas as $oferta) {
                                    $vencimiento = new DateTime($oferta->fin_oferta);
                                    $hoy = new DateTime('now');
                                    $precio_descuento = $oferta->precio-($oferta->precio*$oferta->descuento/100);
                                    $html.='
                                        <tr>
                                            <td>'.++$contador.'</td>
                                            <td>'.TIPO_CALZADO[$oferta->genero].'</td>
                                            <td><img src="'.base_url(IMG_DIR_CALZADOS.$oferta->imagen_calzado).'" alt="imagen_calzado" height="120px"></td>
                                            <td>'.MARCA_CALZADO[$oferta->marca].'</td>
                                            <td>'.$oferta->modelo.'</td>
                                            <td>'.number_format($oferta->precio,2,'.',',').'</td>
                                            <td>'.$oferta->descuento.'%</td>
                                            <td>'.number_format($precio_descuento,2,'.',',').'</td>
                                            <th '.(($vencimiento<$hoy)?'style="color:red"':'style="color:green"').'>
                                                '.$oferta->fin_oferta.(($vencimiento<$hoy)?'<br>Expirada':'<br>Vigente').'
                                            </td>
                                            <td>
                                                <a href="'.route_to("oferta_nueva",$oferta->id_calzado).'" class="btn btn-warning btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar oferta</span>
                                                </a><br>
                                                <a href="'.route_to("eliminar_oferta",$oferta->id_calzado).'" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <span class="text">Eliminar</span>
                                                </a>
                                            </td>
                                        </tr>
                                    ';
                                }//end foreach
                                echo $html;
                            ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- </div> -->
<?= $this->endSection(); ?>
<!-- End  -->

<!-- JS -->
<?= $this->section("js") ?>
<!-- Page level plugins -->
    <script src="<?= base_url(RECURSOS_PANEL_VENDOR.'/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url(RECURSOS_PANEL_VENDOR.'/datatables/dataTables.bootstrap4.min.js');?>"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable({
               'processing': true,
                "responsive": true,
            //     "scrollX": true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ datos",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Datos no disponibles por el momento",
                    "processing":     "Procesando ...",
                    "search":         "Buscar:",
                    "zeroRecords":    "Datos no disponibles por el momento",
                    "paginate": {
                    "first":      "Primera",
                    "last":       "Última",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                    },
                }//End languagee 
            });
        });
    </script>
<?= $this->endSection(); ?>
<!-- End  -->