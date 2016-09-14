<?php

function db_connect() {
	
	global $con;
	
	$con = mysqli_connect("localhost", "root", "","to_do_list_db" );
	mysqli_set_charset($con, "utf-8");
	
	if(mysqli_connect_errno()){
		echo "Fail DB connct", "<br>";
	 }
	 else{
		echo "Cuccess DB connct", "<br>";
	 }
	echo "Welcome from db_engine WAMP", "<br>";	
}
		 

function db_add_item_to_tbl(){
   
   global $con;
   
   $query = "INSERT INTO to_do_list_tbl VALUES (NULL,'NIKOLOZ');";
   $info  = mysqli_query($con, $query); 
	if($info){
	   echo "Cuccess insert item to tbl", "<br>";
	}else{
		echo "Fail insert item to tbl", "<br>";
	}
	
	#var_dump($info);
}

function db_delete_item_from_tbl(){
   
   global $con;
   
   $query = "DELETE FROM to_do_list_tbl WHERE id='3';";
   $info  = mysqli_query($con, $query); 
	if($info){
	   echo "Cuccess deleting item from tbl", "<br>";
	}else{
		echo "Fail deleting item from tbl", "<br>";
	}
	
	$query = "DELETE FROM to_do_list_tbl WHERE name='AAAAAA';";
    $info  = mysqli_query($con, $query);
    echo mysqli_affected_rows($con);	
	
}

function db_update_item_in_tbl(){
   
   global $con;
   
   $query = "UPDATE to_do_list_tbl SET name = 'AAA'  WHERE id=29;";
   $info  = mysqli_query($con, $query); 
	if($info){
	   echo "Cuccess UPDATE item to tbl", "<br>";
	}else{
		echo "Fail UPDATE item to tbl", "<br>";
	}
}

function db_get_all_items_from_tbl(){
   
	global $con;
	
	$query = "SELECT * FROM to_do_list_tbl ;";
	$info  = mysqli_query($con, $query); 
	$count = mysqli_num_rows($info);
	if($count){
		while($row = mysqli_fetch_array($info)){
			echo $row['name'], "<br>";
		}
	}else{
		echo "Fail get all itemfrom tbl", "<br>";
		var_dump($info);
	}		
}
?>
 