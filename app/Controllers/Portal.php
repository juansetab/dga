<?php

namespace App\Controllers;

use App\Libraries\DocumentosFormularios;
use App\Models\Docs_subidosModel;
use App\Models\TramitesModel;
use App\Models\V_docs_tipo_tramiteModel;
use App\Models\V_tramitesModel;

class Portal extends BaseController
{

    /**
     * VISTAS
     */
    public function index()
    {
        session()->destroy();
        return view("template/header_info") . view("portal/index") . view("template/footer_info");
    }

    public function inicio()
    {
        return view("template/header_sneat") . view("portal/inicio") . view("template/footer_sneat");
    }

    public function tramites_documentacion_estatal()
    {
        $V_tramitesModel = new V_tramitesModel();
        $id_usuario = 0;
        $tramites = $V_tramitesModel->where("id_usuario", $id_usuario)->findAll();
        $data = ["tramites" => $tramites];
        return view("template/header_sneat") . view("portal/tramites_documentacion_estatal", $data) . view("template/footer_sneat");
    }

    public function subir_documentacion_estatal()
    {
        if (!isset($_GET["data"]))
            return json_encode(array("status" => 0, "msg" => "Falta información"));
        $id_usuario = 0;
        $TramitesModel = new TramitesModel();
        $V_docs_tipo_tramiteModel = new V_docs_tipo_tramiteModel();
        $tramite = $TramitesModel->where("id", intval($_GET["data"]))->where("id_usuario", $id_usuario)->findAll();
        if (empty($tramite))
            return json_encode(array("status" => 0, "msg" => "No tiene permiso de acceder"));
        $documentacion = $V_docs_tipo_tramiteModel->where("id_tipo_tramite", $tramite[0]["id_tipo_tramite"])->findAll();
        $data = ["tramite" => $tramite[0], "documentacion" => $documentacion];
        return view("template/header_sneat") . view("portal/subir_documentacion_estatal", $data) . view("template/footer_sneat");
    }

    public function guardar_documentacion_estatal()
    {
        if (!isset($_POST["id"]))
            return json_encode(array("status" => 0, "msg" => "Falta información"));
        $TramitesModel = new TramitesModel();
        $Docs_subidosModel = new Docs_subidosModel();
        $id_usuario = 0;
        $tramite = $TramitesModel->where("id", intval($_POST["id"]))->where("id_usuario", $id_usuario)->findAll();
        if (empty($tramite))
            return json_encode(array("status" => 0, "msg" => "No tiene permiso de acceder"));
        $docs_existen = $Docs_subidosModel->where("id_tramite", intval($_POST["id"]))->findAll();
        if (!empty($docs_existen))
            return json_encode(array("status" => 0, "msg" => "Ya se han subido documentos a este trámite. Si cree que es un error, contacte al administrador"));
        $V_docs_tipo_tramiteModel = new V_docs_tipo_tramiteModel();
        $documentacion = $V_docs_tipo_tramiteModel->where("id_tipo_tramite", $tramite[0]["id_tipo_tramite"])->findAll();
        foreach ($documentacion as $r) {
            if (!isset($_FILES[$r["name"]]))
                return json_encode(array("status" => 0, "msg" => "Falta documentación" . $r["name"]));
        }
        $directory = \App\Libraries\Utilidades::random_string(12);
        $folder_upload = getcwd() . "/public/files/incidencias_estatal/" . $directory . "/";
        if (!mkdir($folder_upload, 0700))
            return json_encode(array("status" => 0, "msg" => "Error al guardar en carpeta. Contacta al administrador"));
        foreach ($documentacion as $r) {
            $data = [
                'id_tramite' => intval($_POST["id"]),
                'nombre' => $r["name"],
                'ruta' => $folder_upload . $_FILES[$r["name"]]["name"],
                'status' => 0
            ];
            $Docs_subidosModel->insert($data);
            rename($_FILES[$r["name"]]["tmp_name"], $folder_upload . $_FILES[$r["name"]]["name"]);
        }
        $data = ["status" => 1];
        $TramitesModel->update(intval($_POST["id"]), $data);
        return view("template/header_sneat") . view("portal/guardar_documentacion_estatal", $data) . view("template/footer_sneat");
    }

    public function revisa_tramites_estatal()
    {
        $V_tramitesModel = new V_tramitesModel();
        $tramites = $V_tramitesModel->where("status", 1)->findAll();
        $data = ["tramites" => $tramites];
        return view("template/header_sneat") . view("portal/revisa_tramites_estatal", $data) . view("template/footer_sneat");
    }

    public function solicitud_empleo_estatal()
    {
        return view("template/header_sneat") . view("formularios/solicitud") . view("template/footer_sneat");
    }

    public function genera_solicitud_empleo_estatal()
    {
        if (!isset($_POST["doc_curp"]))
            return $this->response->setJSON(array("status" => 0, "msg" => "Faltan parámetros"));

        $validados = $this->valida_datos();
        if ($validados["status"] == 0)
            return $this->response->setJSON(array("status" => 0, "msg" => $validados["msg"]));


        $this->response->setHeader("Content-Type", "application/pdf");
        $documentos = new DocumentosFormularios();
        $sub_anio_curp = substr($_POST["doc_curp"], 4, 2);
        $sub_milenio_curp = intval($sub_anio_curp) >= 0 && intval($sub_anio_curp) <= 45 ? "20" : "19";
        $curp = array(
            "fecha_nacimiento" => "$sub_milenio_curp$sub_anio_curp-" . substr($_POST["doc_curp"], 6, 2) . "-" . substr($_POST["doc_curp"], 8, 2),
            "dia_nacimiento" => substr($_POST["doc_curp"], 8, 2),
            "mes_nacimiento" => substr($_POST["doc_curp"], 6, 2),
            "anio_nacimiento" => $sub_milenio_curp . $sub_anio_curp,
            "sexo" => substr($_POST["doc_curp"], 10, 1)
        );
        $documentos->solicitud_empleo($curp);
    }



    /**
     * CRUD
     */

    /**
     * OTRAS FUNCIONES
     */

    private function valida_datos()
    {
        if (strlen($_POST["doc_curp"]) !== 18)
            return array("status" => 0, "msg" => "CURP no válida, revise");
        $string = mb_strtoupper($_POST["doc_curp"], "UTF-8");
        $pattern = "/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/";
        $validate = preg_match($pattern, $string, $match);
        if ($validate === false) {
            return array("status" => 0, "msg" => "CURP no válida, revise");
        }
        return array("status" => 1, "msg" => "Ok");
    }
}
