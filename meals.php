<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Meals";
require_once('includes/header.php');
?>
    <h1 class="search-label">Search for your favorite meals</h1>
    <form class="meal-search" action="mealsearchresults.php">
        <div class="search-holder">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input class="search-bar" type="text" size="40" />
        </div>

        <input class="submit-search" type="submit" value="↩" />
    </form>
    <div class="mealplans">
        <h1>Our <span>Fresh</span> Meals</h1>
        <div class="mealplans-boxes">
            <div class="mealplans-box">
                <img src="images/food2.jpg" />
                <div class="mealplan-desc">
                    <h3><a class="mealtitle" href="">TITLE</a></h3>
                    <p>PRICE</p>
                    <p>SERVING SIZE</p>
                </div>
                <a href="###" class="addcartBtn">Add to Cart</a>
                <span>Free Shipping <i class="fa-solid fa-truck-fast"></i></span>
            </div>
        </div>
    </div>
    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');

