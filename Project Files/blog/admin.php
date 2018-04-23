<!DOCTYPE html>
<?php
	session_start();
	include "conn.php";
	if(isset($_SESSION["action"])){
		switch($_SESSION["action"]){
		}
	}else{
?>
		<html>
			<head>
				<title>Admin</title>
			</head>
			<body>
				<form action="add.php" method="post">
					<h1>Welcome admin</h1>
					<h3>title</h3>
					<input type="text" name="title">
					<h3>summary</h3>
					<input type="text" name="summary">
					<h3>content</h3>
					<textarea rows="4" cols="50" name="content"></textarea>
					<input type="submit" name="submit">
				</form>
			</body>
		</html>
<?php
	}
?>