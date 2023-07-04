<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Subir layout de personal a contratar</h5>
            <div class="card-body">
                <p>Ejemplo:</p>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-nowrap mb-4" style="font-family: system-ui">
                        <thead>
                            <tr class="text-center" style="background-color:#e4e4e4;">
                                <th>#</th>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <th style="background-color:#e4e4e4;">1</th>
                                <th><b>CURP</b></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="text-center">
                                <th style="background-color:#e4e4e4;">2</th>
                                <th>OEAF771012HMCRGR09</th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="<?= base_url("portal_subida/subir_layout_contratacion")?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
                            <label>Layout:</label>
                            <div class="input-group input-group-sm">
                                <input type="file" class="form-control" id="layout_xlsx" name="layout_xlsx" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                <button class="btn btn-setab1"  type="button"><i class='bx bx-info-circle'></i></button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                            <label>Nivel:</label>
                            <select class="form-select form-select-sm" id="nivel" name="nivel">
                                <?php
                                foreach ($niveles as $k => $r) {
                                    $selected = $k == 0 ? "selected" : "";
                                    echo "<option value='" . $r["id"] . "'>" . $r["nombre"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                            <label>Tipo de contratación:</label>
                            <select class="form-select form-select-sm" id="tipo_contratacion" name="tipo_contratacion">
                                <?php
                                foreach ($tipo_contratacion as $k => $r) {
                                    $selected = $k == 0 ? "selected" : "";
                                    echo "<option value='" . $r["id"] . "'>" . $r["nombre"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                            <label>Área:</label>
                            <select class="form-select form-select-sm" id="nivel" name="nivel">
                                <?php
                                foreach ($areas as $k => $r) {
                                    $selected = $k == 0 ? "selected" : "";
                                    echo "<option value='" . $r["id"] . "'>" . $r["nombre"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="text-center ">
                            <button class="btn btn-setab1"><i class='bx bx-cloud-upload'></i></i> Subir layout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
    }

    function info_upload() {
        Swal.fire({
            title: "¡Importante!",
            html: "Debe subir un layout en formato excel (.XLSX) donde la primera fila debe ser el título de la columna.<p>Los campos requeridos son:</p><li><b>CURP</b></li>",
            icon: "warning",
            confirmButtonColor: "#B38E5D"
        });
    }

</script>