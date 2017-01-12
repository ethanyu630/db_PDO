	<?php
	$Uya="0";
	header("content-type:text/html;charset=utf8");
	
	$dsn = "mysql:host=localhost;dbname=coffee";
	$dbh = new PDO($dsn,"root","");
	$dbh->query("SET NAMES UTF8");
	$sql = "select *from membdata where Uya LIKE :Uya order by Uya LIMIT :limit";
	$stmt = $dbh->prepare($sql);  //丟入暫存位置
	$stmt->bindValue(":Uya","%{$Uya}%");   
	$stmt->bindValue(":limit",10,PDO::PARAM_INT);  //利用PDO轉數字型態
	$stmt->execute();  //execute
	$query = $stmt->fetchall();
	
	
	foreach($query as $row){
		echo $row["uid"]."<br>";
		echo $row["Uya"]."<br>";
	}

	?>