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
        if (!isset($_POST["usuario"], $_POST["password"]))
            die(view("errors/html/error_404"));
        $response = \App\Libraries\UserControl::login_validation($_POST["user"], $_POST["pass"]);
        if ($response['status'] === true) {
            $url_request = explode("?", $_SERVER["HTTP_REFERER"])[0]; //Quita variables GET si existen
            return redirect()->to("portal/inicio");
        } else {
            return redirect()->to(base_url('accesos/login?status=0&description= ' . $response['msg']));
        }
    }

    public function p()
    {
        echo \App\Libraries\Utilidades::create_password_hash($_GET["pass"]);
    }
}
