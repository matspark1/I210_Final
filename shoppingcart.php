<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Shopping Cart";
require_once('includes/header.php');
require_once('includes/database.php');

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='emptycart' style='height: 800px; display: flex; flex-direction: column; align-items: center; justify-content: center'>
            <p>Your cart is empty.</p></div>";
    include('includes/footer.php');
    exit();
}

// Proceed since the cart is not empty
$cart = $_SESSION['cart'];
$totalSubtotal = 0; // Initialize totalSubtotal

?>

<div class="shoppingcart-wrapper">
    <h3>My Shopping Cart</h3>
    <div class="cart-wrapper">
        <div class="cart">

            <?php
            // Add code to display the shopping cart content
            // Select statement
            $sql = "SELECT * FROM prepmeals WHERE id IN (" . implode(',', array_keys($cart)) . ")";
            $query = $conn->query($sql);

            // Fetch meals
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $qty = $cart[$id];
                $subtotal = $qty * $price;
                $totalSubtotal += $subtotal; // Accumulate subtotal
                ?>
                <!-- Display cart item here -->
                <div class="cart-item-box">
                    <img src="<?= $row['image'] ?>" />
                    <div class="item-desc">
                        <h3><a style="color: #66B650" href='mealdetails.php?id=<?= $id ?>'><?= $title ?></a></h3>
                        <div class="serving-size">
                            <h2>Serving Size</h2>
                            <p><?= $row['serving_size'] ?></p>
                        </div>
                        <input type="number" value="<?= $qty ?>" placeholder="Quantity" />
                        <p style="font-size: 22px" class="sub">$<?= number_format($subtotal, 2) ?></p>
                    </div>
                    <i class="fa-solid fa-x"></i>
                </div>
            <?php } ?>
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
                <?php
                $totalTax = 0; // Initialize totalTax
                $totalShipping = 0; // Initialize totalShipping
                $totalDiscount = 0; // Initialize totalDiscount

                // Calculate totalTax, totalShipping, totalDiscount (add your business logic here)
                $totalTax = 0.07 * $totalSubtotal; // Example: 7% tax
                // Calculate shipping, apply discounts based on business logic

                if ($totalSubtotal >= 100) {
                    $totalDiscount = $totalSubtotal * 0.25;
                }

                // Calculate Order Total
                $orderTotal = $totalSubtotal + $totalTax + $totalShipping - $totalDiscount;
                ?>
                <div class="prices">
                    <h2>$<?= number_format($totalSubtotal, 2) ?></h2>
                    <h2>$<?= number_format($totalTax, 2) ?></h2>
                    <h2>$<?= number_format($totalShipping, 2) ?></h2>
                    <h2>$<?= number_format($totalDiscount, 2) ?></h2>
                </div>
            </div>
            <div class="order-total">
                <h2>Order Total</h2>
                <h2 class="order-total-number">$<?= number_format($orderTotal, 2) ?></h2>
            </div>
            <div class="checkoutbtn" style="width: 100%; display: flex; align-items: center; justify-content: center; margin-top: 10px">
            <a class="addcartBtn" href="checkout.php">Checkout</a>
            </div>
        </div>
    </div>
</div>

<!-- page footer for copyright information -->
<?php
include('includes/footer.php');
?>
