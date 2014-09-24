<?php

class DBConnect{
    protected $host = '127.0.0.1';
    protected $user = 'philos15_admin';
    protected $pass = 'd4rkm3mories';
    protected $db = 'pwdb';

	protected static $_instance;

	//mysqli instance
	protected $mysqli;
	protected $_query;

    public function __construct() {
		$this->mysqli =  new mysqli($this->host,$this->user,$this->pass,$this->db) or die ("Unable to connect to DB.");
		$this->mysqli->set_charset('utf8');
		self::$_instance = $this;
    }

    public static function getInstance() {
    	return self::$_instance;
    }

    public function query($query) {
    	return $this->mysqli->query($query);
    }

    //prepared statement query
    public function pquery($query,$data) {
    	if($stmt = $this->mysqli->prepare($query)) {
	    	if(is_array($data)) {
	    		$params = array('');
	    		foreach($data as $prop => $val) {
	    			$params[0] .= $this->dataType($val);
	    			array_push($params,$data[$prop]);
	    		}

	    		call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
	    	}

	    $stmt->execute();
	    
	    return $this->boundResults($stmt);
    	}
 
    }

    public function pqueryi($query,$data) {
        if($stmt = $this->mysqli->prepare($query)) {
            if(is_array($data)) {
                $params = array('');
                foreach($data as $prop => $val) {
                    $params[0] .= $this->dataType($val);
                    array_push($params,$data[$prop]);
                }

                call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
            }

        return $stmt->execute();

        }
 
    }

    public function lastid() {
        return $this->mysqli->insert_id;
    }

    //return prepared statement results as array
    protected function boundResults(mysqli_stmt $stmt)
    {
        $parameters = array();
        $results = array();

        $meta = $stmt->result_metadata();

        $row = array();
        while ($field = $meta->fetch_field()) {
            $row[$field->name] = null;
            $parameters[] = & $row[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $parameters);

        while ($stmt->fetch()) {
            $x = array();
            foreach ($row as $key => $val) {
                $x[$key] = $val;
            }
            array_push($results, $x);
        }
        return $results;
    }

    protected function refValues($arr)
    {
        //Reference is required for PHP 5.3+
        if (strnatcmp(phpversion(), '5.3') >= 0) {
            $refs = array();
            foreach ($arr as $key => $value) {
                $refs[$key] = & $arr[$key];
            }
            return $refs;
        }
        return $arr;
    }

    public function escape($string) {
    	return $this->mysqli->real_escape_string($string);
    }

    public function pdata($data) {
    	$q="";
    	foreach($data as $d) {
    		$q .= $this->dataType($d);
    	}

    	return $q;
    }

    //prepared statement data binding type
    protected function dataType($item) {
    	switch(gettype($item)) {
    		case 'NULL':
    		case 'string':
	    		return 's';
	    		break;
	    	case 'integer':
	    		return 'i';
	    		break;
	    	case 'blob':
	    		return 'b';
	    		break;
	    	case 'double':
	    		return 'd';
	    		break;
    	}
    	return '';
    }

    //return mysql results as php array
	public function dbToArray($query,$key_column=null){
		$result = $this->mysqli->query($query);
        for ($array = array(); $row = mysqli_fetch_assoc($result); isset($row[$key_column]) ? $array[$row[$key_column]] = $row : $array[] = $row);
        return $array;  
	}
}

?>