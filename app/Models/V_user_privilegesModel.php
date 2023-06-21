<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class V_user_privilegesModel extends Model{
    protected $table = 'v_user_privileges';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    //protected $allowedFields = ['name', 'email'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAll() { 
        try{
            return $this->where("status", "1")->orderBy('user_id', 'asc')->findAll(); 
        }catch(Exception $e){
            die(json_encode(array("status" => 0, "msg" => "Error. ".$e)));
        }   
    }

    public function getByUsername($usr) { 
        try{
            return $this->where('username', $usr)->findAll();  
        }catch(Exception $e){
            die(json_encode(array("status" => 0, "msg" => "Error. ".$e)));
        } 
    }
}