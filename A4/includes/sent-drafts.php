
<?php

$userID = $_SESSION['userID'];
//Displaying the posts
$sql ="SELECT * FROM `je_email_sentdrafts` WHERE je_sentdraft_from_id ='$userID'";
$result = $db->query($sql);

if (!$result) {
  die("Error executing query: ($db->errno) $db->error<br>SQL = $sql");
}
  while ($row = $result->fetch_row() ){
    
    echo $row[0];
    // first we will print the sent emails only, and include a link that has the post id, to open in it's own view
        echo "  <a href='index.php?drafts=" . $row[0] . "'> ". $row[3] . " . </a>  <br>";
  }

?>