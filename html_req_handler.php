<?php
# This is also a single-line comment 	
/*This is a multiple-lines comment block*/
include 'db_engine.php';
echo "Run html_req_handler.php", "<br>";
//echo "Your First Name is: " . $_POST["description"] , "<br/>";


switch($_SERVER['REQUEST_METHOD'])
{
case 'GET': $the_request = &$_GET; echo "GET request passed to WAMP","<br>"; break;
case 'POST': $the_request = &$_POST; echo "POST request passed to WAMP" ; 
db_connect(); 
db_add_item_to_tbl();
	break;
case 'PUT': $the_request = &$_PUT; echo "PUT request passed to WAMP" ;break;
case 'DELETE': $the_request = &$_DELETE; echo "DELETE request passed to WAMP" ;break;

default: break;
}

?>


<?php
/*
foreach($_REQUEST as $key => $value)
 	
   {
   
   echo $key;
   echo ": " $value;
   echo "<br/>";
   
   } 
 */
?>
 