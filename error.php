<?php
/**
 * Author: Matthew Sparkman
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Error";
require_once('includes/header.php');

$error='Default error';
if (filter_has_var(INPUT_GET, "m")) {
    $error = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);
}
?>

<div class="error-container" style="height: 700px">
    <i class="fa-solid fa-circle-exclamation"></i>
    <div class="error-msg" >
        <h3>Sorry, but an error has occured.</h3>
        <p><?= $error ?></p>
    </div>
</div>
<!-- page footer for copyright information -->
<?php
include('includes/footer.php');
