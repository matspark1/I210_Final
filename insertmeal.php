<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script inserts a new meal into the database.
 */
require_once('includes/database.php');

$title = $_POST['title'];
$price = $_POST['price'];
$serving_size = $_POST['serving_size'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];


//Insert statement
$sql = "INSERT INTO $tblMeals (title, price, serving_size, category_id, description)
            VALUES ('$title', $price, '$serving_size', $category_id, '$description')";

//Execute query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Insertion failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
} else {
    // Redirect if successful
    header("Location: meals.php");
}
