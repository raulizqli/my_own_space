<?php
include "conn_exion.php";
$keys_post = array_keys($_POST["responses"]);
$values_str = implode(",:", $keys_post);
$keys_str = implode(",", $keys_post);

$str_sql = "INSERT INTO quizztbl( employee_no, departament , $keys_str, created_at ) VALUES( :employee_no, :departament , :$values_str, :created_at )";
$statement = $dbPdo->prepare($str_sql);
$statement->bindParam( ":employee_no", $_POST["employee_no"] );
$statement->bindParam( ":departament", $_POST["departament"] );
foreach ( $_POST["responses"] as $key => $value )
{
	$statement->bindParam( ":$key", $value );
}
$statement->bindParam( ":created_at", date("now") );
echo json_encode($statement->execute());
?>