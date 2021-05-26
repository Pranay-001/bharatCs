<?php 

session_start();
if(!isset($_SESSION['name'])){
	//$_name2=$_SESSION['name'];
    session_destroy();
	header('location:index.php');
}	
if(in_array('alert',$_SESSION) && $_SESSION['alert']){
    $_SESSION['alert']=false;
    ?>
    <script type="text/javascript">
        alert("Petition Successfully Registered");
    </script>
    <?php
}
?>

<!--  <html>
 <head>			
 	<title>Home page</title>
 </head>
 <body>

 	<a href="index.php">LOGOUT</a>
 	<h1>Welcome <?php echo $_SESSION['name'];?></h1>
</body>
</html>
 -->
<!DOCTYPE html>
<html lang="zxx">
<head>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQNNBA95JaKp7JXZUXTmAOUwsfd3o7vAz_vcA&usqp=CAU"/>

<!-- 		<script language="javascript" type="text/javascript">
	window.history.forward();
</script> -->
    <meta charset="UTF-8">
    <meta name="description" content="Specer Template">
    <meta name="keywords" content="Specer, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHO Bharat Crypto Sign | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="search-btn search-switch">
            <i class="fa fa-search"></i>
        </div>
        <div class="header__top--canvas">
            <div class="ht-info">
                <ul>
                    <li>20:00 - May 19, 2019</li>
                    <li><a href="#">Sign in</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="ht-links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-vimeo"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <ul class="main-menu mobile-menu">
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./club.html">Club</a></li>
            <li><a href="./schedule.html">Schedule</a></li>
            <li><a href="./result.html">Results</a></li>
            <li><a href="#">Sport</a></li>
            <li><a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="./blog.html">Blog</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                    <li><a href="#">Schedule</a></li>
                    <li><a href="#">Results</a></li>
                </ul>
            </li>
            <li><a href="./contact.html">Contact Us</a></li>
        </ul>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <!-- <header class="header-section">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ht-info">
                            <ul>
                                <li>20:00 - May 19, 2019</li>
                                <li><a href="#">Sign in</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ht-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-vimeo"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="header__nav" style="background-color: lightgrey;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html"><img src="images/bharatsign.jpg" height=100rem alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <ul class="main-menu">
                                <li class="active"><a href="./index.html">Home</a></li>
                                <li><a href="./club.html">Club</a></li>
                                <li><a href="./schedule.html">Schedule</a></li>
                                <li><a href="./result.html">Results</a></li>
                                <li><a href="#">Sport</a></li>
                                <li ><a  href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a  href="./blog.html">Blog</a></li>
                                        <li><a  href="./blog-details.html">Blog Details</a></li>
                                        <li><a  href="#">Schedule</a></li>
                                        <li><a href="#">Results</a></li>
                                    </ul>
                                </li>
                                <li><a href="./contact.html">Contact Us</a></li>
                                <li><a style="color: royalblue;" href="logout.php">LOGOUT</a></li>
                            </ul>
                            <!-- <div class="fs-widget"> -->
                                
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fw800/background/20190831/pngtree-cartoon-superhero-policeman-with-red-cape-image_311198.jpg" style=" background-size: 100% 100%; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hs-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="hs-text">
                                        <h4 style="color:white;"><?php $timezone = date_default_timezone_get();
                                        date_default_timezone_set('Asia/Kolkata');
                                        $date = date('Y/m/d H:i:s');
										echo $date; ?></h4>
                                        <h2 style="color: aliceblue; font-family: serif;">Welcome <?php echo $_SESSION['name']; //$_SESSION['name']=$_name2;?></h2>
                                        <a href="viewfirShoown.php" style="margin: 50px;" class="primary-btn">View your FIRs</a>
                                        <a style="margin: 50px;" href="fir.php" class="primary-btn">File an FIR</a>
                                        <a href="viewfirSp.php" style="margin: 50px;" class="primary-btn">View Area FIRs</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   
       <!--  <div class="container">
            <div class="copyright-option">
               
            </div>
        </div> -->
    <!-- </footer> -->
    <!-- Footer Section End -->

  

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main1.js"></script>
</body>

</html>