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
        if(!isset(session()->get("user_data")["id"]))
            return view("errors/html/error_403");
        return view("template/header_sneat") . view("portal/inicio") . view("template/footer_sneat");
    }

}
