<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Detalle de trámite</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-setab table-bordered text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>Tipo de documento</th>
                                <th>Archivo</th>
                                <th>Observaciones</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documentacion as $r) {
                                $babge_color = $r["status"] > 0 ? ($r["status"] == 1 ? "bg-label-success" : "bg-label-danger") : "bg-label-info";
                                $babge_text = $r["status"] > 0 ? ($r["status"] == 1 ? "Documento válido" : "Documento no válido") : "Por revisar";
                            ?>
                                <tr class="text-center">
                                    <td><?= $r["input"] ?></td>
                                    <td><a href="<?= base_url($r["ruta"]) ?>" target="_blank"><?= $r["nombre"] ?></a></td>
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
        
    }
</script>