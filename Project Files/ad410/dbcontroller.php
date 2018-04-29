<?php

/* 
 * This is a DB Connection 
 * AD410 team2
 */


class DBController {
	private $servername = "localhost";
	private $username = "icoolsho_dnguyen";
	private $password = "$!965-10-8344";
	private $dbname = "icoolsho_dnguyen";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>