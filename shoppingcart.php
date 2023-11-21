<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Shopping Cart";
require_once('includes/header.php');
?>

    <div class="shoppingcart-wrapper">
        <h3>My Shopping Cart</h3>
        <div class="cart-wrapper">
            <div class="cart">
                <div class="cart-item-box">
                    <img src="images/food2.jpg" />
                    <div class="item-desc">
                        <h3>TITLE</h3>
                        <div class="serving-size">
                            <h2>Serving Size</h2>
                            <p>SIZE</p>
                        </div>

                        <input type="number" value="1" placeholder="SERVING SIZE" />
                        <p class="sub">SUBTOTAL</p>
                    </div>
                    <i class="fa-solid fa-x"></i>
                </div>
            </div>
            <div class="pricing">
                <h1>Cart Summary</h1>
                <div class="cart-sum">
                    <div class="price-sum">
                        <h2>Subtotal</h2>
                        <h2>Tax</h2>
                        <h2>Shipping</h2>
                        <h2>Discount</h2>
                    </div>
                    <div class="prices">
                        <h2>SUB</h2>
                        <h2>TAX</h2>
                        <h2>SHIPPING</h2>
                        <h2>DISCOUNT</h2>
                    </div>
                </div>
                <div class="order-total">
                    <h2>Order Total</h2>
                    <h2 class="order-total-number">TOTAL</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');

