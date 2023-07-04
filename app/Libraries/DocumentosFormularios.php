<?php

namespace App\Libraries;

use App\Libraries\PDF;
use TCPDF;
use Config\App;

class DocumentosFormularios
{

    public function solicitud_empleo($curp)
    {
        $pdf = new FPDF("P", "mm", "LETTER", true, '', false);
        $pdf->SetTitle('Solicitud de empleo');
        $pdf->AddPage();
        /**
         * DATOS INICIALES
         */
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 5, "SOLICITUD DE EMPLEO", 1, 1, "C", true);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(100, 4, "Puesto solicitado", "TLR", 0, "C", true);
        $pdf->cell(45, 4, "Fecha", "TLR", 1, "C", true);
        $pdf->cell(100, 5, $_POST["inicial_puesto_solicitado"], "LRB", 0, "C", false);
        $fecha = explode("-", $_POST["inicial_fecha"]);
        $pdf->cell(15, 5, $fecha[2], "LRB", 0, "C", false);
        $pdf->cell(15, 5, $fecha[1], "LRB", 0, "C", false);
        $pdf->cell(15, 5, $fecha[0], "LRB", 1, "C", false);
        $pdf->MultiCell(100, 4.5, $this->UFT8("\n\nLa información aquí proporcionada será tratada confidencialmente\n "), 1, "C", false, 1);
        $pdf->SetXY(110, 24);
        $pdf->cell(45, 4, "Sueldo Mensual Deseado", "TLR", 1, "C", true);
        $pdf->SetXY(110, 28);
        $pdf->cell(45, 14, $this->money($_POST["inicial_monto"]), "BLR", 1, "C", false);
        $pdf->SetXY(172, 25);
        $pdf->SetFont('Arial', '', 6);
        $pdf->MultiCell(20, 2.5, $this->UFT8("FOTOGRAFIA TAMAÑO INFANTIL"), 0, "C", false);
        /**
         * DATOS PERSONALES
         */
        $pdf->SetXY(10, 45);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, "DATOS PERSONALES", 1, 1, "C", true);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->cell(45, 4, "Apellido Paterno", "TL", 0, "L", true);
        $pdf->cell(45, 4, "Apellido Materno", "T", 0, "L", true);
        $pdf->cell(55, 4, "Nombre (s)", "TR", 0, "L", true);
        $pdf->cell(25.5, 4, "Edad", "TLR", 0, "C", true);
        $pdf->cell(25.5, 4, "Sexo", "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(45, 5, $this->UFT8($_POST["personal_primer_ap"]), "BL", 0, "L", false);
        $pdf->cell(45, 5, $this->UFT8($_POST["personal_segundo_ap"]), "B", 0, "L", false);
        $pdf->cell(55, 5, $this->UFT8($_POST["personal_nombre"]), "BR", 0, "L", false);
        $edad = \App\Libraries\Utilidades::calcula_edad($curp["fecha_nacimiento"], $_POST["inicial_fecha"]);
        $pdf->cell(25.5, 5, $this->UFT8($edad . " AÑOS"), "BLR", 0, "C", false);
        $pdf->cell(13, 5, $this->UFT8("M"), "B", 0, "L", false);
        $pdf->cell(12.5, 5, $this->UFT8("F"), "BR", 1, "L", false);
        $pdf->SetXY(186, 54);
        $pdf->cell(3, 3, $this->UFT8($curp["sexo"] == "H" ? "x" : ""), "TBLR", 1, "C", false);
        $pdf->SetXY(199, 54);
        $pdf->cell(3, 3, $this->UFT8($curp["sexo"] == "M" ? "x" : ""), "TBLR", 1, "C", false);
        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(50, 4, $this->UFT8("Domicilio (calle y número)"), "TL", 0, "L", true);
        $pdf->cell(50, 4, "Colonia", "TR", 0, "L", true);
        $pdf->cell(45, 4, $this->UFT8("Teléfono"), "TLR", 0, "C", true);
        $pdf->cell(51, 4, $this->UFT8("Teléfono (celular)"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $numero_dom = $_POST["personal_numero"] == "0" || $_POST["personal_numero"] == "" ? "" : (is_numeric(substr($_POST["personal_numero"], 0, 1)) ? " #" . $_POST["personal_numero"] : " " . $_POST["personal_numero"]);
        $pdf->cell(50, 4, $this->UFT8($_POST["personal_domicilio"].$numero_dom), "TL", 0, "L", false);
        $pdf->cell(50, 4, $this->UFT8($_POST["personal_colonia"]), "TR", 0, "L", false);
        $pdf->cell(45, 4, $this->UFT8($_POST["personal_telefono"]), "TLR", 0, "C", false);
        $pdf->cell(51, 4, $this->UFT8($_POST["personal_celular"]), "TR", 1, "C", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(30, 4, $this->UFT8("Municipio"), "TL", 0, "L", true);
        $pdf->cell(20, 4, $this->UFT8("Código Postal"), "TR", 0, "L", true);
        $pdf->cell(50, 4, "Lugar de nacimiento", "TLR", 0, "C", true);
        $pdf->cell(45, 4, $this->UFT8("Nacionalidad"), "TLR", 0, "C", true);
        $pdf->cell(51, 4, $this->UFT8("Correo electrónico"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->Cell(30, 8, $this->UFT8($_POST["personal_municipio"]), "BL", 0, "L", false);
        $pdf->Cell(20, 8, $this->UFT8($_POST["personal_cp"]), "BR", 0, "C", false);
        $pdf->setXY(60, 70);
        $pdf->MultiCell(50, (strlen($_POST["personal_lugar_nac"]) > 30 ? 4 : 8), $this->UFT8($_POST["personal_lugar_nac"]), "LR",    "C", false);
        $pdf->setXY(110, 70);
        $pdf->Cell(45, 8, "MEXICANA", "BLR", 0, "C", false);
        $pdf->SetXY(155, 70);
        $pdf->Cell(51, 8, "", "BLR", 1, "C", false);
        $pdf->SetXY(155, 70);
        $pdf->MultiCell(51, (strlen($_POST["personal_email"]) > 25 ? 4 : 8), $this->UFT8($_POST["personal_email"]), 0, "C", false);
        $pdf->SetXY(10, 78);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(100, 4, $this->UFT8("Vive con"), "TL", 0, "L", true);
        $pdf->cell(45, 4, $this->UFT8("Fecha de Nacimiento"), "TLR", 0, "C", true);
        $pdf->cell(25.5, 4, $this->UFT8("Estatura"), "TLR", 0, "C", true);
        $pdf->cell(25.5, 4, $this->UFT8("Peso"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(25, 5, $this->UFT8("Padres"), "BL", 0, "L", false);
        $pdf->cell(25, 5, $this->UFT8("Familia"), "B", 0, "L", false);
        $pdf->cell(25, 5, $this->UFT8("Parientes"), "B", 0, "L", false);
        $pdf->cell(25, 5, $this->UFT8("Solo"), "B", 0, "L", false);
        $pdf->SetXY(20, 83);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_vivecon_padres"]) ? "x" : ""), "TBLR", 0, "L", false);
        $pdf->SetXY(46, 83);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_vivecon_familia"]) ? "x" : ""), "TBLR", 0, "C", false);
        $pdf->SetXY(73, 83);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_vivecon_parientes"]) ? "x" : ""), "TBLR", 0, "C", false);
        $pdf->SetXY(94, 83);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_vivecon_nadie"]) ? "x" : ""), "TBLR", 0, "C", false);
        $pdf->SetXY(110, 82);
        $pdf->cell(15, 5, $curp["dia_nacimiento"], "BLR", 0, "C", false);
        $pdf->cell(15, 5, $curp["mes_nacimiento"], "BLR", 0, "C", false);
        $pdf->cell(15, 5, $curp["anio_nacimiento"], "BLR", 0, "C", false);
        $pdf->cell(25.5, 5, $_POST["personal_estatura"] . " MTRS", "BR", 0, "C", false);
        $pdf->cell(25.5, 5, $_POST["personal_peso"] . " KG", "BR", 1, "C", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(100, 4, $this->UFT8("Personas que dependen de usted"), "TL", 0, "L", true);
        $pdf->cell(96, 4, $this->UFT8("Estado Civil"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(25, 5, $this->UFT8("Hijos"), "BL", 0, "L", false);
        $pdf->cell(25, 5, $this->UFT8("Padres"), "B", 0, "L", false);
        $pdf->cell(25, 5, $this->UFT8("Conyuge"), "B", 0, "L", false);
        $pdf->cell(25, 5, $this->UFT8("Otros"), "B", 0, "L", false);
        $pdf->SetXY(18, 92);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_dependen_hijos"]) ? "x" : ""), "TBLR", 0, "L", false);
        $pdf->SetXY(46, 92);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_dependen_conyugue"]) ? "x" : ""), "TBLR", 0, "C", false);
        $pdf->SetXY(73, 92);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_dependen_padres"]) ? "x" : ""), "TBLR", 0, "C", false);
        $pdf->SetXY(94, 92);
        $pdf->cell(3, 3, $this->UFT8(isset($_POST["personal_dependen_otros"]) ? "x" : ""), "TBLR", 0, "C", false);
        $pdf->SetXY(110, 91);
        $pdf->cell(96, 5, $this->UFT8("Soltero".str_repeat(" ", 43)."Casado"), "BLR", 0, "L", false);
        $pdf->SetXY(120, 92);
        $pdf->cell(3, 3, ($_POST["personal_edo_civil"] == "SOLTERO(A)" ? "x" : ""), "TBLR", 0, "C", false);
        $pdf->SetXY(156, 92);
        $pdf->cell(3, 3, ($_POST["personal_edo_civil"] == "CASADO(A)" ? "x" : ""), "TBLR", 0, "C", false);
        /**
         * DATOS LABORALES
         */
        $pdf->SetXY(10, 99);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, $this->UFT8("DOCUMENTACIÓN"), 1, 1, "C", true);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(100, 4, $this->UFT8("Registro Federal de Contribuyentes"), "TL", 0, "C", true);
        $pdf->cell(96, 4, $this->UFT8("Clave Única de Registro de Población"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(100, 4, $this->UFT8($_POST["doc_rfc"]), "BL", 0, "C", false);
        $pdf->cell(96, 4, $this->UFT8($_POST["doc_curp"]), "BLR", 1, "C", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(50, 4, $this->UFT8("Número de Seguridad Social"), "TL", 0, "C", true);
        $pdf->cell(50, 4, $this->UFT8("AFORE"), "TLR", 0, "C", true);
        $pdf->cell(48, 4, $this->UFT8("Número de Pasaporte"), "TL", 0, "C", true);
        $pdf->cell(48, 4, $this->UFT8("Número de Cartilla Militar"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(50, 4, $this->UFT8(""), "BL", 0, "L", false);
        $pdf->cell(50, 4, $this->UFT8(""), "BLR", 0, "C", false);
        $pdf->cell(48, 4, $this->UFT8(""), "BL", 0, "L", false);
        $pdf->cell(48, 4, $this->UFT8($_POST["doc_cartilla"]), "BLR", 1, "C", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(50, 4, $this->UFT8("Licencia de manejo"), "TL", 0, "C", true);
        $pdf->cell(50, 4, $this->UFT8("Tipo y Número de Licencia"), "TLR", 0, "C", true);
        $pdf->cell(96, 4, $this->UFT8("Si es extranjero cuenta que documento le permite laborar en el país"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(50, 4, $this->UFT8($_POST["doc_licencia"]), "BL", 0, "C", false);
        $pdf->cell(50, 4, $this->UFT8($_POST["doc_licencia"] == "SI" ? $_POST["doc_tipo_licencia"] : ""), "BLR", 0, "C", false);
        $pdf->cell(96, 4, $this->UFT8(""), "BLR", 0, "C", false);
        /**
         * DATOS LABORALES
         */
        $pdf->SetXY(10, 130);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, $this->UFT8("ESTADO DE SALUD Y HÁBITOS PERSONALES"), 1, 1, "C", true);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(65, 4, $this->UFT8("¿Como considera su estado de salud actual?"), "TL", 0, "L", true);
        $pdf->cell(66, 4, $this->UFT8("¿Padece una enfermedad crónica? ¿Cual?"), "TLR", 0, "L", true);
        $pdf->cell(65, 4, $this->UFT8("¿Pertenece a algún Club Social o Deportivo?"), "TLR", 1, "L", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(65, 4, $this->UFT8($_POST["salud_edo_salud"]), "BL", 0, "L", false);
        $pdf->cell(66, 4, $this->UFT8($_POST["salud_enfermedad"] == "SI" ? $_POST["salud_edo_enfermedad"] : "NO"), "BLR", 0, "L", false);
        $pdf->cell(65, 4, $this->UFT8($_POST["salud_club"]), "BLR", 1, "L", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(65, 4, $this->UFT8("¿Practica Usted algún Deporte?"), "TL", 0, "L", true);
        $pdf->cell(66, 4, $this->UFT8("¿Cuál es su pasatiempo favorito?"), "TLR", 0, "L", true);
        $pdf->cell(65, 4, $this->UFT8("¿Cuál es su meta en la vida?"), "TLR", 1, "L", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(65, 4, $this->UFT8($_POST["salud_deporte"]), "BL", 0, "L", false);
        $pdf->cell(66, 4, $this->UFT8($_POST["salud_pasatiempo"]), "BLR", 0, "L", false);
        $pdf->cell(65, 4, $this->UFT8($_POST["salud_meta"]), "BLR", 1, "L", false);
        /**
         * DATOS FAMILIARES
         */
        $pdf->SetXY(10, 153);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, $this->UFT8("DATOS FAMILIARES"), 1, 1, "C", true);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(66, 4, $this->UFT8("NOMBRE"), "TL", 0, "L", true);
        $pdf->cell(10, 4, $this->UFT8("VIVE"), "TLR", 0, "C", true);
        $pdf->cell(10, 4, $this->UFT8("FINADO"), "TLR", 0, "C", true);
        $pdf->cell(70, 4, $this->UFT8("DOMICILIO"), "TLR", 0, "C", true);
        $pdf->cell(40, 4, $this->UFT8("OCUPACIÓN"), "TLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(66, 8, "", "BL", 0, "L", false);
        $pdf->cell(10, 8, $this->UFT8(isset($_POST["vive_padre"]) ? "X" : ""), "BLR", 0, "C", false);
        $pdf->cell(10, 8, $this->UFT8(isset($_POST["vive_padre"]) ? "" : "X"), "BLR", 0, "C", false);
        $pdf->cell(70, 8, "", "BLR", 0, "L", false);
        $pdf->cell(40, 8, "", "BLR", 1, "L", false);
        $pdf->cell(66, 8, "", "BL", 0, "L", false);
        $pdf->cell(10, 8, $this->UFT8(isset($_POST["vive_madre"]) ? "X" : ""), "BLR", 0, "C", false);
        $pdf->cell(10, 8, $this->UFT8(isset($_POST["vive_madre"]) ? "" : "X"), "BLR", 0, "C", false);
        $pdf->cell(70, 8, "", "BLR", 0, "L", false);
        $pdf->cell(40, 8, "", "BLR", 1, "L", false);
        $pdf->cell(66, 8, "", "BL", 0, "L", false);
        $pdf->cell(10, 8, $this->UFT8(isset($_POST["vive_conyuge"]) ? "X" : ""), "BLR", 0, "C", false);
        $pdf->cell(10, 8, $this->UFT8(""), "BLR", 0, "C", false);
        $pdf->cell(70, 8, "", "BLR", 0, "L", false);    
        $pdf->cell(40, 8, "", "BLR", 1, "L", false);
        $pdf->SetXY(10, 161);
        $dependen = ["padre", "madre", "conyuge"];
        $y = 153;
        foreach ($dependen as $k => $r) {
            $vive = isset($_POST["vive_" . $r]) ? true : false;
            $pdf->setXY(10, $y + (($k + 1) * 8));
            $pdf->cell(40, 4, ucfirst($r), 0, 0, "L", false);
            $pdf->setXY(10, $y + (($k + 1) * 8) + 4);
            $pdf->Cell(66, 4, $this->UFT8($_POST["vive_" . $r . "_nombre"]), 0, 0, "L", false);
            $pdf->setXY(96, $y + (($k + 1) * 8));
            $pdf->MultiCell(66, (strlen($_POST["vive_" . $r . "_domicilio"]) > 45 ? 4 : 8), $this->UFT8($vive ? $_POST["vive_" . $r . "_domicilio"] : ""), 0, "L", false);
            $pdf->setXY(166, $y + (($k + 1) * 8));
            $pdf->MultiCell(40, (strlen($_POST["vive_" . $r . "_ocupacion"]) > 25 ? 4 : 8), $this->UFT8($vive ? $_POST["vive_" . $r . "_ocupacion"] : ""), 0, "L", false);
        }
        $pdf->cell(196, 8, "", "BTLR", 1, "L", false);
        $pdf->SetXY(10, 185);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(196, 4, "Nombre y edades de los hijos", "TRL", 1, "L", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(196, 4, $this->UFT8($_POST["vive_hijos_nombres"]), 0, 1, "L", false);
        /**
         * ESCOLARIDAD
         */
        $pdf->SetXY(10, 196);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, $this->UFT8("ESCOLARIDAD"), 1, 1, "C", true);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(66, 4, $this->UFT8("NOMBRE DE LA ESCUELA"), "TL", 0, "C", true);
        $pdf->cell(66, 4, $this->UFT8("DOMICILIO"), "TLR", 0, "C", true);
        $pdf->cell(10, 4, $this->UFT8("DE"), "TLR", 0, "C", true);
        $pdf->cell(10, 4, $this->UFT8("A"), "TLR", 0, "C", true);
        $pdf->cell(10, 4, $this->UFT8("AÑOS"), "TL", 0, "C", true);
        $pdf->cell(34, 4, $this->UFT8("RECIBIÓ"), "TLR", 1, "C", true);
        $niveles = ["primaria" => "primaria", "secundaria" => "secundaria", "preparatoria" => "prepa", "profesional" => "profesional", "comercial u Otras" => "otras"];
        $y = 196;
        $c = 1;
        foreach ($niveles as $k => $r) {
            $pdf->SetXY(10, $y + ($c * 8));
            $pdf->SetFont('Arial', '', 6.5);
            $pdf->cell(66, 4, $this->UFT8(ucfirst($k)), "TL", 0, "L", true);
            $pdf->cell(66, 4, $this->UFT8(""), "TLR", 0, "C", false);
            $pdf->cell(10, 4, $this->UFT8(""), "TLR", 0, "C", false);
            $pdf->cell(10, 4, $this->UFT8(""), "TLR", 0, "C", false);
            $pdf->cell(10, 4, $this->UFT8(""), "TL", 0, "L", false);
            $pdf->cell(34, 4, $this->UFT8(""), "TLR", 1, "C", false);
            $_POST["escolar_" . $r . "_nombre"] = str_replace("NO.", "No.", $_POST["escolar_" . $r . "_nombre"]);
            $pdf->cell(66, 4, $this->UFT8($_POST["escolar_" . $r . "_nombre"]), "BL ", 0, "L", false);
            $pdf->cell(66, 4, "", "BLR", 0, "C", false);
            $pdf->cell(10, 4, "", "BL", 0, "C", false);
            $pdf->cell(10, 4, "", "BLR", 0, "C", false);
            $pdf->cell(10, 4, "", "BL", 0, "C", false);
            $pdf->cell(34, 4, $this->UFT8(""), "BLR", 1, "C", false);
            $pdf->SetXY(76, $y + ($c * 8));
            $_POST["escolar_" . $r . "_direccion"] = str_replace("NO.", "No", $_POST["escolar_" . $r . "_direccion"]);
            $pdf->MultiCell(66, (strlen($_POST["escolar_" . $r . "_direccion"]) > 35 ? 4 : 8), $this->UFT8($_POST["escolar_" . $r . "_direccion"]), 0, "L", false);
            $pdf->SetXY(142, $y + ($c * 8));
            $pdf->MultiCell(10, 8, $this->UFT8($_POST["escolar_" . $r . "_de"]), 0, "C", false);
            $pdf->SetXY(152, $y + ($c * 8));
            $pdf->MultiCell(10, 8, $this->UFT8($_POST["escolar_" . $r . "_a"]), 0, "C", false);
            $pdf->SetXY(162, $y + ($c * 8));
            $anhos_estudio = is_numeric($_POST["escolar_" . $r . "_de"]) && is_numeric($_POST["escolar_" . $r . "_a"]) ? intval($_POST["escolar_" . $r . "_a"]) - intval($_POST["escolar_" . $r . "_de"]) : "";
            $pdf->MultiCell(10, 8, $this->UFT8($anhos_estudio), 0, "C", false);
            $pdf->SetXY(172, $y + ($c * 8));
            if ($r == "primaria" || $r == "secundaria"){
                $_POST["escolar_" . $r . "_titulo"] = "CERTIFICADO";
            }elseif($r == "prepa"){
                if($_POST["escolar_prepa_direccion"] == "" && $_POST["escolar_prepa_de"] == "" && $_POST["escolar_prepa_a"] == "")
                    $_POST["escolar_" . $r . "_titulo"] = "";
                else
                    $_POST["escolar_" . $r . "_titulo"] = "CERTIFICADO";
            }
            $pdf->MultiCell(34, (strlen($_POST["escolar_" . $r . "_titulo"]) > 21 ? 4 : 8), $this->UFT8($_POST["escolar_" . $r . "_titulo"]), 0, "C", false);
            $c++;
        }
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(196, 4, $this->UFT8("Estudios que está efectuando en la actualidad"), "RTL", 1, "L", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(60, 4, $this->UFT8($_POST["escolar_actual_nombre"]), "L", 0, "L", false);
        $pdf->cell(52, 4, $this->UFT8($_POST["escolar_actual_horario"]), 0, 0, "L", false);
        $pdf->cell(60, 4, $this->UFT8($_POST["escolar_actual_carrera"]), 0, 0, "L", false);
        $pdf->cell(24, 4, $this->UFT8($_POST["escolar_actual_grado"]), "R", 1, "L", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(60, 4, $this->UFT8("Escuela"), "BL", 0, "L", false);
        $pdf->cell(52, 4, $this->UFT8("Horario"), "B", 0, "L", false);
        $pdf->cell(60, 4, $this->UFT8("Curso o carrera"), "B", 0, "L", false);
        $pdf->cell(24, 4, $this->UFT8("Grado"), "BR", 1, "L", false);
        /**
         * PÁGINA 2
         */
        /**
         * CONOCIMIENTOS GENERALES
         */
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, $this->UFT8("CONOCIMIENTOS GENERALES"), 1, 1, "C", true);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->cell(98, 4, $this->UFT8("Idiomas que habla (aparte del nativo)"), "TRL", 0, "L", true);
        $pdf->cell(98, 4, $this->UFT8("Funciones de oficina que domina"), "TRL", 1, "L", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(98, 4, $this->UFT8($_POST["conocimientos_idiomas"]), "BRL", 0, "L", false);
        $pdf->cell(98, 4, $this->UFT8($_POST["conocimientos_funciones"]), "BRL", 1, "L", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(98, 4, $this->UFT8("Máquinas de oficina o taller que sepa manejar"), "TRL", 0, "L", true);
        $pdf->cell(98, 4, $this->UFT8("Software que domina"), "TRL", 1, "L", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(98, 4, $this->UFT8($_POST["conocimientos_maquinas"]), "BRL", 0, "L", false);
        $pdf->cell(98, 4, $this->UFT8($_POST["conocimientos_software"]), "BRL", 1, "L", false);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(196, 4, $this->UFT8("Otras funciones que domina"), "TRL", 1, "L", true);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(196, 4, $this->UFT8($_POST["conocimientos_otros"]), "BRL", 1, "L", false);
        /**
         * EMPLEO ACTUAL Y ANTERIORES
         */
        $pdf->SetXY(10, 41);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, $this->UFT8("EMPLEO ACTUAL Y ANTERIORES"), 1, 1, "C", true);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->cell(46, 5, $this->UFT8(""), "TRL", 0, "L", true);
        $pdf->cell(50, 5, $this->UFT8("EMPLEO ACTUAL O ÚLTIMO", "BTLR"), "TRL", 0, "C", true);
        $pdf->cell(50, 5, $this->UFT8("EMPLEO ACTUAL", "BTLR"), "TRL", 0, "C", true);
        $pdf->cell(50, 5, $this->UFT8("EMPLEO ACTUAL", "BTLR"), "TRL", 1, "C", true);
        //Descripcion_campo, compañía, borde, tamaño_vertical 
        $array = [
            ["Tiempo que prestó sus servicios", "DE 01/01/2020 A 31/12/2023", "BLR", 5],
            ["Nombre de la compañía", "nombre", "BTLR", 10],
            ["Domicilio", "domicilio", "BTLR", 10],
            ["Teléfono", "tel", "BTLR", 5],
            ["Puesto desempeñado", "puesto", "BTLR", 5],
            ["Motivo de separación", "motivo", "BTLR", 5],
            ["Nombre de jefe directo", "nombre_jefe", "BTLR", 5],
            ["Puesto de jefe directo", "puesto_jefe", "BTLR", 5],
            ["Podemos solicitar informes de usted", "sino", "BTLR", 10]
        ];
        $_POST["empleo_ultimo1_domicilio"] = str_replace("NO.", "No.", $_POST["empleo_ultimo1_domicilio"]);
        $_POST["empleo_ultimo2_domicilio"] = str_replace("NO.", "No.", $_POST["empleo_ultimo2_domicilio"]);
        $_POST["empleo_ultimo3_domicilio"] = str_replace("NO.", "No.", $_POST["empleo_ultimo3_domicilio"]);
        $y = 50;
        foreach ($array as $k => $r) {
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetXY(10, $y);
            $pdf->cell(46, $r[3], $this->UFT8($r[0]), $r[2], 0, "L", true);
            $pdf->SetFont('Arial', '', 6.5);
            for($i = 1; $i < 4; $i++){
                $x = 6 + ($i * 50);
                $pdf->setXY($x, $y);
                $pdf->cell(50, $r[3], "", "BTLR", ($i == 3 ? 1 : 0), "C", false);
                if($k > 0){
                    if($k == 8){
                        $_POST["empleo_ultimo".$i."_".$r[1]] = "SI          NO         ¿Por qué? \n".$_POST["empleo_ultimo".$i."_informes"];
                        $pdf->SetXY($x + 4, $y+1);
                        $pdf->cell(3, 3, $this->UFT8($_POST["empleo_ultimo".$i."_informes_sino"] == "SI" ? "x" : ""), "TBLR", 0, "L", false);
                        $pdf->SetXY($x + 14, $y+1);
                        $pdf->cell(3, 3, $this->UFT8($_POST["empleo_ultimo".$i."_informes_sino"] == "NO" ? "x" : ""), "TBLR", 0, "L", false);
                    }
                    $pdf->SetXY($x, $y);
                    $pdf->MultiCell(50, 5, $this->UFT8($_POST["empleo_ultimo".$i."_".$r[1]]), 0, "C", false);
                }else{
                    $fecha_ini = date("d/m/Y", strtotime($_POST["empleo_ultimo".$i."_inicio"]));
                    $fecha_fin = date("d/m/Y", strtotime($_POST["empleo_ultimo".$i."_final"]));
                    if($fecha_ini == "31/12/1969" || $fecha_ini = '01/01/1970' || $fecha_fin == "31/12/1969" || $fecha_fin == '01/01/1970')
                        $desc_fecha = "";
                    else
                        $desc_fecha = "DE " . $fecha_ini . " A " . $fecha_fin;
                    $pdf->SetXY($x, $y);
                    $pdf->cell(50, 5, $this->UFT8($desc_fecha), 1, 0, "C", false);
                }
            }
            $y += $r[3];
        }
        /**
         * REFERENCIAS PERSONALES
         */
        $pdf->SetXY(10, 113);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(196, 4, $this->UFT8("REFERENCIAS PERSONALES"), 1, 1, "C", true);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetFillColor(210, 210, 210);
        $pdf->cell(52, 4, $this->UFT8("NOMBRE"), "BTLR", 0, "C", true);
        $pdf->cell(16, 4, $this->UFT8("TELÉFONO"), "BTLR", 0, "C", true);
        $pdf->cell(61, 4, $this->UFT8("DOMICILIO"), "BTLR", 0, "C", true);
        $pdf->cell(35, 4, $this->UFT8("OCUPACIÓN"), "BTLR", 0, "C", true);
        $pdf->cell(32, 4, $this->UFT8("TIEMPO DE CONOCERLO"), "BTLR", 1, "C", true);
        $pdf->SetFont('Arial', '', 6.5);
        for ($i = 1; $i < 4; $i++) {
            $y = 121;
            $new_y = ($y + ($i * 8));
            $pdf->cell(52, 8, "", "BTLR", 0, "C", false);
            $pdf->cell(16, 8, $this->UFT8($_POST["referencias_ref".$i."_telefono"]), "BTLR", 0, "C", false);
            $pdf->cell(61, 8, "", "BTLR", 0, "C", false);
            $pdf->cell(35, 8, "", "BTLR", 0, "C", false);
            $pdf->cell(32, 8, $this->UFT8($_POST["referencias_ref".$i."_tiempo"]. " AÑOS"), "BTLR", 1, "C", false);
            $_POST["referencias_ref" . $i . "_domicilio"] = str_replace("NO.", "No.", $_POST["referencias_ref" . $i . "_domicilio"]);
            $pdf->SetXY(10, $new_y - 8);
            $pdf->MultiCell(52, (strlen($_POST["referencias_ref".$i."_nombre"]) >= 30 ? 4 : 8), $this->UFT8($_POST["referencias_ref".$i."_nombre"]), 0, "C", false);
            $pdf->SetXY(78, $new_y - 8);
            $pdf->MultiCell(61, (strlen($_POST["referencias_ref".$i."_domicilio"]) >= 35 ? 4 : 8), $this->UFT8($_POST["referencias_ref".$i."_domicilio"]), 0, "C", false);
            $pdf->SetXY(139, $new_y - 8);
            $pdf->MultiCell(35, (strlen($_POST["referencias_ref".$i."_ocupacion"]) >= 20 ? 4 : 8), $this->UFT8($_POST["referencias_ref".$i."_ocupacion"]), 1, "C", false);
            $pdf->SetXY(10, $new_y);
        }
        /**
         * DATOS GENERALES Y ECONÓMICOS
         */
        $pdf->SetXY(10, 148);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(95, 4, $this->UFT8("DATOS GENERALES"), 1, 0, "C", true);
        $pdf->cell(6, 4, "", "LR", 0, "C", false);
        $pdf->cell(95, 4, $this->UFT8("DATOS ECONÓMICOS"), 1, 1, "C", true);
        $array = [
            ["¿Como supo del empleo?", "¿Tiene usted otros ingresos?", "Importe mensual"],
            ["¿Tiene parientes trabajando en esta empresa?", "¿Su cónyuge trabaja? (En caso de tener)", "Percepción mensual"],
            ["¿Ha estado afiliado a algún sindicato?", "¿Vive en casa propia?", "Valor aproximado"],
            ["¿Tiene disponibilidad de horario?", "¿Paga renta?", "Importe"],
            ["¿Tiene problemas de traslado / transporte?", "¿Tiene automóvil propio?", ""],
            ["¿Tiene disposición de viajar?", "¿Tiene deudas?", "Importe"],
            ["¿Tiene disponibilidad de cambio de residencia?", "¿Cuánto abona mensualmente?", "Importe"],
            ["Fecha en la que podría presentarse a trabajar", "¿A cuánto ascienden sus gastos mensuales?", "Importe"]
        ];
        $pdf->SetFont('Arial', 'B', 7);
        foreach($array as $k => $r){
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->cell(95, 4, $this->UFT8($r[0]), "TLR", 0, "L", false);
            $pdf->cell(6, 4, "", "LR", 0, "C", false);
            $pdf->cell(60, 4, $this->UFT8($r[1]), "TL", 0, "L", false);
            $pdf->cell(35, 4, $this->UFT8($r[2]), "TR", 1, "L", false);
            $pdf->SetFont('Arial', '', 6.5);
            $pdf->cell(95, 5, ($k < 7 ? ($k == 0 ? "ANUNCIO              INTERNET              CONVOCATORIA" : "SI                      NO") : "INMEDIATAMENTE"), "BLR", 0, "L", false);
            $pdf->cell(6, 5, "", "LR", 0, "C", false);
            $pdf->cell(60, 5, ($k < 6 ? "SI                     NO" : ""), "BL", 0, "L", false);
            $pdf->cell(35, 5, "", "BR", 1, "C", false);
        }
        $array = [
            ["nombre1" => "general_supo_empleo", "nombre2" => "economico_ingresos_sino", "sino1" => false, "sino2" => true, "importe" => $this->money($_POST["economico_ingresos_monto"] == "" ? 0 : $_POST["economico_ingresos_monto"])],
            ["nombre1" => "general_parientes", "nombre2" => "economico_conyugue_sino", "sino1" => true, "sino2" => true, "importe" => $this->money($_POST["economico_conyugue_monto"] == "" ? 0 : $_POST["economico_conyugue_monto"])],
            ["nombre1" => "general_sindicato", "nombre2" => "economico_casa_sino", "sino1" => true, "sino2" => true, "importe" => $this->money($_POST["economico_casa_monto"] == "" ? 0 : $_POST["economico_casa_monto"])],
            ["nombre1" => "general_horario", "nombre2" => "economico_renta_sino", "sino1" => true, "sino2" => true, "importe" => $this->money($_POST["economico_renta_monto"] == "" ? 0 : $_POST["economico_renta_monto"])],
            ["nombre1" => "general_traslado", "nombre2" => "economico_coche_sino", "sino1" => true, "sino2" => true, "importe" => ""],
            ["nombre1" => "general_viajar", "nombre2" => "economico_deudas_sino", "sino1" => true, "sino2" => true, "importe" => $this->money($_POST["economico_deudas_monto"] == "" ? 0 : $_POST["economico_deudas_monto"])],
            ["nombre1" => "general_residencia", "nombre2" => "economico_deudas_abono", "sino1" => true, "sino2" => false, "importe" => $this->money($_POST["economico_deudas_abono"] == "" ? 0 : $_POST["economico_deudas_abono"])],
            ["nombre1" => "general_residencia", "nombre2" => "economico_deudas_abono", "sino1" => false, "sino2" => false, "importe" => $this->money($_POST["economico_gastos"] == "" ? 0 : $_POST["economico_gastos"])],
        ];
        $y = 148;
        foreach($array as $k => $r){
            $new_y  = $y + (($k + 1) * 9);
            $pdf->SetXY(($k == 0 ? 25 : 15), $new_y);
            if($r["sino1"]){
                $pdf->cell(3, 3, $this->UFT8($_POST[$r["nombre1"]] == "SI" ? "x" : ""), "TBLR", 0, "L", false);
                $pdf->setX($k == 0 ? 47 : 33);
                $pdf->cell(3, 3, $this->UFT8($_POST[$r["nombre1"]] == "NO" ? "x" : ""), "TBLR", 0, "L", false);
            }
            $pdf->SetXY(116, $new_y);
            if($r["sino2"]){    
                $pdf->cell(3, 3, $this->UFT8($_POST[$r["nombre2"]] == "SI" ? "x" : ""), "TBLR", 0, "L", false);
                $pdf->setX(133);
                $pdf->cell(3, 3, $this->UFT8($_POST[$r["nombre2"]] == "NO" ? "x" : ""), "TBLR", 0, "L", false);
            }
            $pdf->SetXY(172, $new_y);
            $pdf->cell(10, 4, $this->UFT8(($r["importe"] == "$ 0.00" ? "$" : $r["importe"])), 0, 0, "L", false);
        }
        $pdf->SetXY(23, $y + 9);
        $pdf->cell(3, 3, $this->UFT8($_POST["general_supo_empleo"] == "ANUNCIO" ? "x" : ""), "TBLR", 0, "L", false);
        $pdf->SetXY(43, $y + 9);
        $pdf->cell(3, 3, $this->UFT8($_POST["general_supo_empleo"] == "INTERNET" ? "x" : ""), "TBLR", 0, "L", false);
        $pdf->SetXY(71, $y + 9);
        $pdf->cell(3, 3, $this->UFT8($_POST["general_supo_empleo"] == "CONVOCATORIA" ? "x" : ""), "TBLR", 0, "L", false);
        /**
         * FIRMA Y AVISO DE PRIVACIDAD
         */
        $pdf->SetXY(10, 227);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(155, 155, 155);
        $pdf->cell(95, 4, $this->UFT8("Hago constar que mis respuestas son verdaderas"), 1, 0, "C", true);
        $pdf->Cell(6, 4, "", "LR", 0, 'C', false);
        $pdf->Cell(95, 4, \App\Libraries\Utilidades::uft8_iso("AVISO DE PRIVACIDAD"), 1, 1, 'C', true);

        $pdf->cell(95, 15, "", "TRL", 0, "C", false);
        $pdf->cell(6, 15, "", "RL", 0, "C", false);
        $pdf->cell(95, 15, "", "TRL", 1, "C", false);


        $pdf->SetFont('Arial', '', 6.5);
        $pdf->cell(95, 5, $this->UFT8($_POST["personal_nombre"] . " " . $_POST["personal_primer_ap"] . " " . $_POST["personal_segundo_ap"]), "BRL", 0, "C", false);
        $pdf->Cell(6, 5, "", "LR", 0, 'C', false);
        $pdf->cell(95, 12, "", "BRL", 1, "C", false);

        $pdf->setXY(10, 251);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(95, 7, "Nombre Completo y Firma del Candidato", "BRL", 1, "C", false);
        /**
         * AVISO DE PRIVACIDAD
         */
        $pdf->setXY(111, 232);
        $pdf->SetFont('Arial', '', 6.5);
        $pdf->MultiCell(95, 2, \App\Libraries\Utilidades::uft8_iso("La Secretaria de Educacion del Estado con domicilio en la calle Heroes del 47 S/N Colonia Gil y Saenz (antes El Aguila), Villahermosa, Tabasco Codigo Postal 86080, Telefono 993 427 01 61 Ext. 412, utilizara sus datos personales recabados con el proposito de identificacion, elaboracion de informes estadisticos, seguridad, informe sobre nuevos tramites, evaluar la calidad de los mismos y dar cumplimiento a obligaciones que el marco juridico le confiere a esta Dependencia."), 0, "J", false);
        $pdf->setXY(111, 247);
        $pdf->MultiCell(95, 2, \App\Libraries\Utilidades::uft8_iso("Para mayor informacion acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad integral a traves de:\n\nhttps://tabasco.gob.mx/sites/default/files/users/setabasco/AVISO%20DE%20PRIVACIDAD%20SIMPLIFICADO%20DIRECCION%20DE%20RECURSOS%20HUMANOS.pdf"), 0, "L", false);
        $pdf->Output("I");
    }

    public function UFT8($string)
    {
        return mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8');
    }

    public function money($monto){
        return "$ " . number_format($monto, 2, ".", ",");
    }
}
