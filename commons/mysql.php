<?php 


require_once __DIR__.'/env.php';
class Db{
	public $table;
	public $id;
  protected $db;
  private $mysqli;
	private $stmtResult; //used to store get_result()
	private $stmt;
	private $defaultFetchType;
	public $qwhere = 'where 1 ';
	public $qVars = [];
	public $qLimVar = 25;
	public $qLim = "";
	public $qOrder = ' ';
	public $sql;
	// public  $moreColumns = [];

function __construct(){
	if(DEV){
		$this->db = new mysqli('localhost',DEV_DB_USER,DEV_DB_PASS,DB_NAME);//or die("Connection error");
	}
	else{
		$this->db = new mysqli('localhost',DB_USER,DB_PASS,DB_NAME);//or die("Connection error");
	}


  if($this->db->connect_error){
    outPut( servError("Failed to connect to MySQL: ". $this->db->connect_error));
    die();
    }
		$this->qLim = "LIMIT $this->qLimVar";

		return $this;
  }

// public function encodeString($str){
// 	return static::urlsafeB64Encode($str);
// }

	


  public function query(string $sql, $values = [], string $types = ''): self {
		if(!is_array($values)) $values = [$values]; //Convert scalar to array
		if(!$types) $types = str_repeat('s', count($values)); //String type for all variables if not specified 
		if(!$values) {
			$this->stmtResult = $this->db->query($sql); //Use non-prepared query if no values to bind for efficiency
		} else {

			
			$values = array_map(fn($val)=>$val ?? null,$values);
			$stmt = $this->stmt = $this->db->prepare($sql);
			$stmt->bind_param($types, ...$values);
			//echo $sql;die();
			$stmt->execute();
			$this->stmtResult = $stmt->get_result();    
		}
		return $this;
	}

	public function smartInsertQuery($table,$colums , $dataArr, $values = [], string $types = ''): self {
		if(!is_array($values)) $values = [$values]; //Convert scalar to array
		if(!$types) $types = str_repeat('s', count($colums)); //String type for all variables if not specified
		$ques ='?'. str_repeat(',?', count($colums) - 1);
		$sql = "INSERT INTO $table ( ".implode(', ',$colums) . ") VALUES (".$ques .')';
		 if(true) {
			$values = [];
			foreach ($colums as $i => $c) {
				# code...
				$values[$i] =  $dataArr[$c] ?? null;
			}
			$stmt = $this->stmt = $this->db->prepare($sql);
			$stmt->bind_param($types, ...$values);
			$stmt->execute();
			$this->stmtResult = $stmt->get_result();
		}
	return $this;
}




public function smartInsertQuery2($table,$colums , $dataArr, $values = [], string $types = ''): self {
	if($colums === null) {
		$colums = array_keys($dataArr);

		$tableColumns = $this->getColumns($table);
		foreach ($colums as $key => $value) {
			# code...
				if(!in_array($value,$tableColumns)){
					unset($colums[$key]);
				}
		}
 }
	
	if(!is_array($values)) $values = [$values]; //Convert scalar to array
	if(!$types) $types = str_repeat('s', count($colums)); //String type for all variables if not specified
	$ques ='?'. str_repeat(',?', count($colums) - 1);
	$sql = "INSERT INTO $table ( ".implode(', ',$colums) . ") VALUES (".$ques .')';
	 if(true) {
		$values = [];
		foreach ($colums as $i => $c) {
			# code...
			$values[$i] =  $dataArr[$c] ?? null;
		}
		$stmt = $this->stmt = $this->db->prepare($sql);
		$stmt->bind_param($types, ...$values);
		$stmt->execute();
		$this->stmtResult = $stmt->get_result();
	}
return $this;
}





  public function numRows(): int {
		return $this->stmtResult->num_rows;
	}

	public function numAffectedRows(): int {
		return mysqli_affected_rows($this->db);
	}

  public function getRows():array {
    $results = $this->stmtResult;
   return ($results->fetch_all(MYSQLI_ASSOC));
  }

  public function affectedRows(): int {
		return $this->db->affected_rows;
	}

  public function close(): void {
		$this->db->close();
	}
	public function getColumns($table){
				$result = $this->query("SHOW COLUMNS FROM $table");
		if ($result->numRows() < 1) {
				outPut(servError());
				die();
		}
		return array_map( fn($n) => $n['Field'],$result->getRows());
	}

	public function getAll($start = 0, $length = 50){
		$result = $this->query("select* from $this->table where id > $start limit $length")->getRows();
		return ($result);
	}

	public function lastId(){
		return mysqli_insert_id($this->db);
	}
	public function getBById($id){
		return $this->query("SELECT * from $this->table where id = ?",[$id])->getRows();
	}

	public function deleteById($id, $table = null , $colunnm = null) :self{
		$table = $table ?? $this->table ;
		$colunnm = $colunnm ?? 'id';
		$this->query("DELETE FROM $table WHERE $colunnm = ?",[$id]);
		return $this;
	}
}

$Db = new Db();
?>
