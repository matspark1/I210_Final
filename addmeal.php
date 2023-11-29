<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays a form for adding a new meal.
 */
$page_title = "Add Meal";
require_once('includes/header.php');
require_once('includes/database.php');

$sql = "SELECT * FROM $tblCategory";

//execute query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Category not found" . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>
<br>
<br>
<br>
<div style="text-align: center;">
    <h1>Add a New Meal</h1>
</div>
<form action="insertmeal.php" method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" required />

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" required />

    <!-- Serving size dropdown -->
    <label for="serving_size">Serving Size:</label>
    <select name="serving_size" required>
        <option value="1">1 Person</option>
        <option value="2">2 People</option>
        <option value="3">3 People</option>
        <option value="4">4 People</option>
        <option value="5">5 People</option>
    </select>

    <!-- Use categories from the database -->
    <label for="category_id">Category:</label>
    <select name="category_id" required>
        <?php while ($rowCategory = $query->fetch_assoc()) { ?>
            <option value="<?= $rowCategory['category_id'] ?>"><?= $rowCategory['Category'] ?></option>
        <?php } ?>
    </select>

    <label for="description">Description:</label>
    <textarea name="description" rows="4" required></textarea>

    <input class="submit-addmeal" type="submit" value="Add Meal" />
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include('includes/footer.php');
$conn->close();//quit database
?>
