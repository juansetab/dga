<?php

namespace App\Controllers;

use App\Models\C_nivelesModel;
use App\Models\C_tipos_solicitud_pagosModel;
use App\Models\Docs_subidos_contratacionModel;
use App\Models\Tramites_contratacionModel;
use App\Models\Tramites_solicitud_pagosModel;
use App\Models\V_docs_tipo_contratacionModel;
use App\Models\V_docs_tipo_solicitud_pagosModel;
use App\Models\V_tramites_contratacionModel;
use App\Models\V_tramites_solicitud_pagoModel;

class Portal_tramites extends BaseController
{
    /**
     * VISTAS
     */

     //CONTRATACIONES


    public function contrataciones()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        $V_tramites_contratacionModel = new V_tramites_contratacionModel();
        $tramites = $V_tramites_contratacionModel->where("id_usuario", session()->get("user_data")["id"])->orderBy("id_tramite_contratacion", "DESC")->findAll(10);
        $data = ["tramites" => $tramites];
        return view("template/header_sneat") . view("portal_tramites/contrataciones", $data) . view("template/footer_sneat");
    }

    public function subir_documentacion_contratacion()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        if (!isset($_GET["data"]))
            return json_encode(array("status" => 0, "msg" => "Falta información"));
        $Tramites_contratacionModel = new Tramites_contratacionModel();
        $V_docs_tipo_contratacionModel = new V_docs_tipo_contratacionModel();
        $tramite = $Tramites_contratacionModel->where("id", intval($_GET["data"]))->where("id_usuario", session()->get("user_data")["id"])->findAll();
        if (empty($tramite))
            return view("errors/html/error_403");
        $documentacion = $V_docs_tipo_contratacionModel->where("id_tipo_tramite", $tramite[0]["id_tipo_tramite"])->findAll();
        $data = ["tramite" => $tramite[0], "documentacion" => $documentacion];
        return view("template/header_sneat") . view("portal_tramites/subir_documentacion_contratacion", $data) . view("template/footer_sneat");
    }

    public function guardar_documentacion_contratacion()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        if (!isset($_POST["id"]))
            return json_encode(array("status" => 0, "msg" => "Falta información"));
        $Tramites_contratacionModel = new Tramites_contratacionModel();
        $Docs_subidos_contratacionModel = new Docs_subidos_contratacionModel();
        $tramite = $Tramites_contratacionModel->where("id", intval($_POST["id"]))->where("id_usuario", session()->get("user_data")["id"])->findAll();
        if (empty($tramite))
            return json_encode(array("status" => 0, "msg" => "No tiene permiso de acceder"));
        $docs_existen = $Docs_subidos_contratacionModel->where("id_tramite_contratacion", intval($_POST["id"]))->findAll();
        if (!empty($docs_existen))
            return json_encode(array("status" => 0, "msg" => "Ya se han subido documentos a este trámite. Si cree que es un error, contacte al administrador"));
        $V_docs_tipo_contratacionModel = new V_docs_tipo_contratacionModel();
        $documentacion = $V_docs_tipo_contratacionModel->where("id_tipo_tramite", $tramite[0]["id_tipo_tramite"])->findAll();
        foreach ($documentacion as $r) {
            if (!isset($_FILES[$r["name"]]))
                return json_encode(array("status" => 0, "msg" => "Falta documentación" . $r["name"]));
        }
        $directory = \App\Libraries\Utilidades::random_string(12);
        $folder_upload = getcwd() . "/public/files/tramites_contratacion/" . $directory . "/";
        if (!mkdir($folder_upload, 0700))
            return json_encode(array("status" => 0, "msg" => "Error al guardar en carpeta. Contacta al administrador"));
        foreach ($documentacion as $r) {
            $data = [
                'id_tramite_contratacion' => intval($_POST["id"]),
                'nombre' => $_FILES[$r["name"]]["name"],
                'input' => $r["name"],
                'ruta' => "/public/files/tramites_contratacion/$directory/" . $_FILES[$r["name"]]["name"],
                'folder' => $directory,
                'status' => 0
            ];
            $Docs_subidos_contratacionModel->insert($data);
            rename($_FILES[$r["name"]]["tmp_name"], $folder_upload . $_FILES[$r["name"]]["name"]);
        }
        $data = ["status" => 1];
        $Tramites_contratacionModel->update(intval($_POST["id"]), $data);
        return view("template/header_sneat") . view("portal_tramites/guardar_documentacion_contratacion", $data) . view("template/footer_sneat");
    }

    public function detalle_documentacion_contratacion()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        if (!isset($_GET["data"]))
            return json_encode(array("status" => 0, "msg" => "Falta información"));
        $Tramites_contratacionModel = new Tramites_contratacionModel();
        $Docs_subidos_contratacionModel = new Docs_subidos_contratacionModel();
        $tramite = $Tramites_contratacionModel->where("id", intval($_GET["data"]))->where("id_usuario", session()->get("user_data")["id"])->findAll();
        if (empty($tramite))
            return view("errors/html/error_403");
        $documentacion = $Docs_subidos_contratacionModel->where("id_tramite_contratacion", $tramite[0]["id_tipo_tramite"])->findAll();
        $data = ["tramite" => $tramite[0], "documentacion" => $documentacion];
        return view("template/header_sneat") . view("portal_tramites/detalle_documentacion_contratacion", $data) . view("template/footer_sneat");
    }


    //SOLICITUDES DE PAGO

    public function solicitudes_pago()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        $V_tramites_solicitud_pagoModel = new V_tramites_solicitud_pagoModel();
        $tramites = $V_tramites_solicitud_pagoModel->where("id_usuario", session()->get("user_data")["id"])->orderBy("id_tramite_solicitud_pago", "DESC")->findAll(10);
        $data = ["tramites" => $tramites];
        return view("template/header_sneat") . view("portal_tramites/solicitudes_pago", $data) . view("template/footer_sneat");
    }

    public function subir_documentacion_solicitud_pago()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        if (!isset($_GET["data"]))
            return json_encode(array("status" => 0, "msg" => "Falta información"));
        $Tramites_solicitud_pagosModel = new Tramites_solicitud_pagosModel();
        $V_docs_tipo_solicitud_pagosModel = new V_docs_tipo_solicitud_pagosModel();
        $C_tipos_solicitud_pagosModel = new C_tipos_solicitud_pagosModel();
        $C_nivelesModel = new C_nivelesModel();
        $tramite = $Tramites_solicitud_pagosModel->where("id", intval($_GET["data"]))->where("id_usuario", session()->get("user_data")["id"])->findAll();
        if (empty($tramite))
            return view("errors/html/error_403");
        $documentacion = $V_docs_tipo_solicitud_pagosModel->where("id_tipo_tramite", $tramite[0]["id_tipo_tramite"])->findAll();
        $tipos_solicitud = $C_tipos_solicitud_pagosModel->where("status", 1)->orderBy("id", "ASC")->findAll();
        $niveles = $C_nivelesModel->where("status", 1)->where("pagador", 1)->notLike("nombre", "HONORARIO")->findAll();
        $data = ["tramite" => $tramite[0], "documentacion" => $documentacion, "tipos_solicitud" => $tipos_solicitud, "niveles" => $niveles];
        return view("template/header_sneat") . view("portal_tramites/subir_documentacion_solicitud_pago", $data) . view("template/footer_sneat");
    }
}
