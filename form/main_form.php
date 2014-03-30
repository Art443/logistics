<?php
	class form{
		public $method = "POST";
		function open($cass=null,$url){
			return "<form class='{$cass}' method='{$this->method}' enctype='multipart/form-data' action='{$url}' role='form'>";
		}
		function close(){
			return "</form>";
		}
	}
#---------------Text-------------------#
	class textfield{
		public $name,$cass = null,$hold = null;
		public $value;
		
		function __construct($name,$cass,$hold){
			$this->name = $name;
			$this->cass = $cass;
			$this->hold = $hold;
			
		}
		function __toString(){
			return "<input type='text'
					class='{$this->cass}'
					name='{$this->name}'
					value='{$this->value}'
					placeholder='{$this->hold}'/>";
		}
	}

#---------------Label-------------------#
	class label{
		public $text;
		function __construct($text){
			$this->text = $text;
		}
		function __toString(){
			return "<label>{$this->text}</label>";
		}
	}
#---------------Password-------------------#
	class pass{
		public $name,$cass=null,$hold = null;

		
		function __construct($name,$cass,$hold){
			$this->name = $name;
			$this->cass = $cass;
			$this->hold = $hold;
		}
		
		function __toString(){
			return "<input type='password'
							class='{$this->cass}'
							name='{$this->name}'
							placeholder='{$this->hold}'/>";
		}
	}
#--------------radioGroup----------------#
	class radioGroup{
		private $items = array();
		public $name;
		function __toString(){
			$html ='';
			foreach($this->items as $item){
			$html.="<input type='radio'
					name='{$this->name}'
					{$item[checked]}
					value='{$item[value]}'";
			$html.=	"/>{$item[label]} ";
		}
		//print_r($this->items);
		return $html;
	}
		function add($label,$value,$checked){
		
			$this->items[count($this->items)] = array(
			'label'=>$label,
			'value'=>$value,
			'checked'=>$checked
			);
		}
		function edit($key,$label,$value,$checked){
	
			$this->items[$key] = array(
				'label'=>$label,
				'value'=>$value,
				'checked'=>$checked
			);
		}
}

#--------------SelectMenu----------------#

	class selectMenu{
		public $name,$items;
		
		function __construct(){
			$this->items = array();
		}
		
		function addItem($label,$value){
			$index = count($this->items);
			$this->items[$index] = array($label,$value);
		}
		
		function __toString(){
			$html = "<select name ='{$this->name}'>";
			
			if(count($this->items)>0){
				$length = count($this->items);
				
				for($i = 0; $i<$length; $i++){
					$label = $this->items[$i][0];
					$value = $this->items[$i][1];
					
				$html = "<option value='{$value}'>{$label}</option>";
				}
			}
			
			$html.="</select>";
			return $html;
		}	
	}
	
	
	class SelectFromDB{
	public $name,$lists;
	function selectFromTB($table,$value,$label,$result){
		include_once 'database/db_tools.php';
		$db = new db_tools();
		$rs = $db->findAll($table)->execute();
		$html = "<select name='{$this->name}'>
			<option value=''>
			-----{$this->lists}-----
			</option>
			";
		
		while($r = mysql_fetch_array($rs)){
			$html.="<option value= '{$r[$value]}'";
		if($r[$value]==$result){
				$html.='selected';
			};
			$html.=">
			{$r[$label]}
			</option>";
			}
		$html.="</select>";
		return $html;
		}

	}
#---------------Upload-------------------#
	class uploadPic{
		public $name;
		function __construct($name){
			$this->name = $name;
		}
		function __toString(){
			return "<input type='file' name='{$this->name}' />";
		}
	}			
#---------------Link-------------------#
	class link{
		public $url,$label,$params;
		function __toString(){
			return "
			<a href='{$this->url}?{$this->params}'>{$this->label}
			</a>";
		}
	}
#---------------Botton-------------------#
	class buttonok{
		public $text,$cass=null;
		
		function __construct($text,$cass){
			$this->text = $text;
			$this->cass	 = $cass;
		}
		function __toString(){
			return "<input class='{$this->cass}'type='submit' value='{$this->text}'/>";
		}
	}
?>