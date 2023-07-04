<!--<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>-->
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Trámites activos</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-sm table-setab table-bordered text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>Acciones</th>
                                <th>Trabajador</th>
                                <th>Nivel</th>
                                <th>Tipo de trámite</th>
                                <th>Estatus</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tramites as $r) { ?>
                                <tr id="tr_<?= $r["id_tramite_contratacion"] ?>" class="text-center">
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a class="btn btn-setab2" href="<?= base_url("portal_revision/observaciones_docs_contratacion") . "?data=" . $r["id_tramite_contratacion"] ?>" title="Revisar documentación"><i class='bx bx-glasses-alt'></i></a>
                                            <button class="btn btn-setab1" title="Finalizar" onclick="finalizarTramite(<?= $r['id_tramite_contratacion'] ?>)"><i class='bx bx-task'></i></button>
                                            <a class="btn btn-info" href="<?= base_url("portal_revision/descarga_docs_contratacion") . "?data=" . $r["id_tramite_contratacion"] ?>" title="Descargar documentos"><i class='bx bx-cloud-download'></i></a>
                                        </div>
                                    </td>
                                    <td><?= $r["nombre_usuario"] ?></td>
                                    <td><?= $r["nombre_nivel"] ?></td>
                                    <td><?= $r["nombre_tramite"] ?></td>
                                    <td><span class="badge bg-label-info me-1">Por validar</span></td>
                                    <td><?= $r["creacion"] ?></td>  
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
        /*dataTable = new simpleDatatables.DataTable(document.querySelector("#table"), {
            searchable: true,
            fixedHeight: true,
            classes: {
                active: "active",
                disabled: "disabled",
                selector: "form-select",
                paginationList: "pagination",
                paginationListItem: "page-item",
                paginationListItemLink: "page-link",
                input: "form-control",
            }
        });*/
    }


    function finalizarTramite(id) {
        Swal.fire({
            title: '¿Desea finalizar este trámite?',
            text: "Una vez finalizado, no lo podrá modificar nuevamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B38E5D',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, finalizarlo',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                var xhttp = new XMLHttpRequest();
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
                            document.querySelector(`#tr_${id}`).remove();
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
                xhttp.open("POST", "<?= base_url("portal_revision/updateTramiteStatus") ?>");
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.send("id=" + id + "&status=4");
            },
            allowOutsideClick: () => !Swal.isLoading()
        });

    }
</script>