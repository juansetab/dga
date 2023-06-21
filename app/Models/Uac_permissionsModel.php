<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class Uac_permissionsModel extends Model{
    protected $table = 'uac_permissions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ["id_rol", "id_page", "create", "read", "update", "delete", "creation"];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function getAll($username) { 
        try{
            return $this->where('status', 1)->like('username', $username)->findAll();
        }catch(Exception $e){
            die(json_encode(array("status" => 0, "msg" => "Error. ".$e)));
        }  
    }

    public function insertData($data){
        try{
            $this->insert($data);
            $insert = $this->getInsertID();
            return array("status" => 1, "id" => $insert);
        }catch(Exception $e){
            die(json_encode(array("status" => 0, "msg" => "Error. ".$e)));
        }  
    }

}