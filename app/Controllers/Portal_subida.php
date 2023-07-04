<?php

namespace App\Controllers;

use App\Models\C_nivelesModel;
use App\Models\C_tipos_contratacionModel;
use App\Libraries\SimpleXLSX;
use App\Models\C_areas_dgaModel;
use App\Models\Pvt_niveles_usersModel;
use App\Models\Pvt_user_areaModel;
use App\Models\Tramites_contratacionModel;
use App\Models\Uac_usersModel;

class Portal_subida extends BaseController
{
    public function layout_contratacion()
    {
        $C_nivelesModel = new C_nivelesModel();
        $C_tipos_contratacionModel = new C_tipos_contratacionModel();
        $C_areas_dgaModel = new C_areas_dgaModel();
        $Pvt_user_areaModel = new Pvt_user_areaModel();
        $Pvt_niveles_usersModel = new Pvt_niveles_usersModel();
        $validation = \App\Libraries\UserControl::page_permission("Portal_subida", "layout_contratacion");
        if (session()->get("user_data")["isSuperAdmin"]) {
            //Nada
        } else {
            if (session()->get("user_data")["isSuperAdmin"] == true) {
                //Nada
            } else {
                $user_area = $Pvt_user_areaModel->where("id_user", session()->get("user_data")["id"])->findAll();
                $user_nivel = $Pvt_niveles_usersModel->where("id_user", session()->get("user_data")["id"])->findAll();;
                $niveles = $C_nivelesModel->whereIn("id", array_column($user_nivel, "id_nivel"));
                $areas = $C_areas_dgaModel->whereIn("id", array_column($user_area, "id_area"));
            }
        }
        $niveles = $C_nivelesModel->where("status", 1)->findAll();
        $tipos_contratacion = $C_tipos_contratacionModel->where("status", 1)->findAll();
        $areas = $C_areas_dgaModel->where("status", 1)->findAll();
        $data = ["niveles" => $niveles, "tipo_contratacion" => $tipos_contratacion, "areas" => $areas];
        return view("template/header_sneat") . view("portal_subida/layout_contratacion", $data) . view("template/footer_sneat");
    }


    public function subir_layout_contratacion()
    {
        $validation = \App\Libraries\UserControl::page_permission("Herramientas", "buscar_v_excel");
        if (!isset($_FILES["layout_xlsx"]["tmp_name"], $_POST["nivel"], $_POST["tipo_contratacion"])) {
            return view("errors/html/error_403");
        } else {
            $extension_archivo = pathinfo($_FILES["layout_xlsx"]["name"], PATHINFO_EXTENSION);
            if ($extension_archivo != "xlsx") {
                return $this->response->setJSON(array("status" => 0, "msg" => "El archivo no es de formato excel, usted subio un formato " . $extension_archivo));
            }
        }
        $xlsx = new SimpleXLSX();
        $rows = (array)$xlsx::parse($_FILES["layout_xlsx"]["tmp_name"])->rows(0);
        //if (isset($_POST['cabeceras'])) //Eliminará el primer registro que tiene el nombre de cabecera, solo si se indica
        //add empty comprobation
        unset($rows[0]);
        $CURP_USARIOS = [];
        $pattern = "/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/";
        foreach ($rows as $r) {
            $string = strtoupper($r[0]);
            $validate = preg_match($pattern, $string);
            if (!$validate)
                return $this->response->setJSON(array("status" => 0, "msg" => "CURP '" . $r[0] . "' no es válida"));
            else
                array_push($CURP_USARIOS, $r[0]);
        }
        $finded = [];
        $uac_userModel = new Uac_usersModel();
        foreach ($CURP_USARIOS as $r) {
            $user = $uac_userModel->where("username", $r)->findAll();
            if (empty($user)) {
                $data_insert = ["username" => $r, "psswrd" => \App\Libraries\Utilidades::create_password_hash($r), "name" => $r, "first_lastname" => $r, "second_lastname" => $r, "status" => 1];
                $id_user = $uac_userModel->insert($data_insert);
                array_push($finded, array("usuario" => $r, "status" => "Usuario no encontrado", "msg" => "Nuevo usuario creado y trámite creado"));
            } else {
                $id_user = $user[0]["id"];
                array_push($finded, array("usuario" => $r, "status" => "Usuario hallado en base de datos", "msg" => "Ningún cambio en el usuario y trámite creado"));
            }
            $tramites_contratacion = new Tramites_contratacionModel();
            $data_insert = ["id_nivel" => intval($_POST["nivel"]), "id_area_dga" => 0, "id_tipo_tramite" => intval($_POST["tipo_contratacion"]), "id_usuario" => $id_user, "status" => 0];
            $tramites_contratacion->insert($data_insert);
        }
        $data = ["finded" => $finded];
        return view("template/header_sneat") . view("portal_subida/subir_layout_contratacion", $data) . view("template/footer_sneat");
    }



    /**
     * CRUD
     */
}
