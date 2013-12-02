<?php
	
	$user  = $_POST['user'];
	$pass  = $_POST['password'];
 	//This one are for register a new user
	if(isset($_POST['email']) && isset($_POST['name'])){
		$email = $_POST['email'];
		$name  = $_POST['name'];
		echo register_user($user, $email, $name, $pass);
	}else{
		echo make_login($user, $pass);
	}




	function make_login($user, $pass){
		$table_name = "users";
		$query = "SELECT * FROM ".$table_name." WHERE user_user='".$user."' AND user_pass='".$pass."';";
		$link = return_link();
		$result = make_query($link,$query);
		close_link($link);

		$count = mysqli_num_rows($result);
		if($count = 1){
			session_start();
			$_SESSION['user'] = $user;
			$row = mysqli_fetch_row($result);
			$_SESSION['name'] = $row[1];
		}			
		return $count;
	}

	function register_user($user, $email, $name, $pass){
		$table_name = "users";
		$query  = "INSERT INTO ".$table_name." VALUES ( null, '".$name."', '".$user."', '".$pass."', '".$email."');";
		$link = return_link();		
		if (!mysqli_query($link,$query))
  		{
  			return false;
  			die('Error: ' . mysqli_error($query));
  		}
		close_link($link);
		// Return true if the user was created
		return true;
	}

	/*
	============================================================
		Private MySQL functions 
	============================================================
	*/

	function return_link()
	{
    	
		return mysqli_connect('localhost','root','','phpLoginTestDB');
	}

	function close_link($link)
	{
		mysqli_close($link);
	}

	function make_query($link,$query){
		return mysqli_query($link,$query);
	}

	function get_mysql_error($link){
		return mysqli_error($link);
	}
?>
