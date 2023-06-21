<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Trámites activos</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-setab table-bordered text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>Acciones</th>
                                <th>Trabajador</th>
                                <th>Nivel</th>
                                <th>Tipo de trámite</th>
                                <th>Estatus</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php foreach($tramites as $r){ ?>
                            <tr class="text-center">
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url("portal/subir_documentacion_estatal") . "?data=" . $r["id_tramite"] ?>" title="Revisar documentación" class="btn btn-setab2"><i class='bx bx-list-check'></i></a>
                                    </div>
                                </td>
                                <td><?= $r["id_usuario"] ?></td>
                                <td><?= $r["nombre_nivel"] ?></td>
                                <td><?= $r["nombre_tramite"] ?></td>
                                <td><span class="badge bg-label-info me-1">Por validar</span></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        <?php
        if (empty($tramites)) {
            echo "Swal.fire({
                    icon: 'warning',
                    title: 'Sin trámites',
                    text: 'No tiene trámites pendientes',
                    confirmButtonColor: '#B38E5D'
                });";
        }
        ?>
    }
</script>