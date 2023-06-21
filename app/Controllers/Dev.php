<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dev extends Controller
{

	public function __construct()
    {
		die(view("errors/html/error_404"));
    }

	public function phpinfo()
	{
		echo phpinfo();
	}

	public function remote_addr()
	{
		echo 'http://' . getHostByName(getHostName()) . '/mecanica/';
	}

	public function ci_version()
	{
		echo \CodeIgniter\CodeIgniter::CI_VERSION;
	}

	public function create_form()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		echo "<form id='' action='<?php echo base_url('')?>' method='POST'>" . PHP_EOL;
		echo "	<div class='row'>";
		$c = 1;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			if ($field == "status") {
				echo PHP_EOL . "		<div class='form-group col-md-4 col-sm-12 col-lg-4'>" . PHP_EOL .
					"			<label class='form-label' for='$field'>" . ucfirst($field) . ": </label>" . PHP_EOL .
					"			<select class='form-control form-control-sm' id='$field' name='$field'>" . PHP_EOL .
					"				<option value='1'>Activo</option>" . PHP_EOL .
					"				<option value='0'>Inactivo</option>" . PHP_EOL .
					"			</select>" . PHP_EOL .
					"		</div>";
			} else {
				$col_num = $field == 'rfc' || $field == 'description' ? "8" : "4";
				$datatype =	substr($f["Type"], 0, 3) == 'int' || substr($f["Type"], 0, 5) == 'float' ? "number" : "text";
				echo PHP_EOL . "		<div class='form-group col-md-$col_num col-sm-12 col-lg-$col_num'>" . PHP_EOL .
					"       			<label class='form-label' for='$field'>" . ucfirst($field) . ": </label>" . PHP_EOL .
					"       			<input type='$datatype' class='form-control form-control-sm' id='$field' name='$field' placeholder='' required />" . PHP_EOL .
					"    		</div>";
			}
		}
		echo PHP_EOL . "	</div>" . PHP_EOL .
			"	<button type='submit' class='btn btn-sm btn-primary'>Guardar</button>" . PHP_EOL .
			"</form>";
	}

	public function create_table_php()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		echo "<table id='" . $_GET['t'] . "' class='table table-striped table-sm text-center table-bordered text-nowrap'>" . PHP_EOL;
		echo "	<thead>" . PHP_EOL;
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		echo "		<th>ACCIONES</th>" . PHP_EOL;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			echo "		<th class='text-center'>" . strtoupper($field) . "</th>" . PHP_EOL;
		}
		echo "	<thead>" . PHP_EOL;
		echo "	<tbody>" . PHP_EOL;
		echo '		<?php foreach ($element as $r) { ?>' . PHP_EOL;;
		echo '		<tr id="tr_<?php echo $r["id"] ?>"  data-id-row="<?php echo $r["id"] ?>">' . PHP_EOL;
		echo '			<td>' . PHP_EOL;
		echo '				<div class="btn-group btn-group-xs" role="group">' . PHP_EOL;
		echo '					<button type="button" class="btn btn-success btn-sm" onclick="callModalEdit(this)"><i class="fa fa-edit"></i></button>' . PHP_EOL;
		echo '				</div>' . PHP_EOL;
		echo '			</td>' . PHP_EOL;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			echo '			<td id="' . $field . '"><?php echo $r["' . $field . '"] ?></td>' . PHP_EOL;
		}
		echo "		</tr>" . PHP_EOL;
		echo '		<?php } ?>' . PHP_EOL;;
		echo "	</tbody>" .  PHP_EOL;
		echo "</table>";
	}

	public function create_table_javascript()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		echo '		tr = `' . PHP_EOL;
		echo '		<tr id="tr_"` + value["id"] + `"  data-id-row="` + value["id"] + `">' . PHP_EOL;
		echo '			<td>' . PHP_EOL;
		echo '				<div class="btn-group btn-group-xs" role="group">' . PHP_EOL;
		echo '					<button type="button" class="btn btn-success btn-sm" onclick="callModalEdit(this)"><i class="fa fa-edit"></i></button>' . PHP_EOL;
		echo '				</div>' . PHP_EOL;
		echo '			</td>' . PHP_EOL;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			echo '			<td id="` + value["' . $field . '"] + `">` + stringify_null(value["' . $field . '"]) + `</td>' . PHP_EOL;
		}
		echo "		</tr>`;" . PHP_EOL;
	}

	public function create_table_foreach_php()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		echo "<tr>" . PHP_EOL;
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			echo '	<td id="' . $field . '"><?php echo $r["' . $field . '"] ?></td>' . PHP_EOL;
		}
		echo "</tr>";
	}


	public function create_table_foreach_javascript()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		echo "<tr>" . PHP_EOL;
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			echo '	<td id="' . $field . '">` + value.' . $field . ' + `</td>' . PHP_EOL;
		}
		echo "</tr>";
	}

	public function create_insert()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		echo "INSERT INTO  $table (" . PHP_EOL;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			echo "$field, ";
		}
		echo ")" . PHP_EOL . " values (";
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			echo "'\".\$data['$field'].\"', ";
		}
		echo ");";
	}

	public function create_update()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		echo "\"UPDATE " . $_GET['t'] . " SET " . PHP_EOL;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			$post = '$_POST["edit_' . $f["Field"] . '"]';

			if ($field != "id") {
				$value = substr($f["Type"], 0, 3) == 'int' || substr($f["Type"], 0, 5) == 'float' ? $post : "'$post'";
				echo "$field = $value, ";
			}
		}
		echo "WHERE id = \"";
	}

	public function create_array_php()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		$array = [];
		foreach ($fields->getResultArray() as $f) {
			array_push($array, $f["Field"]);
		}
		echo json_encode($array);
	}

	public function create_array_headers_php()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		$array = [];
		foreach ($fields->getResultArray() as $f) {
			array_push($array, strtoupper($f["Field"]));
		}
		echo json_encode($array);
	}

	public function create_array_php_insert()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		echo "[";
		foreach ($fields->getResultArray() as $f) {
			echo '"' . $f["Field"] . '" => ' . '$_POST["' . $f["Field"] . '"], ';
		}
		echo "]";
	}

	public function list_of_fields()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		foreach ($fields->getResultArray() as $f) {
			echo '"' . $f["Field"] . '", ';
		}
	}

	public function list_of_fields_upper()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		foreach ($fields->getResultArray() as $f) {
			echo '"' . strtoupper($f["Field"]) . '", ';
		}
	}

	public function calcula_qna()
	{
		//$date_string = date("Y-m-d");
		$date_string = "2022-12-15";
		$date = explode("-", $date_string);
		$anio = $date[0];
		$month = $date[2] < 16 ? $date[1] * 2 - 1 : $date[1] * 2;
		$qna = $anio . ($month < 10 ? "0" : "") . $month;
		echo $qna;
	}

	public function model()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$table = $_GET['t'];
		$tableModel = $table . "Model";
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");
		$list_of_fields = [];
		foreach ($fields->getResultArray() as $f) {
			array_push($list_of_fields, $f["Field"]);
		}

		$data =  "<?php" . PHP_EOL .
			"namespace App\Models;" . PHP_EOL .
			"use CodeIgniter\Model;" . PHP_EOL .
			"use Exception;\n" . PHP_EOL .
			"class " . ucfirst($tableModel) . " extends Model{\n" . PHP_EOL .
			"protected \$table = '$table';" . PHP_EOL .
			"protected \$primaryKey = 'id';" . PHP_EOL .
			"protected \$useAutoIncrement = true;" . PHP_EOL .
			"protected \$returnType     = 'array';" . PHP_EOL .
			"protected \$useSoftDeletes = false;" . PHP_EOL .
			"protected \$allowedFields = " . json_encode($list_of_fields) . ";" . PHP_EOL .
			"protected \$useTimestamps = false;" . PHP_EOL .
			"protected \$createdField  = 'created_at';" . PHP_EOL .
			"protected \$updatedField  = 'updated_at';" . PHP_EOL .
			"protected \$deletedField  = 'deleted_at';" . PHP_EOL .
			"protected \$validationRules    = [];" . PHP_EOL .
			"protected \$validationMessages = [];" . PHP_EOL .
			"protected \$skipValidation     = false; \n" . PHP_EOL .
			"	public function insertData(\$data){" . PHP_EOL .
			"		try{" . PHP_EOL .
			"			\$this->insert(\$data);" . PHP_EOL .
			"			\$insert = \$this->getInsertID();" . PHP_EOL .
			"			return array('status' => 1, 'id' => \$insert);" . PHP_EOL .
			"		}catch(Exception \$e){" . PHP_EOL .
			"			die(json_encode(array('status' => 0, 'msg' => 'Error. '.\$e)));" . PHP_EOL .
			"		}" . PHP_EOL .
			"	}" . PHP_EOL .
			"}" . PHP_EOL;
		$model_file = fopen(getcwd()."/app/Models/".ucfirst($tableModel).".php", "w") or die("Unable to write file!");
		fwrite($model_file, $data);
		fclose($model_file);
		echo "Archivo ".getcwd()."/app/Models/".ucfirst($tableModel).".php escrito!";
	}

	/**
	 * METODOS FINALES PARA LA GENERACIÓN DE ARCHIVO
	 * ESTOS MÉTODOS ESTÁN EN DESARROLLO
	 */
	public function create_template_form($fields, $form_crud)
	{
		$string = "";
		$string .= "<form id='form_$form_crud' action='<?php echo base_url('')?>' method='POST'>" . PHP_EOL;
		$string .= "	<div class='row'>";
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			if ($field == "status") {
				$string .= PHP_EOL . "		<div class='form-group col-md-4 col-sm-12 col-lg-4'>" . PHP_EOL .
					"			<label class='form-label' for='$field'>" . ucfirst($field) . ": </label>" . PHP_EOL .
					"			<select class='form-control form-control-sm' id='$field' name='$field'>" . PHP_EOL .
					"				<option value='1'>Activo</option>" . PHP_EOL .
					"				<option value='0'>Inactivo</option>" . PHP_EOL .
					"			</select>" . PHP_EOL .
					"		</div>" . PHP_EOL;
			} else if ($field == "id") {
				if ($form_crud == "edit") {
					$string .= "<input type='hidden' id='id' name='id' placeholder='' />" . PHP_EOL;
				}
			} else {
				$col_num = $field == 'rfc' || $field == 'description' ? "8" : "4";
				$datatype =	substr($f["Type"], 0, 3) == 'int' || substr($f["Type"], 0, 5) == 'float' ? "number" : "text";
				$string .= PHP_EOL . "		<div class='form-group col-md-$col_num col-sm-12 col-lg-$col_num'>" . PHP_EOL .
					"       			<label class='form-label' for='$field'>" . ucfirst($field) . ": </label>" . PHP_EOL .
					"       			<input type='$datatype' class='form-control form-control-sm' id='$field' name='$field' placeholder='' required />" . PHP_EOL .
					"    		</div>";
			}
		}
		$string .= PHP_EOL . "	</div>" . PHP_EOL .
			"	<button type='submit' class='btn btn-sm btn-primary'>Guardar</button>" . PHP_EOL .
			"</form>" .  PHP_EOL;
		return $string;
	}

	public function create_template_table($fields)
	{
		$string = "";
		$string .= "<table id='" . $_GET['t'] . "' class='table table-striped table-sm text-center table-bordered text-nowrap'>" . PHP_EOL;
		$string .= "	<thead>" . PHP_EOL;
		$string .= "		<th class='text-center'>ACCIONES</th>" . PHP_EOL;
		$id = false;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			$string .= "		<th class='text-center'>" . strtoupper($field) . "</th>" . PHP_EOL;
			if ($field == "id")
				$id = true;
		}
		$string .= "			<thead>" . PHP_EOL;
		$string .= "			<tbody>" . PHP_EOL;
		$string .= '				<?php foreach ($' . $_GET['t'] . ' as $r) { ?>' . PHP_EOL;
		$tr_head = $id == true ? '<tr id="tr_<?php echo $r["id"] ?>"  data-id-row="<?php echo $r["id"] ?>">' : '<tr>';
		$string .= '				' . $tr_head . PHP_EOL;
		$string .= '					<td>' . PHP_EOL;
		$string .= '						<div class="btn-group btn-group-xs" role="group">' . PHP_EOL;
		$string .= '							<button type="button" class="btn btn-success btn-sm" onclick="callModalEdit(this)"><i class="fa fa-edit"></i></button>' . PHP_EOL;
		$string .= '						</div>' . PHP_EOL;
		$string .= '					</td>' . PHP_EOL;
		foreach ($fields->getResultArray() as $f) {
			$field = $f["Field"];
			$string .= '					<td id="' . $field . '"><?php echo $r["' . $field . '"] ?></td>' . PHP_EOL;
		}
		$string .= "				</tr>" . PHP_EOL;
		$string .= '				<?php } ?>' . PHP_EOL;;
		$string .= "			</tbody>" .  PHP_EOL;
		$string .= "		</table>" .  PHP_EOL;
		return $string;
	}


	public function create_template_view()
	{
		$this->response->setHeader('Content-Type', 'text/plain');
		$array = [];
		$table = $_GET['t'];
		$db = db_connect();
		$fields = $db->query("SHOW COLUMNS FROM $table;");

		$array["__form_edit__"] = $this->create_template_form($fields, "edit");
		$array["__form_insert__"] = $this->create_template_form($fields, "insert");
		$array["__table__"] = $this->create_template_table($fields);

		$path_filename = dirname(__FILE__, 3) . "/app/Views/plantilla.php";
		$archivo = fopen($path_filename, 'r');
		$numlinea = 0;
		while ($linea = fgets($archivo)) {
			if (strpos($linea, "__tabledb__") !== false)
				$linea = str_replace("__tabledb__", $_GET["t"], $linea);
			if (strstr($linea, '__') !== false) {
				echo $array[trim($linea)];
			} else {
				echo $linea;
			}
		}
		fclose($archivo);
	}

	public function xlsx()
	{
		\App\Libraries\Utilidades::download_xlsx_encrypted("example", "ejemplo", "hoja1", "", "pass");
	}

	public function text()
	{
		echo \App\Libraries\Utilidades::numberToText(101101.00);
	}

	public function prueba()
	{
		echo view("header_footer/header");
		echo view("sabanas/prueba");
		echo view("header_footer/footer");
	}

	public function existe_archivo()
	{
		$c = 1;
		echo "<table>";
		foreach ($this->ARRAY as $r) {
			$nombre_fichero = "C:\Users\HOME\Desktop\INFO JUAN\PDF LISTOS PARA ENTREGA/" . $r[1];
			if (!file_exists($nombre_fichero)) {
				echo "
				<tr>
                    <td>" . $c . "</td>
					<td>" . $r[0] . "</td>
                    <td>" . $r[1] . "</td>
				</tr>
				";
				$c++;
			}
		}
		echo "</table>";
	}

	public function listar_directorios()
	{
		$directorio = 'C:\Users\HOME\Desktop\INFO JUAN/';
		$ficheros  = scandir($directorio);
		echo "<table>";
		$c = 1;
		foreach ($ficheros as $K => $r) {
			if ($r != "." && $r != ".." && substr($r, -5) != ".xlsx") {
				echo "
				<tr>
                    <td>" . $c++ . "</td>
					<td>" . $r . "</td>
				</tr>
				";
			}
		}
		echo "</table>";
	}

	public function crear_carpeta()
	{
		$directorio = 'C:\Users\HOME\Desktop\05DIC2022/';
		$ficheros  = scandir($directorio);
		echo "<table>";
		$c = 1;
		foreach ($ficheros as $k => $r) {
			if (substr($r, -4) == ".pdf") {
				$estructura = 'C:\Users\HOME\Desktop\05DIC2022/' . str_replace(".pdf", "", $r);
				if (!mkdir($estructura, 0777, true)) {
					echo "
                        <tr>
                            <td>ERROR</td>
                            <td>" . str_replace(".pdf", "", $r) . "</td>
                        </tr>
                    ";
				} else {
					$currentLocation = 'C:\Users\HOME\Desktop\05DIC2022/' . $r;
					$newLocation = 'C:\Users\HOME\Desktop\05DIC2022/' . str_replace(".pdf", "", $r) . '/' . $r;
					$moved = rename($currentLocation, $newLocation);
					if ($moved) {
						echo "
                        <tr>
                            <td>$c</td>
                            <td>OK</td>
                            <td>" . str_replace(".pdf", "", $r) . "</td>
                        </tr>
                        ";
						$c++;
					} else {
						echo "
                        <tr>
                            <td></td>
                            <td>OK</td>
                            <td>" . str_replace(".pdf", "", $r) . "</td>
                        </tr>
                        ";
					}
				}
			}
		}
		echo "</table>";
	}


	public function integrar_carpetas()
	{
		$directorio = 'C:\Users\HOME\Desktop\integrar_carpetas/';
		$ficheros  = scandir($directorio);
		echo "<table>";
		foreach ($ficheros as $k => $r) {
			if ($r != "." && $r != ".." && !str_contains($r, '.pdf')) {
				$exists = file_exists('C:\Users\HOME\Desktop\integrar_carpetas/' . $r . '.pdf');
				if ($exists) {
					$currentLocation = 'C:\Users\HOME\Desktop\integrar_carpetas/' . $r . '.pdf';
					$newLocation = 'C:\Users\HOME\Desktop\integrar_carpetas/' . $r . '/' . $r . '.pdf';
					$moved = rename($currentLocation, $newLocation);
					if (!$moved) {
						echo "
                    <tr>
                        <td>ERROR AL MOVER</td>
                        <td>" . $r . "</td>
                    </tr>
                    ";
					}
				} else {
					echo "
                <tr>
                    <td>ARCHIVO NO EXISTE</td>
                    <td>" . $r . "</td>
                </tr>
                ";
				}
			}
		}
		echo "</table>";
	}


	public function fecha()
	{
		$array = array(
			array('AACT760525RV0', '1976-05-25'),
			array('AAGE620123S83', '1962-01-23'),
			array('AAGO831214JS8', '1983-12-14'),
			array('AAHJ870323NV7', '1987-03-23'),
			array('AAIJ911224KY0', '1991-12-24'),
			array('AALE740802BL0', '1974-08-02'),
			array('AALL880715M32', '1988-07-15'),
			array('AAMJ980404PS9', '1998-04-04'),
			array('AANM9105147D3', '1991-05-14'),
			array('AAPC840708DS4', '1984-07-08'),
			array('AAQC661020SPA', '1966-10-20'),
			array('AAVF890901RI4', '1989-09-01'),
			array('AEBA7701127A6', '1977-01-12'),
			array('AEHJ970804KV1', '1997-08-04'),
			array('AIBM840714C28', '1984-07-14'),
			array('AIHG960430229', '1996-04-30'),
			array('AIMP7408112R5', '1974-08-11'),
			array('AOBW810813PI4', '1981-08-13'),
			array('AOJD961220MP0', '1996-12-20'),
			array('AOJJ890921HY4', '1989-09-21'),
			array('AOPC7601188K2', '1976-01-18'),
			array('AULC8202172V0', '1982-02-17'),
			array('AUZP990325UP3', '1999-03-25'),
			array('BAOM7806028U8', '1978-06-02'),
			array('BAPA5206136B0', '1952-06-13'),
			array('BEAM9709144R3', '1997-09-14'),
			array('BEAR871031RA9', '1987-10-31'),
			array('BERN880824695', '1988-08-24'),
			array('BESE661226SK4', '1966-12-26'),
			array('BUFJ910624BZ7', '1991-06-24'),
			array('CAAV901120LX5', '1990-11-20'),
			array('CACJ500120IF5', '1950-01-20'),
			array('CACL950122JH4', '1995-01-22'),
			array('CACX830713K72', '1983-07-13'),
			array('CAET681105AD9', '1968-11-05'),
			array('CAGR810427NX1', '1981-04-27'),
			array('CAGS860613IA1', '1986-06-13'),
			array('CAGX750519HM6', '1975-05-19'),
			array('CAJL960528PY1', '1996-05-28'),
			array('CALJ8004093K2', '1980-04-09'),
			array('CALY8608194K4', '1986-08-19'),
			array('CAMA791031BA4', '1979-10-31'),
			array('CAMA9310284Q9', '1993-10-28'),
			array('CAMC860526LV8', '1986-05-26'),
			array('CAME7806085NA', '1978-06-08'),
			array('CAMO8502234B9', '1985-02-23'),
			array('CAMR581002NN8', '1958-10-02'),
			array('CAMS610725QT6', '1961-07-25'),
			array('CAOD910819MC8', '1991-08-19'),
			array('CAOL870110IYA', '1987-01-10'),
			array('CAPJ6702126B8', '1967-02-12'),
			array('CAPJ751203AM8', '1975-12-03'),
			array('CAPJ800610CW1', '1980-06-10'),
			array('CAPR8511288Q2', '1985-11-28'),
			array('CASE720612456', '1972-06-12'),
			array('CATI780315T93', '1978-03-15'),
			array('CEDC940623QF0', '1994-06-23'),
			array('CEOJ680101EC7', '1968-01-01'),
			array('CITJ910303EYA', '1991-03-03'),
			array('CITM821103875', '1982-11-03'),
			array('COBO9011301Q8', '1990-11-30'),
			array('COCE710914D6A', '1971-09-14'),
			array('COGL5209131M2', '1952-09-13'),
			array('COGX941002P26', '1994-10-02'),
			array('COHU910812JL8', '1991-08-12'),
			array('COPE980119D17', '1998-01-19'),
			array('CORM680609NHA', '1968-06-09'),
			array('COSG8612255S0', '1986-12-25'),
			array('CUAM700110IW4', '1970-01-10'),
			array('CUAV761006M94', '1976-10-06'),
			array('CUCA9105209D4', '1991-05-20'),
			array('CUCC951029HZ1', '1995-10-29'),
			array('CUFC900106EK6', '1990-01-06'),
			array('CUFK940513K25', '1994-05-13'),
			array('CUGH930612PN3', '1993-06-12'),
			array('CUGM980519K85', '1998-05-19'),
			array('CUHD920525271', '1992-05-25'),
			array('CUHQ801104HQ8', '1980-11-04'),
			array('CUHS711208JH3', '1971-12-08'),
			array('CUIR551213TE9', '1955-12-13'),
			array('CULN970304SR6', '1997-03-04'),
			array('CUMA900627SMA', '1990-06-27'),
			array('CUNJ700328N97', '1970-03-28'),
			array('CURJ790630AW1', '1979-06-30'),
			array('CUSV800405KP2', '1980-04-05'),
			array('DICJ910629IB3', '1991-06-29'),
			array('DIGA740405GE4', '1974-04-05'),
			array('DISC710920TK0', '1971-09-20'),
			array('DOCI8402188P2', '1984-02-18'),
			array('DOLL861030NXA', '1986-10-30'),
			array('DOTJ851228LC5', '1985-12-28'),
			array('EELJ8412256G5', '1984-12-25'),
			array('EIRB520828SA4', '1952-08-28'),
			array('EIRP810808D52', '1981-08-08'),
			array('FAPJ640320B75', '1964-03-20'),
			array('FENE730728MT3', '1973-07-28'),
			array('FEPL841213PCA', '1984-12-13'),
			array('FOOI940103E50', '1994-01-03'),
			array('GAAA740726S58', '1974-07-26'),
			array('GACD8212229H5', '1982-12-22'),
			array('GACS880110D18', '1988-01-10'),
			array('GADC950518N50', '1995-05-18'),
			array('GAOM9111092A3', '1991-11-09'),
			array('GARD830706GDA', '1983-07-06'),
			array('GARN660813834', '1966-08-13'),
			array('GECC7509133C1', '1975-09-13'),
			array('GOAJ910506HD6', '1991-05-06'),
			array('GOGC7710077M0', '1977-10-07'),
			array('GOGJ820624UV7', '1982-06-24'),
			array('GOHA620411K26', '1962-04-11'),
			array('GOLL780206C58', '1978-02-06'),
			array('GOMM570306CX4', '1957-03-06'),
			array('GOPA930630JC2', '1993-06-30'),
			array('GUGK971121BZ7', '1997-11-21'),
			array('GUHJ781002CE3', '1978-10-02'),
			array('GUMR900428RC7', '1990-04-28'),
			array('HEAC870202I39', '1987-02-02'),
			array('HEAG90030385A', '1990-03-03'),
			array('HEAH740922221', '1974-09-22'),
			array('HECE760329SW1', '1976-03-29'),
			array('HECG900526RN1', '1990-05-26'),
			array('HEFC961009EK7', '1996-10-09'),
			array('HEGM940911U37', '1994-09-11'),
			array('HEGM9602239M4', '1996-02-23'),
			array('HEJE731008QJ7', '1973-10-08'),
			array('HEMJ810313PC7', '1981-03-13'),
			array('HERC5904122SA', '1959-04-12'),
			array('HEVY930825E12', '1993-08-25'),
			array('HIJT860407EA8', '1986-04-07'),
			array('HUCD8401213D9', '1984-01-21'),
			array('IAOE560830DX2', '1956-08-30'),
			array('IICV650507932', '1965-05-07'),
			array('IIIR800511138', '1980-05-11'),
			array('IUMJ650630GV3', '1965-06-30'),
			array('IUPB760127CF9', '1976-01-27'),
			array('JALN7512057G0', '1975-12-05'),
			array('JEGP870310RA5', '1987-03-10'),
			array('JIAF830610NV8', '1983-06-10'),
			array('JICE981109U52', '1998-11-09'),
			array('JIGC8304066L5', '1983-04-06'),
			array('JIGC840217CM2', '1984-02-17'),
			array('JIHG770415TR9', '1977-04-15'),
			array('JIMG850111TV9', '1985-01-11'),
			array('JIMJ980623789', '1998-06-23'),
			array('JIPC740919U46', '1974-09-19'),
			array('JIRC800126I34', '1980-01-26'),
			array('JUCJ8806207U4', '1988-06-20'),
			array('JUSA671230CU7', '1967-12-30'),
			array('LACA841008MU6', '1984-10-08'),
			array('LAGC990814BJ8', '1999-08-14'),
			array('LECF840610M79', '1984-06-10'),
			array('LEMA670506D71', '1967-05-06'),
			array('LOCJ6610247X3', '1966-10-24'),
			array('LOFN890506FL1', '1989-05-06'),
			array('LOHA970726J62', '1997-07-26'),
			array('LOHF7401255HA', '1974-01-25'),
			array('LOMN8807106U1', '1988-07-10'),
			array('LOOG970915G63', '1997-09-15'),
			array('LOPL890724RZ4', '1989-07-24'),
			array('LOSE900311TD9', '1990-03-11'),
			array('LOSI990514JH8', '1999-05-14'),
			array('LOVN870921754', '1987-09-21'),
			array('LOVN881201D94', '1988-12-01'),
			array('LUJR840412MA3', '1984-04-12'),
			array('MAAA880725I88', '1988-07-25'),
			array('MAAI831102HN3', '1983-11-02'),
			array('MACM5810272R5', '1958-10-27'),
			array('MACM871210AV8', '1987-12-10'),
			array('MAEM610925SQ0', '1961-09-25'),
			array('MALC821111DM7', '1982-11-11'),
			array('MALJ911210IJ2', '1991-12-10'),
			array('MAMX800822GP6', '1980-08-22'),
			array('MANF720817J24', '1972-08-17'),
			array('MAOD880920TS7', '1988-09-20'),
			array('MAPC890913I16', '1989-09-13'),
			array('MAPR8310245T1', '1983-10-24'),
			array('MARE880526TD7', '1988-05-26'),
			array('MARJ960626AE5', '1996-06-26'),
			array('MAVG9410157H4', '1994-10-15'),
			array('MEDE911105FH8', '1991-11-05'),
			array('MOFG8612096T2', '1986-12-09'),
			array('MOLC610320JF8', '1961-03-20'),
			array('MOPE840219QE9', '1984-02-19'),
			array('MOPF710906D19', '1971-09-06'),
			array('MOPH9009277V9', '1990-09-27'),
			array('MOPJ910505DT9', '1991-05-05'),
			array('MORF930225DSA', '1993-02-25'),
			array('MORR831031AP8', '1983-10-31'),
			array('MORU660308MT3', '1966-03-08'),
			array('MOTF761009SL4', '1976-10-09'),
			array('NAHJ940719MQA', '1994-07-19'),
			array('NARS990821GA9', '1999-08-21'),
			array('NIMR720519TT5', '1972-05-19'),
			array('NOSM620114AW0', '1962-01-14'),
			array('OAJE760611PG7', '1976-06-11'),
			array('OAJJ781224QC1', '1978-12-24'),
			array('OAJV820925416', '1982-09-25'),
			array('OARA8905195C4', '1989-05-19'),
			array('OEBJ901012BZ2', '1990-10-12'),
			array('OIGC890624AR4', '1989-06-24'),
			array('OOGS550324P6A', '1955-03-24'),
			array('OOJG531223BW7', '1953-12-23'),
			array('OOLC7201208T0', '1972-01-20'),
			array('OOOM821217M13', '1982-12-17'),
			array('PAOJ940808R77', '1994-08-08'),
			array('PAPL550816HQ0', '1955-08-16'),
			array('PAVA850420841', '1985-04-20'),
			array('PAZG660203TW2', '1966-02-03'),
			array('PEAC980912B17', '1998-09-12'),
			array('PEAK970831IA6', '1997-08-31'),
			array('PEAL010619D58', '1901-06-19'),
			array('PEBO6310113J5', '1963-10-11'),
			array('PECG631017IQA', '1963-10-17'),
			array('PECP980409RL3', '1998-04-09'),
			array('PECS910514BF2', '1991-05-14'),
			array('PEEY820923VE0', '1982-09-23'),
			array('PEJM860827EN3', '1986-08-27'),
			array('PELC790416QI4', '1979-04-16'),
			array('PEME740620RH8', '1974-06-20'),
			array('PEMF951008LL3', '1995-10-08'),
			array('PEMG6007227P5', '1960-07-22'),
			array('PEPM8607281P5', '1986-07-28'),
			array('PERB7302182E6', '1973-02-18'),
			array('PERP740517M78', '1974-05-17'),
			array('PERS930426LP4', '1993-04-26'),
			array('PETD9204168S1', '1992-04-16'),
			array('PIHM700926PX7', '1970-09-26'),
			array('PIMA690315KM8', '1969-03-15'),
			array('PIMO6310308L9', '1963-10-30'),
			array('RAAS8709014Z1', '1987-09-01'),
			array('RAOE721123V61', '1972-11-23'),
			array('RAPE9206053L8', '1992-06-05'),
			array('RASC830519UX3', '1983-05-19'),
			array('RAYI680119ES6', '1968-01-19'),
			array('RECB671117U19', '1967-11-17'),
			array('REMJ861207B96', '1986-12-07'),
			array('ROCS8501057D5', '1985-01-05'),
			array('ROHG860208P44', '1986-02-08'),
			array('RORG020822QR2', '1902-08-22'),
			array('ROSB691207UT0', '1969-12-07'),
			array('RUAC5907112V6', '1959-07-11'),
			array('RUGJ590207EH7', '1959-02-07'),
			array('RUGV951012J6A', '1995-10-12'),
			array('RURK960801TA5', '1996-08-01'),
			array('RUTA9606285Y5', '1996-06-28'),
			array('SAAB970713191', '1997-07-13'),
			array('SAAY920510FY6', '1992-05-10'),
			array('SACF980307NE0', '1998-03-07'),
			array('SADG861216L89', '1986-12-16'),
			array('SAHC650715R74', '1965-07-15'),
			array('SAJY941117V92', '1994-11-17'),
			array('SALC590904KI2', '1959-09-04'),
			array('SALD680117H95', '1968-01-17'),
			array('SAMA680507687', '1968-05-07'),
			array('SAME890422CI7', '1989-04-22'),
			array('SAMI760504PT7', '1976-05-04'),
			array('SAMI8908096S9', '1989-08-09'),
			array('SASG850824KMA', '1985-08-24'),
			array('SAVG961113IBA', '1996-11-13'),
			array('SESR840523GP8', '1984-05-23'),
			array('SIGR910604HC0', '1991-06-04'),
			array('SIHD961021QU7', '1996-10-21'),
			array('SIPL650923EP0', '1965-09-23'),
			array('SOAF8905133B7', '1989-05-13'),
			array('SOGM6605155B9', '1966-05-15'),
			array('SOGO900927MA2', '1990-09-27'),
			array('SUCM870127BT9', '1987-01-27'),
			array('SUUH921202SDA', '1992-12-02'),
			array('TALJ940409E25', '1994-04-09'),
			array('TIMJ950126IG2', '1995-01-26'),
			array('TOSO9404181N3', '1994-04-18'),
			array('UICL9107038A7', '1991-07-03'),
			array('VACM901024FI6', '1990-10-24'),
			array('VAFD960108QS7', '1996-01-08'),
			array('VAGH670915E92', '1967-09-15'),
			array('VAGI860628UB5', '1986-06-28'),
			array('VALJ810701162', '1981-07-01'),
			array('VAOR820511AZ0', '1982-05-11'),
			array('VEAS880806DJ7', '1988-08-06'),
			array('VECN860801L66', '1986-08-01'),
			array('VEIE571217GWA', '1957-12-17'),
			array('VELS821029R52', '1982-10-29'),
			array('VEMA860906P91', '1986-09-06'),
			array('VERC870613T98', '1987-06-13'),
			array('VICM981020P32', '1998-10-20'),
			array('VIJJ760928129', '1976-09-28'),
			array('VILR800107URA', '1980-01-07'),
			array('VIPP851117QN0', '1985-11-17'),
			array('VIRF900820H4A', '1990-08-20'),
			array('VIRM960218B12', '1996-02-18'),
			array('VISG731026BC2', '1973-10-26'),
			array('VISY020815FN4', '1902-08-15'),
			array('VIVP590406IC9', '1959-04-06'),
			array('YCMA9308302D3', '1993-08-30'),
			array('ZADV950504CK4', '1995-05-04'),
			array('ZAMM651209V89', '1965-12-09'),
			array('ZAOC9605015V7', '1996-05-01'),
			array('ZARA810805JP1', '1981-08-05'),
			array('ZARF870731C21', '1987-07-31'),
			array('ZEAD950609LL3', '1995-06-09')
		);
		echo "<table><tbody>";
		foreach ($array as $r) {
			echo "<tr><td>" . $r[0] . "</td><td>" . $r[1] . "</td><td>" . (\App\Libraries\Utilidades::calcula_edad($r[1], date('Y-m-d'))) . "</td></tr>";
		}
		echo "</tbody></table>";
	}

	function valida_fecha()
	{
		echo \App\Libraries\Utilidades::calcula_edad($r[1], date('Y-m-d'));
	}



	public function id()
	{
		$inicio = 1;
		$tope = 363;
		for ($i = $inicio; $i <= $tope; $i++) {
			echo $i . ", ";
		}
	}
}
