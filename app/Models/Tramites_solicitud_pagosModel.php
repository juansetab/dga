<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class Tramites_solicitud_pagosModel extends Model{

protected $table = 'tramites_solicitud_pagos';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $returnType     = 'array';
protected $useSoftDeletes = false;
protected $allowedFields = ["id","id_nivel","id_area_dga","id_tipo_tramite","id_usuario","observaciones","status","creacion"];
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
