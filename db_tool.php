	<?php
	header("content-type:text/html;charset=utf8");
	$dsn = "mysql:host=localhost;dbname=coffee";
	$dbh = new PDO($dsn,"root","");
	$dbh->query("SET NAMES UTF8");
	$sql = "select * from membdata order by Una ASC";
	$result= $dbh->query($sql);
	$result->setFetchMode(PDO::FETCH_ASSOC);

	foreach($result as $row){
		echo $row["Una"]."<br>";
	}

	?>