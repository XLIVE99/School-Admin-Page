<?php 
include_once("connect.php");
session_start();
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>E-SHOKUL - Giriş ekranı</title>
</head>

<?php 
if(isset($_POST["loginStdBtn"])){
    $name = $_POST["s_id"];
    $password = $_POST["password"];

    $query = $dbh ->prepare("SELECT STUDENT_NAME FROM student WHERE STUDENT_ID = :name AND STUDENT_PASSWORD = :password");

    $query->bindValue(':name', $name);
    $query->bindValue(':password', $password);

    //Sorgumuzu çalıştırıyoruz
    $query->execute();

    //Tüm verileri çekiyoruz
    $count = $query->fetch(PDO::FETCH_NUM); 
    if($count == null){
        $loginState = "None";
    }else{
        $loginState = "Student";

        $_SESSION['id']=$name;
        $_SESSION['name'] = $count[0];
        $_SESSION['loginState']=$loginState;
        header("Location: main_student.php");
    }
}
else if(isset($_POST["loginTchBtn"]))
{
    $name = $_POST["t_id"];
    $password = $_POST["password"];

    $query = $dbh ->prepare("SELECT TEACHER_NAME FROM teacher WHERE TEACHER_ID = :name AND TEACHER_PASSWORD = :password");

    $query->bindValue(':name', $name);
    $query->bindValue(':password', $password);

    //Sorgumuzu çalıştırıyoruz
    $query->execute();

    //Tüm verileri çekiyoruz
    $count = $query->fetch(PDO::FETCH_NUM);
    if($count == null){
        $loginState = "None";
    }else{
        $loginState = "Teacher";

        $_SESSION['id']=$name;
        $_SESSION['name'] = $count[0];
        $_SESSION['loginState']=$loginState;
        header("Location: main_teacher.php");
    }
}                      
?>

<body>
    <div style="width: 75%; margin: 0 auto; margin-top: 15%; display: flex; justify-content: space-between;">
        <div style="width:30%; display:inline-block; vertical-align: middle;" class="card">
            <h5 class="card-header">Student Login</h5>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="student-id">Student ID</label>
                        <input id="student-id" name="s_id" placeholder="Student Login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input id="inputPassword" name="password" type="password" placeholder="Password" class="form-control">
                    </div>
                    <div style="text-align:center" >
                    <input  href="#" name="loginStdBtn" type="submit" class="btn btn-primary" value="Login"></input>
                        </div>
                </form>
            </div>
        </div>

        <div style="width:30%; display:inline-block; vertical-align: middle;" class="card">
            <h5 class="card-header">Teacher Login</h5>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="teacher-id">Teacher ID</label>
                        <input id="teacher-id" name="t_id" placeholder="Teacher Login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input id="inputPassword" name="password" type="password" placeholder="Password" class="form-control">
                    </div>
                    <div style="text-align:center" >
                    <input  href="#" name="loginTchBtn" type="submit" class="btn btn-primary" value="Login"></input>
                        </div>
                </form>
            </div>
        </div>
    </div>
                             

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>