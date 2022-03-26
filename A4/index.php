

<?php

//linking files, because we started the session in header we don't need to start it again
	require_once "includes/header.php";
?>


<main >
  <div class="container py-4">

	<!-- <main class="pg-main-content"> -->
		<!-- Content here -->


		<?php

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    //if the user is not logged in they will be redirected to login page
    header("location:includes/login.php");

	?>

<?php
	
	 }

	else {

		//so first we need to check if we are in 


		//so we will check if 
		if (isset($_REQUEST['inbox'])){
			// should we redirect or should we include it

			require_once "includes/inbox.php";
			
		}


		if (isset($_REQUEST['compose'])){
			require_once "includes/compose.php";
		}


		if (isset($_REQUEST['sent-drafts'])){
			require_once "includes/sent-drafts.php";
		}


		if (isset($_REQUEST['subject'])){


			$emailID = $_REQUEST['subject'];
			
			$sql2 = "SELECT * FROM `je_inbox` WHERE je_email_to_id ='$emailID'";
			
			$result2 = $db->query($sql2);
			
			
			if ($result2->num_rows > 0){
			
			
				$row = $result2->fetch_row()
			
			
				?>
							
				<div class="card">
				<div class="card-body">
			
				<?php
			
					// echo " <p > ". $row[1] . " .  </p> ";
					echo "  <p > From: ". $row[1] . " .  </p> ";
					echo "  <p > Date: ". $row[6] . " .  </p> ";
					echo "  <p > Message: ". $row[4] . " .  </p> ";
			
					echo "</div>  </div>";
					echo "<br> <br>";
			}
			
	
      }


			
		if (isset($_REQUEST['drafts'])){

			$emailID = $_REQUEST['drafts'];

			$sql2 = "SELECT * FROM `je_email_sentdrafts` WHERE je_sentdraft_id ='$emailID'";

			$result2 = $db->query($sql2);

				
			if ($result2->num_rows > 0){
			
			
				$row = $result2->fetch_row()
			
			
				?>
							
				<div class="card">
				<div class="card-body">
			
				<?php
			
					// echo " <p > ". $row[1] . " .  </p> ";
					echo "  <p > To: ". $row[1] . " .  </p> ";
					echo "  <p > To: ". $row[3] . " .  </p> ";
					echo "  <p > Date: ". $row[7] . " .  </p> ";
					echo "  <p > Message: ". $row[4] . " .  </p> ";
			
					echo "</div>  </div>";
					echo "<br> <br>";
			}

			

			//then we kind we will need to display the results in a certain way using bootstrap - we can leave this 
			//for later and work on the compose and the sent/drafts one

		}


    }
?>

<!-- here we need to display the content -->


	</main>



<?php


	require_once "includes/footer.php";

?>
