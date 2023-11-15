<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Meals";
require_once('includes/header.php');
?>
    <div class="contact-hero">
        <h2>Contact Us</h2>
    </div>
    <div class="contact">
        <form action="">
            <input type="text" placeholder="Your name.." required />
            <input type="email" placeholder="Email Address.." required />
            <input type="text" placeholder="Phone Number.." />
            <input type="text" placeholder="Company.." />
            <textarea placeholder="Message.." required></textarea>
            <input type="submit" value="Submit" class="submitBtn" />
        </form>
    </div>
    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');
