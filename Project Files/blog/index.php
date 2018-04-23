<!DOCTYPE html>
<?php
	include "conn.php";
	$sth = $conn->prepare("SELECT * FROM articles");
	$sth->execute();
	while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
		echo $row["id"]." ", $row["date"]." ", $row["title"]." ", $row["summary"]."<br>";
	}
?>
<html>
	<head>
	<title>blog</title>
	</head>
	<body>
		<div style="float:right">
			<form action="admin.php">
				<input type="submit" value="Admin"/>
			</form>
		</div>
	</body>
</html>
