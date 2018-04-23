<!DOCTYPE html>
<?php
	include "conn.php";
	$sth = $conn->prepare("SELECT * FROM articles WHERE hidden !='1' ORDER BY id DESC");
	$sth->execute();
	$count = 0;
?>
<html>
	<head>
	<title>blog</title>
	</head>
	<body>
		<div style="width:500px; margin: auto">
		<?php
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
		?>
				<div id="blogContainer<?php echo $count?>" style="border:2px solid black; height:20px">
					<div style="padding-left:5px">
						<?php blogList($row["id"], $row["date"], $row["title"], $row["summary"])?>
						
					</div>
				</div>
				<br>
		<?php
				$count++;
			}
		?>
			<form action="admin.php" method="post">
				<input type="submit" value="Admin"/>
			</form>
		</div>
	</body>
</html>
<?php
	function blogList($id, $date, $title, $summary){
		?>
		<form action="delete.php" method="post" style="float:left; width:90.9%">
			<?php echo $id." | ", $date." | ", $title." | ", $summary?>
			<input type="hidden" name="id" value="<?php echo $id?>" />
			<input type="hidden" name="date" value="<?php echo $date?>" />
			<input type="hidden" name="title" value="<?php echo $title?>" />
			<input type="hidden" name="summary" value="<?php echo $summary?>" />
			<input type="submit" value="Delete" style="float:right;"/>
		</form>
		<input type="submit" value="View" style="float:right">
		<?php
	}
?>
