<?php 

namespace App\Libraries;
use App\Models\Uac_pagesModel;
use App\Models\V_user_privilegesModel;

class UserControl{
    public static function login_validation($user, $pass){
        $model_users = new Uac_pagesModel();
        $user_result = $model_users->getAll(substr($user, 0, 3));
        if($model_users === false)
            return array("status" => false, "msg" => "Ha ocurrido un error, contacte al administrador");
		foreach($user_result as $u){
            $vrfy_pass = \App\Libraries\Utilidades::verify_password($pass, $u["psswrd"]);
			if($vrfy_pass == true && $user == $u["username"]){
                $model_permissions = new V_user_privilegesModel();
                $user_permissions = $model_permissions->getByUsername($user);
                $finded = array_search("0", array_column($user_permissions, 'id_rol')); //Busca si existe el controlador y nombre
                if($finded !== false){
                    $superadmin = true;
                    $user_permissions = []; 
                    $db = db_connect();
                    $query = $db->query("SELECT controller, name as page_name, description, parent_node, status as page_status, 
                            CONCAT(controller,name) as search_key FROM uac_pages ORDER BY description ASC");
                    foreach ($query->getResult('array') as $row) {
                        array_push($user_permissions, $row);
                    }
                }else{
                    $superadmin = false;
                }
				$user_data = array(
					'id'  => $u["id"],
					'username'  => $u["username"],
					'nombre'  => $u["name"],
					'primer_apellido'  => $u["first_lastname"],
					'segundo_apellido'  => $u["second_lastname"],
                    'isSuperAdmin' => $superadmin
				);
                $session = session();
                $session->set("session_started", true);
                $session->set("user_data", $user_data);
                $session->set("user_permissions", $user_permissions);
				return array("status" => true);
			}
		}
        return array("status" => false, "msg" => "Credenciales erróneas");
    }

    /**
     * Valida que el usuario tenga acceso al sitio web
     * @param user es el id del usuario
     * @param page es el id de la página
     * @return bool true si existe registro, false si no existe registro
     */
    
    private static function user_page_validation($controller, $page, $crud){
        $session = session();
        if($session->get('session_started') != true) //Valida si existe la variable session_started que se asigna al momento de iniciar sesión
            return array("status" => false, "msg" => "No ha iniciado una sesión por lo que no tiene permiso de acceder"); //Si no existe es que no se inició sesión
        $permissions = $session->get('user_permissions');
        if(empty($permissions))
            return array("status" => false, "msg" => "No se te han otorgado accesos, contacta al administrador");
        if($session->get('user_data')['isSuperAdmin'] === true)
            return array("status" => true);
        $finded = array_search($controller.$page, array_column($permissions, 'search_key')); //Busca si existe el controlador y nombre
        if($finded !== false){
                if($crud){ //Si solo valida los permisos del crud
                    return array("status" => boolval($permissions[$finded][$crud]));
                }
                return array("status" => true, "permissions" => array("update" => $permissions[$finded]['update'], 
                            "create" => $permissions[$finded]['create'], "delete" => $permissions[$finded]['delete']));
        }else{
            return array("status" => false, "msg" => "No tiene las credenciales necesarias para ver esta página");
        }
    }

    public static function page_permission($controller, $page){
        $permissions = self::user_page_validation($controller, $page, false);
        if($permissions["status"] == true){
            return true;
        }else{
            $data = array("controller" => $controller, "page" => $page, "msg" => $permissions["msg"]);
            die(view('accesos/login', $data));
        }
    }

    public static function crud_permission($controller, $page, $crud){
        $permissions = self::user_page_validation($controller, $page, $crud);
        if($permissions["status"] == true){
            return $permissions;
        }else{
            die(json_encode(array("status" => 0, "msg" => "No tiene permitido realizar esta acción")));
        }
    }

    /**
     * Obtiene la consulta del usuario
     */
    private function database_user_page($user, $page){

    }
    
}