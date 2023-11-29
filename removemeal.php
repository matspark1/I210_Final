<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script removes a meal from the database.
 */
require_once('includes/database.php');

//Check meal id
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "Meal ID not found.";
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}

//Get meal id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Delete statement
$sql = "DELETE FROM $tblMeals WHERE id=$id";

//Execute query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Deletion failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}

//Redirect after success
header("Location: meals.php");

$conn->close();//Exit database
?>
