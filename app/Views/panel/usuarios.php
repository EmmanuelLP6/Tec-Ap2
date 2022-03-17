<?= $this->extend("plantillas/panel_base") ?>
<!-- CSS -->
<?= $this->section("css") ?>
    <link href="<?= base_url(RECURSOS_PANEL_VENDOR.'datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
    <!-- Content Row -->
    <a class="btn btn-primary" style="margin-bottom: 15px;" href="<?= route_to('usuario_nuevo');?>">
        <i class="fa fa-plus" aria-hidden="true"></i>
       Nuevo usuario
    </a>
    <!-- <div class="row"> -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todos los usuarios registrados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Estatus</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Estatus</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $contador = 0;
                                $html= '';
                                foreach ($usuarios as $usuario) {
                                    $html.= '
                                        <tr>
                                            <td>'.++$contador.'</td>
                                            <td>'.$usuario->nombre_usuario.' '.$usuario->ap_paterno_usuario.' '.$usuario->ap_materno_usuario.'</td>
                                            <td>'.$usuario->rol.'</td>';
                                            if ($usuario->estatus_usuario != ESTATUS_HABILITADO){
                                                $html.='<td>
                                                        <a href="'.route_to("estatus_usuario", $usuario->id_usuario, ESTATUS_HABILITADO).'" class="btn btn-secondary btn-icon-split btn-sm">
                                                            <span class="icon text-white-50">
                                                                <i class="fa fa-eye-slash"></i>
                                                            </span>
                                                            <span class="text">Deshabilitado</span>
                                                        </a>
                                                    </td>';
                                            }
                                            else{
                                                $html.='<td>
                                                            <a href="'.route_to('estatus_usuario', $usuario->id_usuario, ESTATUS_DESHABILITADO).'" class="btn btn-success btn-icon-split btn-sm">
                                                                <span class="icon text-white-50">
                                                                    <i class="fa fa-eye"></i>
                                                                </span>
                                                                <span class="text">Habilitado</span>
                                                            </a>
                                                        </td>';
                                            }
                                    $html.=' <td>
                                                <a href="'.route_to("detalles_usuario",$usuario->id_usuario).'" class="btn btn-warning btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <a href="'.route_to("eliminar_usuario",$usuario->id_usuario).'" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    <span class="text">Eliminar</span>
                                                </a>
                                            </td>
                                        </tr>';
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
                "scrollX": true,
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