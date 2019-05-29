<?php
	function SQLCleaner($query)
	{
		$array = str_split($query);
		$new_query = "";
		$trash[] = "'";
		$trash[] = "=";
		$trash[] = "O";
		$trash[] = "o";	
		
		$num = rand(1,3);
		if($num == 1)
		{
			$trash[] = "-";	
		}else if($num == 2){
			$trash[] = "#";	
		}else{
			$trash[] = "#";
			$trash[] = "-";	
		}	

		foreach($array as $char){		
			$char = str_replace($trash,"",$char);
			$new_query = $new_query . $char;
		}
		
		return $new_query;
	}
?>
