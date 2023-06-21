<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class Uac_rolesModel extends Model{
    protected $table = 'uac_roles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ["id", "name", "description", "status", "creation"];
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

    public function updateById($id, $data){
        try{
            $this->update($id, $data);
            return array("status" => 1, "msg" => "Registro editado satisfactoriamente");
        }catch(Exception $e){
            die(json_encode(array("status" => 0, "msg" => "Error. ".$e)));
        }  
    }

}