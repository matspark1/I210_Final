<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Meals";
require_once('includes/header.php');
require_once('includes/database.php');

// Select statement
$sql = "SELECT $tblMeals.*, $tblCategory.Category 
        FROM $tblMeals, $tblCategory 
        WHERE $tblMeals.category_id = $tblCategory.category_id";

// Execute query
$query = $conn->query($sql);

// Handling errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>
<h1 class="search-label">Search for your favorite meals</h1>
<form class="meal-search" action="mealsearchresults.php" method="get">
    <div class="search-holder">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input name="mealsearch" class="search-bar" type="text" size="40" />
    </div>
    <input class="submit-search" type="submit" value="↩" />
</form>
<div class="mealplans">
    <h1>Our <span>Fresh</span> Meals</h1>
    <div class="mealplans-boxes">
        <?php while ($row = $query->fetch_assoc()) { ?>
            <div class="mealplans-box">
                <img src="<?= $row['image'] ?>" />
                <div class="mealplan-desc">
                    <h3>
                        <a class="mealtitle" href="mealdetails.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a>
                    </h3>
                    <p>$<?= $row['price'] ?></p>
                    <p>Serving Size: <?= $row['serving_size'] ?></p>
                    <!-- Edit button -->
                    <div style="text-align: center;">
                        <a href="editmeal.php?id=<?= $row['id'] ?>" class="editButton">Edit</a>
                    </div>
                </div>
                <a href="###" class="addcartBtn">Add to Cart</a>
                <span>Free Shipping <i class="fa-solid fa-truck-fast"></i></span>
            </div>
        <?php } ?>
    </div>
</div>
<!-- page footer for copyright information -->
<?php
include('includes/footer.php');
?>
