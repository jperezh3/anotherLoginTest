<?php
  //Required by all pages
  session_start();

  if (isset($user)){
    header('Location: userpage.php');
  }else{
    session_destroy();
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
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>

	<body>
  <!-- For the header, the navigation bar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#"><?php Site::printSystemTitle(); ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a data-toggle="modal" href="#signup">Sign Up</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="email" id="txtUserLogIn" placeholder="E-mail">
              <input class="span2" type="password" id="txtPasswordLogin" placeholder="Password">
              <button type="button" class="btn" id="btnLogin">Log In</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- For the login errors -->
    <div id="loginErrorModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Log In Error</h3>
		</div>
			<div class="modal-body">
				<div class="alert alert-error">
					<p id="errorLoginMsg"></p>
				</div>
			</div>

			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
    </div>

    <!-- Sign up modal window -->
	<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Sign Up</h3>
		</div>
		<div class="modal-body">
			<p>If you need an accout please fill the next data</p>
			<input type="text" id="txtNameSgnUp" class="span3" placeholder="Real Name">
      <br>
      <input type="text" id="txtUserSgnUp" class="span3" placeholder="User Name">
      <br>
			<input type="email" id="txtEmailSgnUp" class="span3" placeholder="E-mail">
			<br>
			<input type="password" id="txtPassword1SgnUp" class="span3" placeholder="Password">
      <br>
			<input type="password" id="txtPassword2SgnUp" class="span3" placeholder="Password Confirmation">
      <br>
      <!-- Error -->
      <div class="alert alert-error fade in" id="signup-error" style="display:none;">
        <p id="signUpError"></p>
      </div>
      <!-- To close the modal -->
      <div class="alert alert-success fade in" id="signup-success" style="display:none;">
        <button type="button" class="close">x</button>
        <p id="signUpData"></p>
      </div>
    <!-- Good messages -->
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnSignUpClose">Close</button>
			<button class="btn btn-warning" id="btnSignUpClean">Clear Form</button>
			<button class="btn btn-primary" id="btnSignUp">Sign Up</button>
		</div>
	</div>


  <div class="container"> 
		
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <center><h1><?php Site::printTitle(); ?></h1></center>
        <br>
        <p>This is a simple login web application for Fynske Medier test.</p>
        <p>The graphical design was made using twitter bootstrap, which helps to make pages more fancy and beautifull</p>	
      </div>

      <hr>

      <footer>
        <p>&copy; <?php Site::printAuthor(); ?></p>
      </footer>
    </div>
  </div> <!-- /container -->
	</body>
</html>