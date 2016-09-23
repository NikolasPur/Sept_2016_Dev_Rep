<?php
include_once 'db_engine.php';

 
//header('Content-Type: application/json; charset=windows-1251');
$myarry = array('name'=>'NIKOLAS_PUR_NIKA','items', 'id' => '888', 'description' => 'AAAAAAAA','completed'=>false,'created_at' =>'2016-09-14T08:30:47.414Z','updated_at'=>'2016-09-14T08:30:47.414Z');
//header('Content-Type: application/json');
echo json_encode($myarry);

/*
require 'db.php'; 
$db = new Db(); 
$query = "SELECT * FROM todo ORDER BY id asc"; 
$results = $db->mysql->query($query); 
  
if($results->num_rows) { 
    while($row = $results->fetch_object()) { 
        $title = $row->title; 
        $description = $row->description; 
        $id = $row->id; 
      
echo '<div class="item">'; 
*/
?>
 