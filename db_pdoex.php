	<?php
	require_once("db_pdoextend.php");
	header("content-type:text/html;charset=utf8");

	$Uya = "0";
	$pdo = new db_pdoextend;
	$query =$pdo->binQuery("select * from membdata where Uya LIKE :Uya LIMIT :limit",[
	    ':Uya' => "%{$Uya}%",
        ':limit' => 1
    ]);
	
	foreach($query as $row){
		echo $row["uid"]."<br>";
		echo $row["Uya"]."<br>";
	}

	?>