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
    <h1 class="crudpage">Add a New Meal</h1>

<div class="meal-databaseform">
    <form action="insertmeal.php" method="post">
        <input
                type="text"
                name="title"
                placeholder="Name of the meal"
                required
        />
        <input
                type="text"
                name="image"
                placeholder="An image URL of the meal"
                required
        />
        <input
                type="number"
                name="price"
                step="0.01"
                placeholder="Price of the meal"
                required
        />
        <select name="serving_size" required>
            <option value="1">1 Person</option>
            <option value="2">2 Person</option>
            <option value="3">3 Person</option>
            <option value="4">4 Person</option>
            <option value="5">5 Person</option>
        </select>
        <select name="category_id" required>
            <?php while ($rowCategory = $query->fetch_assoc()) { ?>
                <option value="<?= $rowCategory['category_id'] ?>"><?= $rowCategory['Category'] ?></option>
            <?php } ?>
        </select>
        <textarea name="description" rows="5" required></textarea>
        <input class="databatesubmit" type="submit" value="Add Meal" />
    </form>
</div>


<?php
include('includes/footer.php');
$conn->close();//quit database
?>
