﻿<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	include("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Get-a-Pet</title>


    <link href="bootstrap.min.css" rel="stylesheet" >
    <link href="navbar-static-top.css" rel="stylesheet">
    <link href="css/homeimages.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
  
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

    <!-- NAVBAR
    ================================================== -->
    <style>
        /* use navbar-wrapper to wrap navigation bar, the purpose is to overlay navigation bar above slider */
        .navbar-wrapper {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 51px;
        }
        .navbar-wrapper > .container {
            padding: 0;

        }

        @media all and (max-width: 768px ){
            .navbar-wrapper {
                position: relative;
                top: 0px;

            }
        }
    </style>
    <div class="navbar-wrapper">
        <div class="container">

            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0px;">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Get-a-Pet</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                             
                             <li><a href="homepage.php">Home</a></li>

                             <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Find A Pet <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                             <li><a href="find a dog.php">Find a Dog</a></li>
                             <li><a href="find a cat.php">Find a Cat</a></li>
                             <li><a href="find other animal.php">Find Other<br> Animals</a></li>
                             </ul>
                             </li>

                              <li><a href="petblog.php">Blog</a></li>

                             <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Healthcare <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                             <li><a href="doghealthcare.php">Dog Healthcare</a></li>
                             <li><a href="cathealthcare.php">Cat Healthcare</a></li>
                   
                             </ul>
                             </li>


                             <li><a href="training.php">Training</a></li>
                             <li><a href="Support.php">Support</a></li>
</ul>

                             <ul class="nav navbar-nav navbar-right"> 
                             <li>
hi' <?php echo $userRow['username']; ?>&nbsp;</li><li><a href="logout.php?logout">Sign Out</a>
</li>
                             
                             </ul>
                             </li>
                    
                             </ul>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>

    



    <div id="cbp-fwslider" class="cbp-fwslider">
				<ul>
					<li><a href="#"><img src="images/labby.jpg" alt="labby"/></a></li>
					<li><a href="#"><img src="images/catslider.jpg" alt="img02"/></a></li>
					<li><a href="#"><img src="images/parrslider.jpg" alt="img03"/></a></li>
					<li><a href="#"><img src="images/hedgedog.jpg" alt="img04"/></a></li>
					<li><a href="#"><img src="images/naturedog.jpg" alt="img05"/></a></li>
				</ul>
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.cbpFWSlider.min.js"></script>
		<script>
			$( function() {
				/*
				- how to call the plugin:
				$( selector ).cbpFWSlider( [options] );
				- options:
				{
					// default transition speed (ms)
					speed : 500,
					// default transition easing
					easing : 'ease'
				}
				- destroy:
				$( selector ).cbpFWSlider( 'destroy' );
				*/

				$( '#cbp-fwslider' ).cbpFWSlider();

			} );
		</script>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <hr class="featurette-divider">

        <div class="row featurette" style="background-color:#F5ECCE;">
            <div class="col-md-5">
                <h2 class="featurette-heading" style="font-weight:bold; font-size:35px; color:#00000;">Welcome To Get-a-Pet.com</h2>
                <p class="lead"><br><br><br>We believe that animals, as living creatures, have a value beyond economic measurement, and are entitled to legal, moral and ethical consideration and protection.

                Get-a-Pet is a non-profitable organization, independently chartered organization that is not affiliated with any other humane society.
                 </a></p>
                
            </div>
            <div class="col-md-7">
            <img  src="../images/tom.jpg" alt="cat" style="width:700px;height:500px;">

             </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette" style="background-color:#F5ECCE;">
            <div class="col-md-5">
                <img  src="../images/smallcat.jpg" alt="cat" style="width:480px;height:500px;">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading" style="font-weight:bold; font-size:35px;">ABOUT US</h2>
                <div class="lead" style="border: 1px ; white-space: nowrap;">
                  <p class="lead">
                     
                     Get-a-Pet is an independent, nonprofit animal welfare organization serving<br>the community since 2015. We run programs, help people find sutiable<br>pets of their choice, sell various pet products and services like Cruelty<br> Investigations, Disaster Animal Response Team, Humane Education and a <br>variety of shelter services.We believe that animals, as living creatures, have<br> value beyond economic measurement, and are entitled to legal, moral and <br>ethical consideration and protection. We does not receive funding from any <br>federal, state orlocal government agency. Financial support for the<br> organization’s humane programs is provided solely by donations from <br>individuals, corporations, and foundations.<br><br><br><br>

                     
                    </a></p>
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette" style="background-color:#F5ECCE;">
            <div class="col-md-5">
                <h2 class="featurette-heading" style="font-weight:bold; font-size:35px;">OUR MOTTO</h2>
                <div class="lead" style="white-space: nowrap;">
                     <p class="lead">Get-a-Pet provides legal as well as moral and ethical <br>consideration and protection to animals, as they are<br>living things beyond economic measurement. Pets <br>World will not abandon its mission as long as animals <br>are in need of an advocate.We will look after and care <br>for each animal as if we care for our fellow human <br>beings.   

                    </a></p>
                </div>
            </div>
            <div class="col-md-7">
            <img  src="../images/dogcat.jpg" alt="parrot" style="width:700px;height:500px;">

            </div>
        </div>

        <hr class="featurette-divider">

  <div class="row featurette" style="background-color:#F5ECCE;">
            <div class="col-md-5">
                <h2 class="featurette-heading" style="font-weight:bold; font-size:35px;">CONTACT</h2>
                <div class="lead" style="white-space: nowrap;">
                    <p class="lead">Do you have any questions for us?<br><a href="save_contact_form1.php" color="black";>Contact Us Today!</a>

                    </p>
                </div>
            </div>
          
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->




        <!-- FOOTER -->
        <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; PETS WORLD 2015. &middot; <a href="#">Privacy</a> &middot; </p>
        </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>

    
</body>
</html>