<!DOCTYPE html>
<?php


include "conn.php";

$title = $_POST['title'];
$retrieve = $conn->prepare("SELECT * FROM articles WHERE title ='".$title."'");
$stmt = $retrieve->execute();

?>
<html>
	<head>
	<title>blog</title>
	</head>
	<body style="width:500px; margin: auto">
	<?php
	if(!isset($_POST['delete'])){
		$summary = $_POST['summary'];
		if(!$stmt){
			 echo "Article exists"; 
			 exit;
		}else{
			$row = $retrieve->fetch(PDO::FETCH_ASSOC);
			$content = $row["content"];
			echo "Are you sure you want to delete?<br>", $title, "<br>", $content, "<br>", "Note that blogs are still stored in db and are simply hidden from view";
		}
	?>
		<form action="delete.php" method="post">
			<input type="hidden" name="title" value="<?php echo $title?>" />
			<input type="submit" name="delete" value="Delete"/>
		</form>
		<form action="index.php">
			<input type="submit" value="Cancel"/>
		</form>
	<?php 
	}else{
		echo $title, " has been deleted... redirecting to main page";
		$update = $conn->prepare("UPDATE articles SET hidden = '1' WHERE title = '".$title."'");
		$update->execute();
		header( "refresh:5;url=index.php" );
	}
	?>
	</body>
</html>