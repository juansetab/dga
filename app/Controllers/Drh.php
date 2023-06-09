<?php

namespace App\Controllers;

class Drh extends BaseController
{
    public function index()
    {
        return view("template/header_info").view("dev/index").view("template/footer_info");
    }

    public function requisitos_contratacion_estatal(){
        return view("template/header_info").view("drh/requisitos_contratacion_estatal").view("template/footer_info");
    }

    public function requisitos_contratacion_federal(){

    }

}
