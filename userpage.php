<?php
	session_start();

	$user = $_SESSION['user'];
	$user_name = $_SESSION['name'];
  echo "-----------------------------";
  echo $user;
	if (!isset($user)){
    session_destroy();
		//header('Location: index.php');
	}

	include_once getcwd() . '/system/Site.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php Site::printSystemTitle(); ?></title>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="userpage.php"><?php Site::printSystemTitle(); ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="userpage.php">Home</a></li>           
              <li><a href="signout.php">Sign Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container"> 
		
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <center><h1><?php Site::printTitle(); ?></h1></center>
        <p>Welcome, <?php echo $user_name; ?>.</p>	
        <p>You have manage to enter to your main page</p>
        <br>
        <p>Du har ind i denne fantastiske webapplikation.<br></p>
      </div>

      <hr>

      <footer>
        <p>&copy; <?php Site::printAuthor(); ?></p>
      </footer>

    </div> <!-- /container -->
	</body>
</html>