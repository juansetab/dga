<?php

namespace App\Controllers;

use App\Models\C_nivelesModel;
use App\Models\Docs_subidos_contratacionModel;
use App\Models\Pvt_niveles_usersModel;
use App\Models\Pvt_user_areaModel;
use App\Models\Tramites_contratacionModel;
use App\Models\V_tramites_contratacionModel;
use ZipArchive;

class Portal_revision extends BaseController
{

    /**
     * VIEWS
     */

    public function revisa_docs_contratacion()
    {
        $validation = \App\Libraries\UserControl::page_permission("Portal_revision", "revisa_docs_contratacion");
        $V_tramites_contratacionModel = new V_tramites_contratacionModel();
        $Pvt_user_areaModel = new Pvt_user_areaModel();
        $Pvt_niveles_usersModel = new Pvt_niveles_usersModel();
        if(session()->get("user_data")["isSuperAdmin"] == true){
            //Nada
        }else{
            $user_area = $Pvt_user_areaModel->where("id_user", session()->get("user_data")["id"])->findAll();
            $user_nivel = $Pvt_niveles_usersModel->where("id_user", session()->get("user_data")["id"])->findAll();
            $V_tramites_contratacionModel->whereIn("id_nivel", array_column($user_nivel, "id_nivel"));
            $V_tramites_contratacionModel->whereIn("id_area", array_column($user_area, "id_area"));

        }
        $tramites = $V_tramites_contratacionModel->where("(status >= 1 && status <= 3)")->findAll();
        $data = ["tramites" => $tramites];
        return view("template/header_sneat") . view("portal_revision/revisa_docs_contratacion", $data) . view("template/footer_sneat");
    }

    public function observaciones_docs_contratacion()
    {
        $validation = \App\Libraries\UserControl::page_permission("Portal_revision", "observaciones_docs_contratacion");
        if (!isset($_GET["data"]))  
            return view("errors/html/error_403");
        $V_tramitesModel = new V_tramites_contratacionModel();
        $Docs_subidosModel = new Docs_subidos_contratacionModel();    
        $tramite = $V_tramitesModel->where("id_tramite_contratacion", intval($_GET["data"]))->findAll();
        $docs_subidos = $Docs_subidosModel->where("id_tramite_contratacion", intval($_GET["data"]))->findAll();
        $data = ["tramite" => $tramite[0], "docs_subidos" => $docs_subidos];
        return view("template/header_sneat") . view("portal_revision/observaciones_docs_contratacion", $data) . view("template/footer_sneat");
    }

    /**
     * CRUD
     */

    public function descarga_docs_contratacion()
    {
        $validation = \App\Libraries\UserControl::crud_permission("Portal_revision", "revisa_docs_contratacion", "read");
        if (!isset($_GET["data"]))
            return view("errors/html/error_403");
        $V_tramitesModel = new V_tramites_contratacionModel();
        $Docs_subidosModel = new Docs_subidos_contratacionModel();
        $tramite = $V_tramitesModel->where("id_tramite_contratacion", intval($_GET["data"]))->findAll()[0];
        if (empty($tramite))
            return view("errors/html/error_403");
        $docs_subidos = $Docs_subidosModel->where("id_tramite_contratacion", intval($_GET["data"]))->findAll();
        if(empty($docs_subidos))    
            return json_encode(array("status" => 0, "msg" => "El trabajor no ha subido ningún documento"));
        $folder_temp = getcwd() . "/public/temp/" . $tramite["nombre_usuario"] . "_" . date("Y-m-d h_i_s") . "/";
        if (!mkdir($folder_temp, 0777, true))
            return json_encode(array("status" => 0, "msg" => "Error al generar directorio. Contacta al administrador"));
        foreach ($docs_subidos as $r) {
            if (!copy(getcwd() . $r["ruta"], $folder_temp . $r["nombre"]))
                return json_encode(array("status" => 0, "msg" => "Error al copiar un documento al archivo ZIP. Contacte al administrador"));
        }
        $zip = new ZipArchive;
        if ($zip->open($folder_temp.$tramite["nombre_usuario"].".zip", ZipArchive::CREATE) === true) {
            $dir = opendir($folder_temp);
            while ($file = readdir($dir)) {
                if (is_file($folder_temp . $file)) {
                    $zip->addFile($folder_temp . $file, $file);
                }
            }
            $zip->close();
        } else {
            return json_encode(array("status" => 0, "msg" => "Error al crear archivo al ZIP. Contacte al administrador"));
        }
        $this->response->setHeader('Content-type', 'application/zip')->setHeader('Content-Disposition', 'attachment; filename="'.$tramite["nombre_usuario"].'.zip"');
        readfile($folder_temp.$tramite["nombre_usuario"].".zip"); // auto download
    }

    public function updateDocs_subidosAction()
    {
        $validation = \App\Libraries\UserControl::crud_permission("Portal_revision", "observaciones_docs_contratacion", "create");
        if (!isset($_POST["json"], $_POST["observaciones"]))
            return view("errors/html/error_403");
        $array = json_decode($_POST["json"], true);
        $Docs_subidosModel = new Docs_subidos_contratacionModel();
        $TramitesModel = new Tramites_contratacionModel();
        $validado = true;
        foreach ($array as $r) {
            $data = ["observaciones" => $r["observaciones"], "status" => $r["status"]];
            $Docs_subidosModel->update(intval($r["id"]), $data);
            if ($r["status"] == 0 || $r["status"] == 0)
                $validado = false;
        }
        $data = ["status" => ($validado == true ? 2 : 3), "observaciones" => $_POST["observaciones"]]; //Si paso todas las validaciones, 2 sino 3
        $TramitesModel->update(intval($_POST["id"]), $data);
        return json_encode(array("status" => 1, "msg" => "Información actualizada"));
    }

    public function updateTramiteStatus()
    {
        $validation = \App\Libraries\UserControl::crud_permission("Portal_revision", "revisa_tramites_estatal", "update");
        if (!isset($_POST["id"], $_POST["status"]))
            return json_encode(array("status" => 0, "msg" => "Faltan parámetros"));
        $TramitesModel = new Tramites_contratacionModel();
        $data = ["status" => intval($_POST["status"])];
        $TramitesModel->update(intval($_POST["id"]), $data);
        return json_encode(array("status" => 1, "msg" => "Información actualizada"));
    }
}
