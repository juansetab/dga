<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class V_tramites_solicitud_pagoModel extends Model{

protected $table = 'v_tramites_solicitud_pago';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $returnType     = 'array';
protected $useSoftDeletes = false;
protected $allowedFields = ["id_tramite_solicitud_pago","id_usuario","id_nivel","id_area","nombre_nivel","nombre_area","nombre_tramite","nombre_usuario","observaciones","status","creacion"];
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
