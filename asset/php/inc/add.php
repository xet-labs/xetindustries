<?php 
	// connect to db
	// include("con_db.php");

	if(isset($_POST['submit'])){

		print_r($_POST) . '<br />';
		echo '<br />';

		// check Name
		if(empty($_POST['name'])){
			echo 'Name is required <br />';
		} else{
			echo htmlspecialchars($_POST['name']) . '<br />';
		}
		
		// check Email
		if(empty($_POST['email'])){
			echo 'Email is required <br />';
		} else{
			echo htmlspecialchars($_POST['email']) . '<br />';
		}

	} // end POST check

?>
