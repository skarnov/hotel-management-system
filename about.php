<!DOCTYPE HTML>
<html>
    <head>
        <title>Evis Hotel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />	
        <script src="js/jquery-1.11.1.min.js"></script>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,600' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </head>
    <body>
        <div class="banner1">
            <div class="header">
                <div class="container">
                    <div class="logo">
                        <h1><a href="index.php">Evis Hotel</a></h1>
                    </div>
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Home</a></li>
                                <li class="active"><a href="about.php">About</a></li>
                                <li><a href="room.php">Rooms</a></li>
                                <li><a href="package.php">Packages</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <?php
                                if (isset($_SESSION["user_id"])) {
                                    ?>
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="../evis_hotel_management_system/function/logout_user.php">Logout</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="signup.php">Signup</a></li>
                                    <li><a href="login.php">Login</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </nav>
                    <div class="search-box">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Search...." type="search" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"> </span>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <script src="js/classie.js"></script>
                    <script src="js/uisearch.js"></script>
                    <script>
                        new UISearch(document.getElementById('sb-search'));
                    </script>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="container">
                <div class="col-md-7 details-left">
                    <img src="images/16.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-md-5 details-right">
                    <span>About Us</span>
                    <p>Evis Hotel is almost on the Bay at Cox's Bazar. From the balcony of this hotel, both the view and roar of sea waves may be experienced. Evis Hotel began its journey in 1998. Not only was the site chosen but the building was also constructed considering adequate open air and sunlight. In other words this premises was constructed to give the feel of a home. Like a big family house everyone can see each other from its long corridors. This hotel maintains a balance between luxuriousness and affordability.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="col-md-2 deco">
                    <h4>Navigation</h4>
                    <li><a href="room.php">Rooms</a></li>
                    <li><a href="package.php">Packages</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </div>
                <div class="col-md-2 deco">
                    <h4>Links</h4>
                    <li><a href="#">Airport</a></li>
                    <li><a href="#">Coxbazar</a></li>
                    <li><a href="#">Bus Service</a></li>
                    <li><a href="#">Taxi Service</a></li>
                </div>
                <div class="col-md-2 deco">
                    <h4>Social</h4>
                    <div class="soci">
                        <li><a href="#"><i class="f-1"> </i></a></li>
                        <li><a href="#"><i class="t-1"> </i></a></li>
                        <li><a href="#"><i class="g-1"> </i></a></li>
                    </div>
                </div>
                <div class="col-md-3 cardss">
                    <h4>Payment Method</h4>
                    <li><i class="visa"></i></li>
                    <li><i class="ma"></i></li>
                    <li><i class="paypal"></i></li>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-3 pos">
                    <h4>NewsLetter</h4>
                    <form method="post">
                        <input type="text" class="textbox" value="Email" onfocus="this.value = '';" onblur="if (this.value === '') { this.value = 'Email';}">
                        <div class="smt">
                            <input type="submit" value="Subscribe">
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>© 2016 Evis Hotel. All Rights Reserved </p>
            </div>
        </div>
    </body>
</html>