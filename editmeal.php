<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays a form for editing a meal.
 */
$page_title = "Edit Meal";
require_once('includes/header.php');
require_once('includes/database.php');

//Check meal id
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "No meal id found.";
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}

//Get meal id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Select meal details
$sql = "SELECT $tblMeals.*, $tblCategory.Category 
        FROM $tblMeals, $tblCategory 
        WHERE $tblMeals.category_id = $tblCategory.category_id
        AND id=$id";

//Execute query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}

$row = $query->fetch_assoc();

//Check meal
if (!$row) {
    $error = "No meal found.";
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}
?>

<h1 class="crudpage">Edit Meal</h1>
<div class="meal-databaseform">
    <form action="updatemeal.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>" />
        <input
                type="text"
                name="title"
                value="<?= $row['title'] ?>"
                placeholder="Name of the meal"
                required
        />
        <input
                type="text"
                name="image"
                value="<?= $row['image'] ?>"
                placeholder="An image URL of the meal"
                required
        />
        <input
                type="number"
                name="price"
                step="0.01"
                value="<?= $row['price'] ?>"
                placeholder="Price of the meal"
                required
        />
        <select name="serving_size" required>
            <option value="1" <?= ($row['serving_size'] == 1) ? 'selected' : '' ?>>1 Person</option>
            <option value="2" <?= ($row['serving_size'] == 2) ? 'selected' : '' ?>>2 People</option>
            <option value="3" <?= ($row['serving_size'] == 3) ? 'selected' : '' ?>>3 People</option>
            <option value="4" <?= ($row['serving_size'] == 4) ? 'selected' : '' ?>>4 People</option>
            <option value="5" <?= ($row['serving_size'] == 5) ? 'selected' : '' ?>>5 People</option>
        </select>
        <select name="category_id" required>
            <?php
            //Get categories
            $sql = "SELECT * FROM $tblCategory";
            $Categories = $conn->query($sql);

            //Handle errors
            if (!$Categories) {
                $error = "Category not found" . $conn->error;
                $conn->close();
                header("Location: error.php?m=$error");
                exit;
            }

            while ($rowCategory = $Categories->fetch_assoc()) {
                $selected = ($row['category_id'] == $rowCategory['category_id']) ? 'selected' : '';
                echo "<option value='{$rowCategory['category_id']}' $selected>{$rowCategory['Category']}</option>";
            }
            ?>
        </select>
        <textarea name="description" required><?=$row['description']?></textarea>
        <input class="databatesubmit" type="submit" value="Update Meal" />
    </form>
</div>

<?php
    include('includes/footer.php');
    $conn->close(); //Exit database
?>
