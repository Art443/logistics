<?
	class db_tools{
                //var $link = mysql_connect("localhost", "root", "1234");
                //var $sql = "use dbvehicle";
                //var $result = mysql_query($sql);
		var $host = 'localhost';
		var $user = 'root';
		var $pass = '1234';
		var $db_name = 'dbvehicle';
		var $charset ='utf-8';
		var $sql;
		//คำสั่งเพื่อเชื่อมต่อฐานข้อมูลโดยเลือกเทเบิ้ล
		function connect(){
				$con = mysql_connect($this->host,$this->user,$this->pass);
			if(!empty($con)){
			
			   mysql_select_db($this->db_name);
			   mysql_query('SET NAMES '.$this->charset);
			}else{
				echo mysql_error();
			}
			return $con;
		}
		//คำสั่งเพื่อดำเนืนการจัดการกับฐานข้อมูล
		function execute(){
			$con = $this->connect();
			if(!empty($con)){
				return mysql_query($this->sql);
			}
			return null;
		}
		
		function insert($table,$data){
			$field = "";
			$val = "";
			$i = 0;
			foreach($data as $k => $v){
				$field.=$k;
				$val .="'$v'";
				
				if($i<count($data)-1){
					$field.=',';
					$val.=',';
				}
				$i++;
			}
			$this->sql = "INSERT INTO $table($field) VALUES($val)";
			return mysql_query($this->sql);
		}
		
		function delete($table,$field,$value){
			$this->sql = "DELETE FROM $table WHERE $field = $value";
			return mysql_query($this->sql);
		}
		
		function update($table, $data, $field, $value){
			$rows ="";
			$i=0;
			
			foreach($data as $k => $v){
				if($k!=$field){
					$rows.="$k ='$v'";
					if($i<count($data)-1){
						$rows.=',';
					}
					$i++;
				}
			}
			$this->sql = "UPDATE $table SET $rows WHERE $field = $value";
			return mysql_query($this->sql);
		}
		
		function orderBy($table,$order){
			$this->sql = "SELECT * FROM $table ORDER BY $order";
			return $this;
		}
		
		function executeRow(){
			$con = $this->connect();
			if(!empty($con)){
				$rs = mysql_query($this->sql);
				if(!empty($rs)){
					$row = mysql_fetch_array($rs);
					return $row;
				}
			}
			return null;
		}
		
		function conditions($table,$condition){
			$this->sql = "SELECT * FROM $table WHERE $condition";
			return $this;
		}
		
		function in($table,$field,$value){
			$_value ="";
			$count = 0;
			
			foreach($value as $v){
			$_value.="$v";
			
			//add comma
			if(count($value)!=$count +1){
				$_value.=",";
			}
			$count++;
		}
			$this->sql ="SELECT * FROM $table WHERE $field IN ($_value)";
			return $this;
	}
	
		function findAll($table){
			$con = $this->connect();
			if(!empty($con)){
				$this->sql = 'SELECT * FROM '.$table;
				return $this;
			}
			return null;
		}
		function findByPK($table,$column,$value){
			$this->sql = "SELECT * FROM $table WHERE $column = $value";
			return $this;
		}
		
		function findByAttributes($table,$attributes){
				$this->sql = "SELECT * FROM $table WHERE";
				$count = 0;
				
				foreach($attributes as $k => $v){
					if($count == 0){
						$this->sql.= " $k '$v'";
					}else{
						$this->sql.= " AND $k '$v'";
					}
					$count++;
				}
				return $this;
			}
	}


?>