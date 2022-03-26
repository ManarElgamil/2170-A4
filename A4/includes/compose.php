
<!-- I think we need to leave this as is an just include it in index.php, if phpself = compose.php,
But we will first implement it then see, so this will be in the index -->

<?php

//linking files, because we started the session in header we don't need to start it again
	require_once "header.php";
?>


<?php

session_start();
require_once "db.php";

$_SESSION['token'] = hash("sha3-512", session_id());


?>

<!-- This html code is taken from bootstrap, check citations -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>MailYoda!</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

  

    <!-- Bootstrap core CSS -->
 <link href="css/bootstrap/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style> 

    
    <!-- Custom styles for this template -->
    <link href="../css/bootstrap/headers/headers.css" rel="stylesheet">
    <link href="../css/bootstrap/sign-in/signin.css" rel="stylesheet"> 
 </head>
  <body >

  
<main class="container text-center"  >

  <form method="post"  action="compose.php">
    <h1 class="h3 mb-3 fw-normal">Compose email</h1>
    <div class="form-floating">
      <input type="text" name="email-to" class="form-control mb-4" id="floatingInput" placeholder="first name" required>
      <label for="floatingInput">To Email</label>
    </div>
    <div class="form-floating">
      <input type="text" name="email-from" class="form-control mb-4" id="floatingInput" placeholder="last name" required>
      <label for="floatingInput">From Email</label>
    </div>

    <div class="form-floating">
      <input type="text" name="i-subject" class="form-control mb-4" id="floatingInput" placeholder="last name" required>
      <label for="floatingInput">Email Subject: </label>
    </div>

    <div class="form-floating">
      <textarea type="text" name="i-message" class="form-control mb-4" id="floatingInput" placeholder="last name" required></textarea>
      <label for="floatingInput">Message</label>
    </div>

    <input type="hidden" name="token" class="form-control mb-4" value="<?php echo $_SESSION['token']; ?>">

    <button class="w-100 btn btn-lg btn-primary mb-4" name="send-email" value="Log in" type="submit">Send Email</button>
    <button class="w-100 btn btn-lg btn-primary mb-4" name="send-email" value="Log in" type="submit">Encrypt and Send Email</button>
    <button class="w-100 btn btn-lg btn-primary mb-4" name="send-email" value="Log in" type="submit">Encrypt and Save</button>
    <button class="w-100 btn btn-lg btn-primary mb-4" name="send-email" value="Log in" type="submit">Save</button>
    <button class="w-100 btn btn-lg btn-primary mb-4" name="send-email" value="Log in" type="submit">Cancel</button>
    
  
  </form>

    </main>


    <!-- Then over here we need to actually do all the checks using regex -->


    
	<!-- DEBUGGING: ADD THE HASHED PASSWORD FEATURE HERE FOR SECURITY 

    * First we sanitize the data,
    * Then we verify that the submitted data has the required form using regex
    * Lastly we insert into the database
  -->

<?php

//checking if the form isset
if (isset($_REQUEST['register-info'])) {

	// (1) sanitizing the data submitted from the form
  $fname = sanitizeData($_REQUEST['i-fname']);

  $lname = sanitizeData($_REQUEST['i-lname']);
  $email = sanitizeData($_REQUEST['i-email']);

  $password = sanitizeData($_REQUEST['i-password']);

  // (2) verifying they have the correct pattern using regex

  //checking if the names start with a capital letter
  $regexName = "/^[A-Z]+/";

  //if they don't we redirect with an error message
  if (!(preg_match($regexName, $fname) == 1 && preg_match($regexName, $lname) == 1 )){
    header("location:register.php?Invalid-First-name-or-Last-name");
  }

  //checking if email ends in the correct way

  $regexEmail = "/(dal.ca$)|(theforce.org$)|(jediacademy.edu$)/";    //|$theforce.org|$dal.ca/";

  if (!(preg_match($regexEmail, $email) == 1)){

    header("location:register.php?Invalid-Email");
  }


  //then we insert in the database


  //do this properly in the morning, and find out how to hash the passwords in the db
	$sql = "INSERT INTO `je_login`VALUES (null,'{$email}' , '{$password}')";
	$result = $db->query($sql);

  echo "result1: \n";
  print_r($result);

  //then we get login id, so we can insert the user first name and last name in users, and across the other databases

  $sql2 = "SELECT * FROM `je_login` WHERE je_login_email='$email'";
  $result2 = $db->query($sql2);

  //building all the variables we would need and putting them in the session's super global array
  //so we can have access to it on other wepages (header and index)
  if ($result2->num_rows > 0){

    $row =  $result2->fetch_row();
    $loginId = $row[0];
 
    $sql3 = "INSERT INTO `je_users` VALUES (null, '{$fname}' ,'{$lname}', '{$loginId}' ,'0', '0')";
    $result3 = $db->query($sql3);

    echo "result2: \n";
    print_r($result3); 


  }


	//building all the variables we would need and putting them in the session's super global array
	//so we can have access to it on other wepages (header and index)
	//redirecting to index, which will redirect to login, as the user is still not logged in
//	header("location:index.php");

}	

else {

 // header("location:index.phpInvalidEmailOrPassword");
}


  require_once "footer.php";
?>
