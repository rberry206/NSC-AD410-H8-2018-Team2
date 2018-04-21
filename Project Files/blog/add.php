<?php


include "conn.php";

$title = $_POST['title'];
$summary = $_POST['summary'];
$content = $_POST['content'];

$retrieve = $conn->prepare("SELECT title FROM articles WHERE title ='".$title."'");
$stmt = $retrieve->execute();
if(!$stmt){
     echo "Article exists"; 
     exit;
}else{
	$sql = ("INSERT INTO articles (date, title, summary, content) VALUES ('".date('Y-m-d')."', '".$title."', '".$summary."', '".$content."')");
	$stmt = $conn->query($sql);
	header('Location: '."index.php");
}