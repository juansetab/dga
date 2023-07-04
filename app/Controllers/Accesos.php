<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Accesos extends Controller
{
    public function __construct()
    {
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('portal/index'));
    }

    public function start()
    {   
        if (!isset($_POST["user"], $_POST["pass"]))
            return redirect()->to(base_url('portal?status=0&description=Error al ingresar usuario y contraseña'));
        $response = \App\Libraries\UserControl::login_validation($_POST["user"], $_POST["pass"]);
        if ($response['status'] === true) {
            $url_request = explode("?", $_SERVER["HTTP_REFERER"])[0]; //Quita variables GET si existen
            $url_redirect = $url_request != base_url("portal") ?  $_SERVER["HTTP_REFERER"] : base_url("portal/inicio");    
            return redirect()->to($url_redirect);
        } else {
            return redirect()->to(base_url('portal?status=0&description= ' . $response['msg']));
        }
    }

    public function p()
    {
        echo \App\Libraries\Utilidades::create_password_hash($_GET["pass"]);
    }
}
