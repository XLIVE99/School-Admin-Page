<?php 
session_start();

$logState = $_SESSION['loginState'];
if($logState == "None" || $logState == "Teacher")
{
    header("Location: pages/404-page.html");
}
?>