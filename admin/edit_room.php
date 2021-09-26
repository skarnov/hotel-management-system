<?php
    session_start();
    $admin_name=$_SESSION["admin_name"];

    if ($admin_name == NULL)
    {
        header("location: login.php");
    }
    require '../function/db_connect.php';
    $room_id = filter_input(INPUT_GET, 'id');
    $sql = "SELECT * FROM tbl_room WHERE room_id='$room_id'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $room_name = filter_input(INPUT_POST, 'room_name');
    $room_description = filter_input(INPUT_POST, 'room_description');
    $room_price = filter_input(INPUT_POST, 'room_price');
    $room_amount = filter_input(INPUT_POST, 'room_amount');
    $update_sql = "UPDATE tbl_room SET room_name='$room_name', room_description='$room_description', room_price='$room_price', room_amount='$room_amount' WHERE room_id='$room_id' ";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>HMS Admin</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="dashboard.php" class="simple-text">
                            HMS Admin
                        </a>
                    </div>
                    <ul class="nav">
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="pe-7s-graph"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="../index.php" target="_blank">
                                <i class="pe-7s-news-paper"></i>
                                <p>View Website</p>
                            </a>
                        </li>
                        <li>
                            <a href="admin_manager.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Admin Manager</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="room_manager.php">
                                <i class="pe-7s-photo"></i>
                                <p>Room Manager</p>
                            </a>
                        </li>
                        <li>
                            <a href="booking_manager.php">
                                <i class="pe-7s-repeat"></i>
                                <p>Booking Management</p>
                            </a>
                        </li>
                        <li>
                            <a href="hrm_manager.php">
                                <i class="pe-7s-science"></i>
                                <p>HRM Manager</p>
                            </a>
                        </li>
                        <li>
                            <a href="payroll_manager.php">
                                <i class="pe-7s-calculator"></i>
                                <p>Payroll Manager</p>
                            </a>
                        </li>
                        <li>
                            <a href="income_manager.php">
                                <i class="pe-7s-cart"></i>
                                <p>Income Management</p>
                            </a>
                        </li>
                        <li>
                            <a href="expense_manager.php">
                                <i class="pe-7s-expand1"></i>
                                <p>Expense Management</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="dashboard.php">
                                        <i>Welcome! </i> <?php echo $_SESSION["admin_name"] ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="../function/logout.php">
                                        Logout
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <ol class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                        <li><a href="room_manager.php"><i class="fa fa-globe"></i> Manage Rooms</a></li>
                                        <li class="active">Edit Room</li>
                                    </ol>
                                    <div class="header">
                                        <h4 class="title">Edit Room</h4>
                                    </div>
                                    <div class="content">
                                        <form action="" method="POST" name="edit_room">
                                            <?php
                                                if (!empty($room_name)) {
                                                    if (mysqli_query($conn, $update_sql)) {
                                                        echo "Update record created successfully";
                                                    } else {
                                                        echo "Error: " . $update_sql . "<br>" . mysqli_error($conn);
                                                    }
                                                }
                                            ?>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Room Name</label>
                                                        <input type="text" name="room_name" value="<?php echo $row['room_name']?>" class="form-control">
                                                        <input type="hidden" name="room_id" value="<?php echo $row['room_id']?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="room_description" class="form-control"><?php echo $row['room_description']?></textarea>
                                                    </div>        
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="number" name="room_price" value="<?php echo $row['room_price']?>" class="form-control">
                                                    </div>        
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input type="number" name="room_amount" value="<?php echo $row['room_amount']?>" class="form-control">
                                                    </div>        
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill">Edit Room</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="add_employee.php">
                                        Add New Employee
                                    </a>
                                </li>
                                <li>
                                    <a href="add_salary.php">
                                        Provide New Salary
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            Copyright &copy; <a href="">Evis Hotel Management System</a> All Rights Reserved.
                        </p>
                    </div>
                </footer>
            </div>
        </div>
    </body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>