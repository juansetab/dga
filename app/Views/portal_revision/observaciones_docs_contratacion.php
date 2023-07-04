<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Trámite de <b><?= strtoupper($tramite["nombre_usuario"]) ?></b></h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-setab table-bordered text-nowrap mb-4">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Documento</th>
                                <th>Estatus</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($docs_subidos as $k => $r) { ?>
                                <tr data-id="<?= $r["id"] ?>" class="text-center">
                                    <td id="count"><?= $k + 1 ?></td>
                                    <td id="url"><a href="<?= base_url($r["ruta"]) ?>" target="_blank" title="<?= $r["nombre"] ?>"><?= $r["input"] ?></a></td>
                                    <td id="status">
                                        <select class="form-select form-select-sm">
                                            <option value="1" <?= $r["status"] == 1 ? "selected" : "" ?>>Válido</option>
                                            <option value="2" <?= $r["status"] == 2 ? "selected" : "" ?>>No válido</option>
                                        </select>
                                    </td>
                                    <td id="observaciones"><textarea class="form-control form-control-sm"><?= $r["observaciones"] ?></textarea></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <label>Observaciones generales (máximo 250 caracteres):</label>
                    <div class="mb-4">
                        <textarea class="form-control form-control-sm" name="observaciones_grales" id="observaciones_grales" maxlength="50"><?= $tramite["observaciones"] ?></textarea>
                    </div>
                    <div class="text-center ">
                        <button id="btn-submit" class="btn btn-setab1"><i class='bx bx-save'></i> Guardar observaciones</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        document.querySelector("#btn-submit").onclick = function() {
            save();
        };
    }

    function json_table() {
        array = [];
        elements = document.querySelectorAll("table tbody tr");
        elements.forEach(function(element, index) {
            select = element.querySelector("select").value;
            textarea = element.querySelector("textarea").value;
            id = element.dataset.id;
            temp_array = {
                "id": id,
                "status": select,
                "observaciones": textarea
            };
            array.push(temp_array);
        });
        return JSON.stringify(array);
    }

    function save() {
        json = json_table();
        var xhttp = new XMLHttpRequest();
        if (document.querySelector("#observaciones_grales").value == "") {
            Swal.fire({
                title: "¡Advertencia!",
                text: "El campo de observaciones generales no debe ir vacío",
                icon: "warning",
                confirmButtonColor: "#B38E5D"
            });
            return false;
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && (this.status >= 200 && this.status <= 299)) {
                data = JSON.parse(this.responseText);
                if (data.status == 1) {
                    Swal.fire({
                        title: "Información actualizada",
                        text: data.msg,
                        icon: "success",
                        confirmButtonColor: "#B38E5D"
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: data.msg,
                        icon: "error",
                        confirmButtonColor: "#B38E5D"
                    });
                }
            } else if (this.readyState == 4 && this.status != 200) {
                Swal.fire({
                    title: "Error status: " + this.status,
                    text: this.readyState,
                    icon: "error",
                    confirmButtonColor: "#B38E5D"
                });
            }
        };
        xhttp.open("POST", "<?= base_url("portal_revision/updateDocs_subidosAction") ?>");
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=<?= $tramite["id_tramite_contratacion"] ?>&json=" + json + "&observaciones=" + document.querySelector("#observaciones_grales").value);
    }
</script>