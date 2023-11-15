<?php
/**
 * Author: Matthew Sparkman
 * Date: 11/15/2023
 * File: database.php
 * Description:
 */

//set mysql error report mode
mysqli_report(MYSQLI_REPORT_ERROR);
//define parameters
$host = "localhost";
$login = "phpuser"; //use different account if necessary
$password = "phpuser"; //use the correct password for the account
$database = "prepmeal_db"; //database name
$tblMeals = "prepmeals";
$tblCategory = "categories";
$tblUser = "users";
$tblRole = "roles";


//connect to the mySQL server
$conn = @new mysqli($host, $login, $password, $database);


//Handle connection errors
if ($conn->connect_errno) {
    $error = $conn->connect_error;
    header("Location: ../error.php?m=$error");
    die();
}