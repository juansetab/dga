<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Documentación requerida para validación</h5>
            <div class="card-body">
                <p class="fw-light fst-italic" style="font-size:14px; text-align:justify">*Los documentos solicitados para validación pueden no ser todos los que deba presentar físicamente en ventanilla. Para ver la lista completa, formatos y guías de llenado
                    <a href="<?= base_url("drh/requisitos_contratacion_estatal") ?>" target="_blank"><b> click aquí</b></a>
                </p>
                <form action="<?= base_url("portal_tramites/guardar_documentacion_contratacion") ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?= $tramite["id"] ?>">
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
                    <h5>Datos para contactarle</h5>
                    <div class="mb-3 row">
                        <label for="html5-tel-input" class="col-md-3 col-form-label">Correo eletrónico</label>
                        <div class="col-md-9">
                            <input class="form-control form-control-sm" type="email" name="correo" id="correo" placeholder="Correo electrónico donde se le dará aviso de su trámite" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-tel-input" class="col-md-3 col-form-label">Número telefónico</label>
                        <div class="col-md-9">
                            <input class="form-control form-control-sm" type="tel" name="telefono" name="telefono" placeholder="Número telefónico donde se le dará aviso de su trámite" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button id="btn-submit" class="btn btn-setab1"><i class='bx bxl-telegram'></i> Enviar</button>
                    </div>
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