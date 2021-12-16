<?php
 
    if (isset($_POST["verify_email"]))
    {
        $email = "sanjuofficail01@gmail.com";
        $verification_code = $_POST["verification_code"];
 
        $conn = mysqli_connect("localhost:3306", "root", "", "crypto");
 
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
		echo $sql;
		// die();

        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
        }
 
        header("Location: index.html");
        exit();
    }
 
?>


<!DOCTYPE html>
<head>
	<title>Create Account</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-gray">
	<header id="header">
		<nav class="navbar navbar-fixed-top" role="banner">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
			  <a class="navbar-brand" href="index.html">Crypto</a>
			</div>
			<div class="collapse navbar-collapse navbar-right">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#header">Home</a></li>
				<li><a href="#feature">Feature</a></li>
				<li><a href="#gallery">Wallet</a></li>
				<li><a href="#pricing">Price & Plan</a></li>
				<li><a href="#our-team">Our Team</a></li>
				<li><a href="#contact">Contact</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
	  </header>
	
	<div class="container1">
		<h1 class="margin-bottom-15">SignUp</h1>
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="#" method="post">
				<div class="form-inner">
			        <div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="username" class="control-label">Veification code</label>
                        <input type="hidden" name="email" value  = "<?php echo $_GET['email']; ?>" required>
			            <input type="text" class="form-control"  name="verification_code" placeholder="" required>		            		            		            
			          </div>
			                     
			        </div>
			       
			  
			        <div class="form-group">
			          <div class="col-md-12">
                      <input type="submit" name="verify_email" value="Verify Email">
						 
			            <!-- <a href="dashboard1.html" type="submit" value="Create account" class="btn btn-info">Create account</a>
			            <a href="signin.html" class="pull-right">Login</a> -->
			          </div>
			        </div>	
				</div>				    	
		      </form>		      
		</div>
	</div>
	<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	      </div>
	      	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
</body>
</html>