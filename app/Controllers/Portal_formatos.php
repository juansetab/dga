<?php

namespace App\Controllers;
use App\Libraries\DocumentosFormularios;


class Portal_formatos extends BaseController
{

    /**
     * VIEWS
     */
    public function solicitud_empleo_estatal()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        return view("template/header_sneat") . view("portal_formatos/solicitud_empleo") . view("template/footer_sneat");
    }

    public function ejemplo()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        return view("template/header_sneat") . view("portal_formatos/ejemplo") . view("template/footer_sneat");
    }

    public function genera_solicitud_empleo_estatal()
    {
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
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
