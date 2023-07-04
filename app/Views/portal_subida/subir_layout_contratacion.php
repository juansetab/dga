<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Detalle de trámite</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-setab table-bordered text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>Usuario</th>
                                <th>Estatus</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($finded as $r) { ?>
                                <tr class="text-center">
                                    <td><?= $r["usuario"] ?></td>
                                    <td><?= $r["status"] ?></td>
                                    <td><?= $r["msg"] ?></td>
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