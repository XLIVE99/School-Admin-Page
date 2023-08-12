<!doctype html>
<html lang="en">
 <?php
    include_once("connect.php");
    include_once("access_student.php");
 ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-SHOKUL - Settings</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">

    <link rel="stylesheet" href="assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="assets/vendor/inputmask/css/inputmask.css" />

<style>
label:hover{
    color:#FF407B;
}
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="main_student.php">E-Shokul</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?=$_SESSION['name'];?></h5>
                                </div>
                                <div class="list-group-item">
                                    <i class="fas fa-cog mr-2"></i><a class="btn" href="student_settings.php">Settings</a>
                                </div>
                                <form method="post">
                                <div class="list-group-item">
                                    <i class="fas fa-power-off mr-2"></i>
                                    <label for="exit" class="btn btn-sm" href="#">Log Out</label>
                                    <input type="submit" id="exit" name="logoutBtn" style="visibility: hidden" value="Log Out">
                                </div>
                                <?php
                                    if(isset($_POST["logoutBtn"]))
                                    {
                                        session_destroy();
                                        header("Location:login.php");
                                    }
                                ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Personal<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="main_student.php">Main Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="student_settings.php">Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Settings</h2>
                            <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Personal</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Settings</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Current Password</label>
                                <input id="inputText3" name="old_p" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">New Password</label>
                                <input id="inputText3" name="new_p1" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">New Password (Again)</label>
                                <input id="inputText3" name="new_p2" type="password" class="form-control">
                            </div>
                            <div class="d-flex">
                                <div class="toolbar ml-auto">
                                    <input type="submit" name="setPassword" class="btn btn-primary btn-sm" value="Change Password"></input>
                                </div>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST["setPassword"]))
                            {
                                $query = $dbh ->prepare("SELECT STUDENT_PASSWORD from student WHERE STUDENT_ID = :st_id");
                                            
                                $query->bindValue(':st_id', $_SESSION['id']);

                                $query->execute();
                            
                                //Tüm verileri çekiyoruz
                                $count = $query->fetch(PDO::FETCH_NUM); 

                                $arrVal = array_values($count);
                                $old_pass = $arrVal[0];
                                
                                $i_oldP = trim($_POST['old_p']);
								$is_valid = true;
                                if(empty($i_oldP))
                                {
                                    echo "<p style=\"color:#dc3545;\">Enter current password!</p>";
                                    $is_valid = false;
                                }
                                else if($i_oldP != $old_pass)
                                {
                                    echo "<p style=\"color:#dc3545;\">Current password is wrong!</p>";
                                    $is_valid = false;
                                }
                                $i_newP1 = trim($_POST['new_p1']);
                                $i_newP2 = trim($_POST['new_p2']);
                                if(empty($i_newP1))
                                {
                                    echo "<p style=\"color:#dc3545;\">New password can't be empty!</p>";
                                    $is_valid = false;
                                }
                                else if($i_newP1 != $i_newP2)
                                {
                                    echo "<p style=\"color:#dc3545;\">New passwords are not matching!</p>";
                                    $is_valid = false;
                                }
                                
								if($is_valid)
								{
									$query = $dbh ->prepare("UPDATE student SET STUDENT_PASSWORD = :new_p WHERE STUDENT_ID = :st_id");

									$query->bindValue(':new_p', $i_newP1, PDO::PARAM_STR);
									$query->bindValue(':st_id', $_SESSION['id']);

									//Sorgumuzu çalıştırıyoruz
									$query->execute();
									echo "<p style=\"color:#28a745;\">Password changed successfully</p>";
								}
                            }
                        ?>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html>