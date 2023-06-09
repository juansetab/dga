<?php

namespace App\Controllers;

class Inicio extends BaseController
{
    public function index()
    {
        return view("template/header_info").view("inicio/index").view("template/footer_info");
    }
}
