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
 $sql = "SELECT $tblMeals.*, $tblCategory.Category
FROM $tblMeals, $tblCategory 
WHERE $tblMeals.category_id = $tblCategory.category_id AND ";

 foreach($terms as $t){
     $sql .= "(title LIKE '%$t%' OR $tblCategory.Category LIKE '%$t%') AND ";;

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

 if ($query->num_rows === 0) {
     echo "<form class='meal-search' action='mealsearchresults.php' style='margin-top: 202px'>
        <div class='search-holder'>
            <i class='fa-solid fa-magnifying-glass'></i>
            <input name='mealsearch' class='search-bar' type='text' size='40' />
        </div>
        <input class='submit-search' type='submit' value='↩' />
    </form>
    <div class='searchresult-box' style='min-height: 600px; display: flex; align-items: center; justify-content: center;'>
        <p style='font-size: 24px; color: #fff'>Your search '$term' did not match any meals in our collection.</p>
    </div>";
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
                     <a class="editbutton" title="Edit" href="editmeal.php?id=<?=$row['id']?>"
                     ><i class="fa-solid fa-pen-to-square"></i
                         ></a>
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
