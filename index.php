<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Plateful";
require_once('includes/header.php');
?>

    <div class="home-hero">
        <h1>EAT <span>FRESH</span></h1>
        <h2><span>Fresh meals made for you, everyday</span></h2>
        <a href="meals.php">Find Your Perfect Meal</a>
    </div>
    <div class="savings-banner">
        <div class="savings-per">
            <h1>25% OFF</h1>
        </div>
        <div class="savings-text">
            <h2><i class="fa-solid fa-fire"></i> Site Wide Sale</h2>
            <p>only applies to orders that are over $100</p>
        </div>
        <div class="savings-per">
            <h1>25% OFF</h1>
        </div>
    </div>

    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');
