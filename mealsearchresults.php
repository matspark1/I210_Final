 <?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Meal Search Results";
require_once('includes/header.php');
require_once('includes/database.php');

 //retrieve search term
 if(!filter_has_var(INPUT_GET, 'mealsearch')){
     $error = 'There was no search term found.';
     $conn->close();
     header("Location: error.php?m=$error");
     exit;
 }

 $term = filter_input(INPUT_GET,'mealsearch');

 $terms = explode(" ", $term);

 //select statement
 $sql = "SELECT title, price, category, serving_size, id, image 
FROM $tblMeals, $tblCategory 
WHERE $tblMeals.category_id = $tblCategory.category_id AND ";

 foreach($terms as $t){
     $sql .= "title LIKE '%$t%' AND ";

 }

 $sql = rtrim($sql, 'AND ');

 //exit($sql);

 $query = $conn->query($sql);
 //error handling
 if(!$query){
     $error = 'Selection failed.' . $conn->error;
     $conn->close();
     header("Location: error.php?m=$error");
     exit;
 }

 if($query->num_rows === 0){
     echo "Your search '$term' did not match any books in our collection.";
     include 'includes/footer.php';
     exit;
 }
 ?>
    <div class="search-bar2">
        <form class="meal-search" action="mealsearchresults.php">
            <div class="search-holder">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input name="mealsearch" class="search-bar" type="text" size="40" />
            </div>

            <input class="submit-search" type="submit" value="↩" />
        </form>
    </div>
    <div class="mealplans">
        <h1>Your <span>Search</span> Results</h1>
        <div class="mealplans-boxes2">
            <?php while ($row = $query->fetch_assoc()){ ?>
                <div class="mealplans-box">
                    <img src="<?=$row['image']?>" />
                    <div class="mealplan-desc">
                        <h3><a class="mealtitle" href="mealdetails.php?id=<?=$row['id']?>"><?=$row['title']?></a></h3>
                        <p>$<?= $row['price'] ?></p>
                        <p>Serving Size: <?= $row['serving_size'] ?></p>
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
