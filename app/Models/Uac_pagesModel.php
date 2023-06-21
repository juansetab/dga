<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class Uac_pagesModel extends Model{
    protected $table = 'uac_pages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ["id", "controller", "name", "description", "parent_node", "status", "creation"];
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

}