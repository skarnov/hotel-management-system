<?php
    session_start();
    require 'function/db_connect.php';

    $sql = "SELECT * FROM tbl_room WHERE room_amount > 0 LIMIT 3";
    $result = mysqli_query($conn, $sql);

    $booked = "SELECT count(room_id) AS booked FROM tbl_booking ";
    $booked_result = mysqli_query($conn, $booked);
    $room_booked = mysqli_fetch_assoc($booked_result);

    $available = "SELECT SUM(room_amount) AS available FROM tbl_room ";
    $available_result = mysqli_query($conn, $available);
    $room_available = mysqli_fetch_assoc($available_result);

    $room = "SELECT count(room_id) AS room_type FROM tbl_room ";
    $room_type = mysqli_query($conn, $room);
    $room_type_number = mysqli_fetch_assoc($room_type);

    $name = filter_input(INPUT_POST, 'name');
    $mobile = filter_input(INPUT_POST, 'mobile');
    $complain = filter_input(INPUT_POST, 'complain');
?>
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
        <div class="banner">
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
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
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
        <div class="hod">
            <div class="container">
                <div class="col-md-6 hod-left">
                    <img src="images/14.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-md-6 hod-right">
                    <h2>Welcome To Evis Hotel</h2>
                    <p>In Evis Hotel business and leisure blend together. Enjoying an unrivalled location, overlooking the Bay of Bengal and sitting in the laps of hills, we offer deluxe accommodation in 181 well appointed guest rooms and suites.</p>
                    <p>The panoramic view of the ocean, the majestic hills and the natural beauty of the tamarisk trees are all wonderfully complemented by luxury facilities and Bangladeshi hospitality.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="tels">
            <div class="container">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>  
                     <div class="col-md-4 tels-left">
                        <h4><?php echo $row['room_name'] ?></h4>
                        <img src="admin/<?php echo $row['room_image'] ?>" class="img-responsive" alt="">
                        <p><?php echo $row['room_description'] ?></p>
                        <p style="font-weight: bolder;">Price: <?php echo $row['room_price'] ?></p>
                        <a class="hvr-shutter-in-horizontal" href="booking.php?id=<?php echo $row['room_id'] ?>">Book Now</a>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="special">
            <div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                    <div class="rou-left">
                        <a href="#"><i class="fa fa-truck"></i></a>
                    </div>
                    <div class="rou-rgt wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                        <h3><?php echo $room_booked['booked']; ?></h3>
                        <p>Booked Room</p>
                    </div>
                    <div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
                    <div class="rou-left">
                            <a href="#"><i class="fa fa-user"></i></a>
                    </div>
                    <div class="rou-rgt">
                        <h3><?php echo $room_available['available']; ?></h3>
                        <p>Available Rooms</p>
                    </div>
                    <div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                    <div class="rou-left">
                        <a href="#"><i class="fa fa-ticket"></i></a>
                    </div>
                    <div class="rou-rgt">
                        <h3><?php echo $room_type_number['room_type']; ?></h3>
                        <p>Room Type</p>
                    </div>
                    <div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
            </div>
        </div>
        <div class="quick">
            <div class="container">
                <div class="col-md-8 quick-left">
                    <h3>News & Events</h3>
                    <div class="new">
                        <div class="n-lft">
                            <h5>10</h5>
                            <h6>Sep</h6>
                        </div>
                        <div class="n-rgt">
                            <p>We started operating our Fitness Room as follows. We hope that you would enjoy this facility for your better stay.<a href="#">More</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="new-1">
                        <div class="n-lft">
                            <h5>15</h5>
                            <h6>Sep</h6>
                        </div>
                        <div class="n-rgt">
                            <p>Our Fitness Room is available for the staying guests aged 16 and over only. All users would wear appropriate attire and footwear.<a href="#">More</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 quick-left">
                    <h3>Complain Box</h3>
                    <form accept-charset="" method="POST">
                        <?php
                            if (!empty($name))
                            {
                                $sql = "INSERT INTO tbl_complain (name, mobile, complain) VALUES ('$name', '$mobile', '$complain')";
                                echo "<h1 style='color:red;'>We will contact you soon</h1>";
                            }
                            mysqli_query($conn, $sql);
                        ?>
                        <input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value === '') {this.value = 'Name';}" />
                        <input type="text" name="mobile" value="Mobile" onfocus="this.value = '';" onblur="if (this.value === '') {this.value = 'Mobile';}" />
                        <textarea name="complain" placeholder="" onfocus="this.value = '';" onblur="if (this.value === '') {this.value = 'Message';}">Put Your Complain here ...</textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="clearfix"></div>
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
                <p>© 2016 Evis Hotel Management System. All Rights Reserved </p>
            </div>
        </div>
    </body>
</html>