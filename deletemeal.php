<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays a confirmation page for deleting a meal.
 */
$page_title = "Confirm Deletion";
require_once('includes/header.php');
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

//Get meal details
$sql = "SELECT * FROM $tblMeals WHERE id=$id";

$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}

$row = $query->fetch_assoc();

//Check if meal is not found
if (!$row) {
    $error = "Meal not found.";
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}
?>
<div class="deletemeal-container">
    <h1>Confirm Deletion</h1>
    <p>Are you sure you want to delete this meal?</p>
    <div class="delete-msg">
        <img src="<?=$row['image']?>" alt="<?=$row['title']?>" />
        <h4><?=$row['title']?></h4>
    </div>
    <p>This action cannot be undone.</p>
    <div class="cancelbuttons">
        <a href="mealdetails.php?id=<?=$id?>">Cancel</a>
        <a href="removemeal.php?id=<?=$id?>">Delete</a>
    </div>
</div>
<?php
include('includes/footer.php');
$conn->close(); //Exit database
?>
