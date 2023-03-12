<?php 
session_start(); 
include "config.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
}
	$email_id = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email_id)) {
		header("Location: index.php?error=Email Id is required");
	    exit();
	}
	else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}
	
	
	
		$sql = "SELECT * FROM login WHERE email='$email_id' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		

			

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email_id && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];
            	// $_SESSION['name'] = $row['name'];
            	$_SESSION['password'] = $row['password']; 
            	header("Location: home.php");
		        exit();
            }
			
		
		}

		if(mysqli_num_rows($result) === 0){
			header("Location: index.php?error=Incorect User name or password");
			exit();
		}
		
		else{
			header("Location: index.php");
	        exit();
		}
			

	