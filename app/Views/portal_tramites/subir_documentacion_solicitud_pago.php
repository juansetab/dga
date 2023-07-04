<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url("portal_tramites/guardar_documentacion_contratacion") ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?= $tramite["id"] ?>">
                    <input type="hidden" id="id_ct" name="id_ct" value="">
                    <input type="hidden" id="id_cat" name="id_cat" value="">

                    <h5>Información de la solicitud</h5>
                    <div class="row">
                        <div class="col-sm-12 col-md-7 col-lg-7 mb-2">
                            <label>Prestación socioeconómica a solicitar:</label>
                            <select class="form-select form-select-sm" name="id_tramite_solicitud_pago" id="id_tramite_solicitud_pago" required>
                                <?php foreach ($tipos_solicitud as $r) {
                                    echo "<option value='" . ($r["id"] > 0 ? $r["id"] : "") . "'>" . $r["nombre"] . "</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5 mb-2">
                            <label>Nivel:</label>
                            <select class="form-select form-select-sm" name="id_nivel" id="id_nivel" required>
                                <?php foreach ($niveles as $r) {
                                    echo "<option value='" . ($r["id"] > 0 ? $r["id"] : "") . "'>" . $r["descripcion"] . "</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                            <label>Centro de trabajo:</label>
                            <div class="input-group input-group-sm">
                                <button class="btn btn-setab1" type="button" id="button-addon1"><i class='bx bx-search-alt'></i> Buscar</button>
                                <input type="text" class="form-control" id="nombre_cct" name="nombre_cct" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                            <label>Categoría:</label>
                            <div class="input-group input-group-sm">
                                <button class="btn btn-setab1" type="button" id="button-addon1"><i class='bx bx-search-alt'></i> Buscar</button>
                                <input type="text" class="form-control" id="nombre_cct" name="nombre_cct" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>No. de plaza y/o horas:</label>
                            <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>No. de pagador:</label>
                            <input class="form-control form-control-sm" type="text" name="pagador" id="pagador" placeholder="No. de pagador" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>Nombre:</label>
                            <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>Primer apellido:</label>
                            <input class="form-control form-control-sm" type="text" name="primer_apellido" id="primer_apellido" placeholder="Primer apellido" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>Segundo apellido:</label>
                            <input class="form-control form-control-sm" type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo apellido" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>RFC:</label>
                            <input class="form-control form-control-sm" type="text" name="rfc" id="rfc" placeholder="Clave de Registro Federal de Contribuyentes" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>Correo eletrónico:</label>
                            <input class="form-control form-control-sm" type="email" name="correo" id="correo" placeholder="Correo electrónico donde se le dará aviso de su trámite" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>Número telefónico:</label>
                            <input class="form-control form-control-sm" type="tel" name="telefono" name="telefono" placeholder="Número telefónico donde se le dará aviso de su trámite" required>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                            <label>Banco:</label>
                            <select class="form-select form-select-sm" name="banco" id="banco" required>
                                <option value='BBVA BANCOMER'>BBVA BANCOMER</option>
                                <option value='BANORTE'>BANORTE</option>
                                <option value='BANAMEX'>BANAMEX</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
                            <label>CLABE:</label>
                            <input class="form-control form-control-sm" type="text" name="clabe" name="clabe" placeholder="La cuenta debe ser la misma con la que cobraba en esta Secretaría" required>
                        </div>
                    </div>
                    <h5>Documentación requerida</h5>
                    <p class="fw-light fst-italic" style="font-size:14px; text-align:justify">*Los documentos solicitados para validación pueden no ser todos los que deba presentar físicamente en ventanilla. Para ver la lista completa, formatos y guías de llenado
                        <a href="<?= base_url("drh/requisitos_contratacion_estatal") ?>" target="_blank"><b> click aquí</b></a>
                    </p>
                    <?php
                    foreach ($documentacion as $r) { ?>
                        <div class="mb-3">
                            <label for="" class="form-label"><?= $r["label"] ?></label>
                            <div class="input-group input-group-sm input-group-merge">
                                <input class="form-control form-control-sm" type="file" id="<?= $r["name"] ?>" name="<?= $r["name"] ?>" <?= $r["accept"] != "" ? "accept='" . $r["accept"] . "'" : ""  ?> <?= $r["required"] ?> size="1">
                                <span type="button" class="input-group-text" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-original-title="<?= $r["tooltip"] ?>"><i class='bx bx-info-circle'></i></span>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        Swal.fire({
            icon: 'info',
            title: '¡Importante!',
            text: 'Suba la documentación requerida, una vez cargados todos los documentos de clic en "Enviar" para continuar con el trámite. Una vez enviada para validación, no podrá modificar la documentación',
            confirmButtonColor: '#B38E5D'
        });

        document.querySelector("form").onsubmit = function() {
            document.querySelector("#btn-submit").disabled = true;
        };

        maxSize = 3000000;
        array = <?= json_encode(array_column($documentacion, "name")) ?>;
        array.forEach(function(value, index) {
            input_file = document.querySelector("#" + value);
            input_file.addEventListener("change", function() {
                if (this.files.length <= 0) return;
                const archivo = this.files[0];
                if (archivo.size > maxSize) {
                    const tamanioEnMb = maxSize / 1000000;
                    Swal.fire({
                        icon: 'error',
                        title: '¡Importante!',
                        text: `El tamaño máximo es ${tamanioEnMb} MB`,
                        confirmButtonColor: '#B38E5D'
                    });
                    input_file.value = "";
                }
            });
        });
    }
</script>