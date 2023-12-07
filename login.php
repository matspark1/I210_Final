<?php
/**
 * Author: Matthew Sparkman
 * Date: 12/5/2023
 * File: login.php
 * Description:
 */
//code from database.php
require_once('includes/database.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//variable login status.
$_SESSION['login_status'] = 2;

//initialize variables for username and password
$username = $passcode = "";

//username and password 
if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//validate username and password

$sql = "SELECT * FROM users WHERE username= '$username='$username AND password= $password";
$query= $conn->query($sql);
if ($query->num_row) {
$row =$query-> fetch_assoc();
  $_SESSION['login] = $username;
  $_SESSION['role'] =$row['role];
  $_SESSION['name] =$row['firstname'];
  $_SESSION['login_status] = 1;

}
