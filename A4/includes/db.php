<?php

// Code taken from group Assignment 3

ob_start();

    // (1) Sanitize form data input
  	function sanitizeData($inputData) {
		$returnValue = trim($inputData);
		$returnValue = htmlspecialchars($returnValue);
		$returnValue = stripslashes($returnValue);

		return $returnValue;
	}

  // Create new DB connection object

	//  Database code taken from lecture 07 Feb 2022 example-forms file on brightspace.
	$db = new mysqli("localhost", "root", "root", "jedi_encrypted_email");
	if ($db->connect_error) {
		die("Nope, not connected!" . $db->connect_error);
	}

?>