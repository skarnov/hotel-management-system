<?php
    session_start();
    require 'function/db_connect.php';
    $package_id = filter_input(INPUT_GET, 'id');
    $order_amount = filter_input(INPUT_GET, 'p');
    $booking_name = filter_input(INPUT_POST, 'booking_name');
    $booking_mobile = filter_input(INPUT_POST, 'booking_mobile');
    $checkin_date = filter_input(INPUT_POST, 'checkin_date');
    $checkout_date = filter_input(INPUT_POST, 'checkout_date');
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
                                <li class="active"><a href="contact.php">Contact</a></li>
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
        <!-- Start Date Piker -->
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <script src="js/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#datepicker,#datepicker1").datepicker();
            });
        </script>
        <!-- End Date Piker -->
        <div class="details">
            <div class="container">
                <div class="col-md-7">
                    <h2>Evis Hotel</h2>
                    <form action="" method="POST">
                        <?php
                        if (!empty($booking_name)) {
                            $booking_sql = "INSERT INTO tbl_package (package_id, booking_name, booking_mobile, checkin_date, checkout_date, order_amount)
                                VALUES ('$package_id', '$booking_name', '$booking_mobile', '$checkin_date', '$checkout_date', '$order_amount')";

                            if ($conn->query($booking_sql) === TRUE) {
                                $last_id = $conn->insert_id;
                                $income_sql = "INSERT INTO tbl_income (income_received_amount, booking_id)
									VALUES ('$order_amount', '$last_id')";
                            }

                            echo "<h1 style='color:red;'>We will contact you soon</h1>";
                            mysqli_query($conn, $income_sql);
                        }
                        ?>
                        <div class="form-group">
                            <label></label>
                            <input type="text" name="booking_name" placeholder="Enter Your Name" class="form-control" style="width: 70%;">
                            <input type="hidden" name="room_id" value="<?php echo $row['room_id'] ?>">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="text" name="booking_mobile" placeholder="Enter Your Mobile Number" class="form-control" style="width: 70%;">
                        </div>
                        <div class="form-group">
                            <input type="text" name="checkin_date" id="datepicker" class="date" value="Check In Date" onfocus="this.value = '';" onblur="if (this.value === '') {
                                        this.value = 'Check In Date';
                                    }" style="width: 70%;">
                        </div>
                        <div class="form-group">
                            <input type="text" name="checkout_date" id="datepicker1" class="date1" value="Check Out Date" onfocus="this.value = '';" onblur="if (this.value === '') {
                                        this.value = 'Check Out Date';
                                    }" style="width: 70%;">
                            <input type="hidden" name="order_amount" value="<?php echo $row['room_price'] ?>">
                        </div>
                        <button type="submit" class="btn btn-danger">Done</button>
                    </form>
                </div>
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
                <p>© 2016 Evis Hotel. All Rights Reserved </p>
            </div>
        </div>
    </body>
</html>