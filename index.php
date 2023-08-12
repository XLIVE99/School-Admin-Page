<?php 
session_start();

$logState = $_SESSION['loginState'];
if($logState == "Teacher")
    header("Location: main_teacher.php");
else if($logState == "Student")
    header("Location: main_student.php");
else
    header("Location: login.php");
?>