<?php
# This is also a single-line comment 	
/*This is a multiple-lines comment block*/
include_once 'db_engine.php';

echo "Run post_req_handler.php", "<br>";

//$_Request['FName']="John"

		
switch($_SERVER['REQUEST_METHOD'])
{
	case 'GET':  $the_request = &$_GET; echo "GET request passed to WAMP","<br>"; break;
		
	case 'POST': $the_request = &$_POST; echo "POST request passed to WAMP" ;
		db_connect(); 
	    db_add_item_to_tbl();
		$output = "description: 7777777777, completed: true ";
		//data: { description: itemDescription, completed: false }
		echo $output;
		break;
	case 'PUT': $the_request = &$_PUT; echo "PUT request passed to WAMP" ;break;
	case 'DELETE': $the_request = &$_DELETE; echo "DELETE request passed to WAMP" ;break;

default: break;
}

?>
 