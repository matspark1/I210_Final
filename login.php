<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Login";
require_once('includes/header.php');
?>

    <div class="account-wrapper">
        <div class="login-wrapper">
            <h1>Login Here!</h1>
            <form id="loginForm">
                <input
                        type="text"
                        placeholder="Email Address:"
                        class="login-input"
                        required
                />
                <input
                        type="password"
                        placeholder="Password:"
                        class="login-input"
                        required
                />
                <input type="submit" value="LOGIN" class="login"/>
            </form>
        </div>
        <div class="login-wrapper">
            <h1>Sign up!</h1>
            <form id="signupForm">
                <input
                        type="text"
                        placeholder="First Name:"
                        class="login-input"
                        required
                />
                <input
                        type="text"
                        placeholder="Last Name:"
                        class="login-input"
                        required
                />
                <input
                        type="text"
                        placeholder="Email Address:"
                        class="login-input"
                        required
                />
                <input
                        type="password"
                        placeholder="Password:"
                        class="login-input"
                        required
                />
                <input type="submit" value="SIGN UP" class="signup"/>
            </form>
        </div>
    </div>

    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');