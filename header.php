<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Khadok</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	<link href="css/login.css" rel="stylesheet">
    
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</head>

	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<body>

<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/khadok">Khadok</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/khadok">Home</a></li>
        <li><a href="restaurants.php">Restaurants</a></li>
       
      </ul>
	  
      <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
        <div class="form-group">
          <input type="text" name="key" class="form-control" placeholder="Search">
        </div>
        <button type="submit" name="search" class="btn btn-default">Submit</button>
      </form>
	  
      <ul class="nav navbar-nav navbar-right">
        
		<?php if(!isset($_SESSION['email'])){ ?>
		<li><a href="signup.php">Sign up</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Login 
								 <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" name="Umail" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" name="Upass" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             
										</div>
										<div class="form-group">
											 <button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>
										</div>
										
								 </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="signup.php"><b>Sign up</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
		<?php } else{ ?>
		<li><a href="logout.php">Logout</a></li>
		<?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
