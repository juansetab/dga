<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class V_tramitesModel extends Model{

protected $table = 'v_tramites';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $returnType     = 'array';
protected $useSoftDeletes = false;
protected $allowedFields = ["id_tramite","nombre_nivel","nombre_tramite","id_usuario","status"];
protected $useTimestamps = false;
protected $createdField  = 'created_at';
protected $updatedField  = 'updated_at';
protected $deletedField  = 'deleted_at';
protected $validationRules    = [];
protected $validationMessages = [];
protected $skipValidation     = false; 

	public function insertData($data){
		try{
			$this->insert($data);
			$insert = $this->getInsertID();
			return array('status' => 1, 'id' => $insert);
		}catch(Exception $e){
			die(json_encode(array('status' => 0, 'msg' => 'Error. '.$e)));
		}
	}
}
