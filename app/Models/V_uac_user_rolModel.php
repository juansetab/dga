<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class V_uac_user_rolModel extends Model{
    protected $table = 'v_uac_user_rol';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ["rol", "usuario", "id_rol", "id_usuario"];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

}