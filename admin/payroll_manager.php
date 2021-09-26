<?php
    require '../function/db_connect.php';
    session_start();
    $admin_name = $_SESSION["admin_name"];

    if ($admin_name == NULL) {
        header("location: ../admin/");
    }
    $sql = "SELECT * FROM tbl_salary AS s, tbl_employee AS e WHERE s.employee_id=e.employee_id";
    $result = mysqli_query($conn, $sql);
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
                        <li>
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
                        <li>
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
                        <li class="active">
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
                    <script>
                        function check_delete()
                        {
                            var chk = confirm('Are You Want To Delete This');
                            if (chk)
                            {
                                return true;
                            } else
                            {
                                return false;
                            }
                        }
                    </script>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">                   
                                <div class="col-md-12">
                                    <div class="card">
                                        <ol class="breadcrumb">
                                            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                            <li><a href="add_salary.php"><i class="fa fa-globe"></i> Provide New Salary</a></li>
                                            <li class="active">Salary Manager</li>
                                        </ol>
                                        <div class="header">
                                            <h4 class="title">Salary Manager</h4>
                                            <p class="category">Here is you can manage your Employees Salaries</p>
                                        </div>
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>Salary ID</th>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Paid Amount</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>    
                                                        <tr>
                                                            <td>S# <?php echo $row['salary_id'] ?></td>
                                                            <td><?php echo $row['salary_paid_date'] ?></td>
                                                            <td><?php echo $row['employee_name'] ?></td>
                                                            <td><?php echo $row['employee_designation'] ?></td>
                                                            <td><?php echo $row['salary_amount_paid'] ?></td>
                                                            <td>
                                                                <a href="../function/delete_salary.php?id=<?php echo $row['salary_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Salary" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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