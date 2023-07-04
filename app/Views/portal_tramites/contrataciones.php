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
                                <th>Nivel</th>
                                <th>Área responsable</th>
                                <th>Tipo de trámite</th>
                                <th>Comentarios</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tramites as $r) {
                                $babge_color = $r["status"] < 2 ? ($r["status"] == 1 ? "bg-label-info" : "bg-label-secondary") : ($r["status"] == 2 ? "bg-label-success" : "bg-label-warning");
                                $babge_text = $r["status"] < 2 ? ($r["status"] == 1 ? "En validación" : "Subir documentación") : ($r["status"] == 2 ? "Validado correctamente" : "Validado con observaciones");
                            ?>
                                <tr class="text-center">
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <?php if ($r["status"] == 0) { ?>
                                                <a href="<?= base_url("portal_tramites/subir_documentacion_contratacion") . "?data=" . $r["id_tramite_contratacion"] ?>" title="Subir documentación" class="btn btn-setab2"><i class='bx bx-cloud-upload'></i></a>
                                            <?php } else if ($r["status"] == 1) { ?>
                                                <button title="Subir documentación" class="btn btn-setab2" disabled><i class='bx bx-cloud-upload'></i></button>
                                            <?php } else { ?>
                                                <a href="<?= base_url("portal_tramites/detalle_documentacion_contratacion") . "?data=" . $r["id_tramite_contratacion"] ?>" title="Ver comentarios" class="btn btn-setab2"><i class='bx bx-list-check'></i></a>
                                            <?php } ?>  
                                        </div>
                                    </td>
                                    <td><?= $r["nombre_nivel"] ?></td>
                                    <td><?= $r["nombre_area"] ?></td>
                                    <td><?= $r["nombre_tramite"] ?></td>
                                    <td><?= $r["observaciones"] ?></td>
                                    <td><span class="badge <?= $babge_color ?> me-1"><?= $babge_text ?></span></td>
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