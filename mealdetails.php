<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Meal Details";
require_once('includes/header.php');
require_once ('includes/database.php');

if(!filter_has_var(INPUT_GET, 'id')){
    $error = "Your request connot be processed since there was a problem with the Book ID";
    $conn->close();
    header("Locations: error.php?m=$error");
    exit;
}

//retrieve book id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql =  "SELECT $tblMeals.*, $tblCategory.Category
 FROM $tblMeals, $tblCategory
 WHERE $tblMeals.category_id = $tblCategory.category_id
 AND id=$id";


//execute query
$query = $conn->query($sql);

//handle errors
if(!$query){
    $error = "Selection Failed: " . $conn->error;
    $conn->close();
    header("Locations: error.php?m=$error");
    exit;
}

$row = $query->fetch_assoc();
if(!$row){
    $error = "Book not found,";
    $conn->close();
    header("Locations: error.php?m=$error");
    exit;
}
?>

    <div class="details-wrapper">
        <div class="meal-img">
            <img src="<?=$row['image']?>" alt="<?=$row['title']?>">
        </div>
        <div class="meal-description">
            <h2><?=$row['title']?></h2>
            <h4><?= $row['Category'] ?></h4>
            <p>Serving Size: <?= $row['serving_size'] ?></p>
            <p><?= $row['description'] ?></p>
        </div>
    </div>
    </div>

    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');
