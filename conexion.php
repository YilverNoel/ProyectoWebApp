<?php
	try{
	$conn=pg_connect("host=localhost port=5432 dbname=crud user=postgres password=Yilver");
	}catch (Exception $e){
		die('chao'.$e);

	}
	
?>
