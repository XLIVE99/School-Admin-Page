<?php 
session_start();

$logState = $_SESSION['loginState'];
if($logState == NULL || $logState == "None" || $logState == "Student")
{
    header("Location: pages/404-page.html");
}
?>