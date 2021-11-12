<?php
include "conn_exion.php";
$assignName = function($n){
	return "question_".$n;
};
$keys_post = array_map( $assignName, range(1, 25));
$values_str = implode(",:", $keys_post);
$keys_str = implode(",", $keys_post);
$departaments = array("Compras", "Ventas", "Recursos Humanos", "TI" );
$str_sql = "INSERT INTO quizztbl( employee_no, departament , $keys_str, created_at ) VALUES( :employee_no, :departament , :$values_str, :created_at )";
$statement = $dbPdo->prepare($str_sql);
for ( $i = 0; $i < 100 ; $i++)
{
	$employee_no = ((string)rand(1,1000))."".((string)rand(1,1000))."".((string)rand(1,1000));
	$departament = $departaments[rand(0,3)];
	$statement->bindParam( ":employee_no", $employee_no );
	$statement->bindParam( ":departament", $departament );
	foreach ( $keys_post as $key  )
	{
		$rand_num = rand(1, 7);
		$statement->bindParam( ":$key", $rand_num );
	}
	$date = date('Y-m-d H:i:s');
	$statement->bindParam( ":created_at", $date );
	$statement->execute();
}
?>
