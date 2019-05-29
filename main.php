<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TEAM03</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo-icon.png"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="assets/css/magnific-popup.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
    <body>
        <div id="menu-item" class="menu-item hide-menu">
            <div class="container">
                <ul>
                    <a><li>home</li></a>
                    <a><li>about</li></a>
                    <a><li>expertise</li></a>
                    <a><li>workstation</li></a>
                    <a><li>team</li></a>
                    <a><li>contact</li></a>
                    <a><li>Elements</li></a>
                </ul>
            </div>
        </div>
        <div class="main">
            <header class="bg-img header">
                <nav class="navbar navbar-default navbar-ubutia">
                    <div class="container">
                        <div class="navigation-bar">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="logo">
                                        <a><span class="ubutia-icon"></span></a>
                                    </div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="menu m">
                                        <a href="#"><span class="ion-navicon _ion-android-menu"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="row">
                        <div class="intro-box">
                            <div class="intro">
                                <h1>WELCOME</h1>
				<p> 
                                <?php
				session_start();
				$message = "Please Login First";
				if($_SESSION["STATUS"] != "TRUE")
				{
				echo "<SCRIPT type='text/javascript'>
					alert('$message');
					window.location.replace(\"index.php\");
			   	      </SCRIPT>";
				}

				include 'db_connection.php';
				include 'protection.php';
				$conn = OpenCon();	
				if(conn === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				
				$query = "SELECT * FROM users WHERE username = '" . 
				$_SESSION["username"] . "' and password = '" . 
				$_SESSION["pass"] . "'";

				$result = mysqli_query($conn,$query) or die(mysql_error());
				$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);	
				if($objResult){
					$temp = mysqli_query($conn,$query) or die(mysql_error());
					if($temp > 0)
					{
						while($row = mysqli_fetch_array($temp)){
							echo "Your name is " . 
							     $row['firstname'] . " " .$row['lastname'];		
							echo nl2br("\n");	
						}
					}				
				}else{
					echo "....";	
				}
				mysqli_free_result($result);
				?>
				</p>
                                <a class="btn ubutia-btn" href="index.php">try again?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <script src="assets/js/jquery-3.1.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>
