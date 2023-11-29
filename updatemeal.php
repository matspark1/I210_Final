<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script updates the details of a meal in the database.
 */
require_once('includes/database.php');

//Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = $_POST['title'];
    $price = $_POST['price'];
    $serving_size = $_POST['serving_size'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    //Update meal
    $sql = "UPDATE $tblMeals 
            SET title='$title', price=$price, serving_size='$serving_size', category_id=$category_id, description='$description'
            WHERE id=$id";

    //Execute query
    $query = $conn->query($sql);

    //Handle errors
    if (!$query) {
        $error = "Update failed: " . $conn->error;
        $conn->close();
        header("Location: error.php?m=$error");
        exit;
    }

    //Redirect if successful
    header("Location: mealdetails.php?id=$id");
} else {
    //Redirect if not successful
    header("Location: meals.php");
}

$conn->close();//Exit database
?>
