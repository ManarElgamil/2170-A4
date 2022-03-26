
<?php

$userID = $_SESSION['userID'];
//Displaying the posts
$sql ="SELECT * FROM `je_inbox` WHERE je_email_to_id ='$userID'";
$result = $db->query($sql);

if (!$result) {
	die("Error executing query: ($db->errno) $db->error<br>SQL = $sql");
}
	
if ($result->num_rows > 0){
	while ($row = $result->fetch_row() ){
			
			// first we will print the sent emails only, and include a link that has the post id, to open in it's own view
					echo "  <a href='index.php?subject=" . $row[0] . "'> ". $row[3] . " . </a>  ";
		}
}


?>