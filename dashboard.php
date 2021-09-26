<?php
    require 'function/db_connect.php';

    session_start();
    $user_id = $_SESSION["user_id"];

    if ($user_id == NULL) {
        header("location: http://localhost/evis_hotel_management_system/login.php");
    }

    $sql = "SELECT * FROM tbl_room AS r, tbl_booking AS b WHERE user_id='$user_id' AND r.room_id=b.room_id";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Evis Hotel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
                                <li><a href="about.php">About</a></li>
                                <li><a href="room.php">Rooms</a></li>
                                <li><a href="package.php">Packages</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <?php
                                if (isset($_SESSION["user_id"])) {
                                    ?>
                                    <li class="active"><a href="dashboard.php">Dashboard</a></li>
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
        <!-- User Log in Table-->
        <div class="container-fluid">
            <div id="table-info">
                <div class="col-md-12">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-border table-striped">
                            <thead>
                                <th>Room Name</th>
                                <th>Room Image</th>
                                <th>Checkin Date</th>
                                <th>Checkout Date</th>
                                <th>Amount</th>                      
                                <th>Price</th>                      
                                <th>Action</th>           
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $row['room_name'] ?></td>
                                        <td><img src="admin/<?php echo $row['room_image'] ?>" class="img-responsive" style="height:100px; width:200px;"></td>
                                        <td><?php echo $row['checkin_date'] ?></td>
                                        <td><?php echo $row['checkout_date'] ?></td>
                                        <td><?php echo $row['order_amount'] ?></td>
                                        <td><?php echo $row['room_price'] ?></td>
                                        <td>
                                            <a href="function/delete_booking_user.php?id=<?php echo $row['booking_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Booking" onclick="return check_delete();">Cancel Booking</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End User Log in Table -->
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
                    <li><a href="http://www.us-banglaairlines.com/" target="_blank">Airport</a></li>
                    <li><a href="https://www.tripadvisor.com/ShowUserReviews-g667467-d1882664-r332546068-Long_Beach_Hotel-Cox_s_Bazar_Chittagong_Division.html" target="_blank">Coxbazar</a></li>
                    <li><a href="https://www.shohoz.com/" target="_blank">Bus Service</a></li>
                    <li><a href="https://taxi-en.cybo.com/BD/cox's-bazar-district/taxis/" target="_blank">Taxi Service</a></li>
                </div>
                <div class="col-md-2 deco">
                    <h4>Social</h4>
                    <div class="soci">
                        <li><a href="https://www.facebook.com/HOTEL-Decent-231988593882435/" target="_blank"><i class="f-1"> </i></a></li>
                        <li><a href="hoteldecent85 @ gmail.com" target="_blank"><i class="t-1"> </i></a></li>
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
                    <h4>News Letter</h4>
                    <form method="post">
                        <input type="text" class="textbox" value="Email" onfocus="this.value = '';" onblur="if (this.value === '') {
                                    this.value = 'Email';
                                }">
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
                <p>© 2016 Hotel Decent. All Rights Reserved </p>
            </div>
        </div>
    </body>
</html>