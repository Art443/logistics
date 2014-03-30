<?php
class gridView{
	public $name,$data,$delete,$edit,$view,$deletetxt,$edittxt,$viewtxt,$header,$width,$pr;
	
	function __construct(){
		$this->deletetxt = 'Delete';
		$this->edittxt = 'Edit';
		$this->viewtxt = 'View';
		$this->header = array();
		$this->width = array();
	}
	
	function __toString(){
		$html = "";
		$header = "";
		$body = "";
		
/* ส่วนหัวข้อ */
		$size = count($this->header);
		for($i = 0; $i<$size; $i++){
			$headertxt = $this->header[$i];
			$headerwidth = $this->width[$i];
			
			$header.= "<td width='{$headerwidth}'>{$headertxt}</td>";
		}
/* ส่วนของข้อมูล */
		$size = count($this->data);
		for($i=0; $i<$size; $i++){
			$row = $this->data[$i];
			$columncount = count($row);
			
			$body.="<tr>";
			for($j=0; $j<$columncount;$j++){
				$columntxt = $row[$j];
				$body.="<td>{$columntxt}</td>";
			}
			$body.="</tr>";
		}
/* รูปแบบ */
		$html = "
		<table id='{$this->name}' border='0' style='border=collapse: collapse;'>
			<thead>
				<tr>
					{$header}
				</tr>
			</thead>
			<tbody>
				{$body}
			</tbody>
		</table>";
		return $html;
	}
	
	function renderFromDB($fields, $result){
		$html ="";
		$header ="";
		$body ="";
/* ส่วนหัว */
		$size = count($this->header);
		for($i=0; $i<$size;$i++){
			$headertxt = $this->header[$i];
			$headerwidth = $this->width[$i];
			
			$header.="<td width='{$headerwidth}'>{$headertxt}</td>";
		}
		
		$columncount = count($fields);
			while($r = mysql_fetch_assoc($result)){
				$body.="<tr>";
				for($i =0; $i<$columncount; $i++){
					$fieldIndex = $fields[$i];
					$columntxt = $r[$fieldIndex];
					
					$body.="<td>{$columntxt}</td>";
				}
			$id = $r[$this->pr];
/* 				add delete */
			if($this->delete !=""){
				$body.="
					<td>
						<a href='{$this->delete}?id={$id}'>{$this->deletetxt}</a>
					</td>";
			}
/* 				add edit */
			if($this->edit !=""){
				$body .="
				<td>
					<a href='{$this->edit}&id={$id}'>{$this->edittxt}</a>
				</td>";
			}
				$body.="</td>";
			}
			
			$html = "
				<table id='{$this->name}' border='0' style='border=collapse: collapse;'>
					<thead>
						<tr>
							{$header}
						</tr>
					</thead>
					<tbody>
						{$body}
					</tbody>
				</table>";
				echo $html;
	}
}
?>