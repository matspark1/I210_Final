 <?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Meal Search Results";
require_once('includes/header.php');
?>
    <div class="search-bar2">
        <form class="meal-search" action="mealsearchresults.php">
            <div class="search-holder">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input class="search-bar" type="text" size="40" />
            </div>

            <input class="submit-search" type="submit" value="↩" />
        </form>
    </div>
    <div class="mealplans">
        <h1>Your <span>Search</span> Results</h1>
        <div class="mealplans-boxes">
            <div class="mealplans-box">
                <img src="images/food2.jpg" />
                <div class="mealplan-desc">
                    <h3>TITLE</h3>
                    <p>PRICE</p>
                    <p>SERVING SIZE</p>
                </div>
                <a href="###">Add to Cart</a>
                <span>Free Shipping <i class="fa-solid fa-truck-fast"></i></span>
            </div>
        </div>
    </div>
    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');
