<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if CAPTCHA input matches the generated CAPTCHA code
    if ($_POST['captcha_input'] == $_SESSION['captcha']) {
        echo "CAPTCHA verified!";
    } else {
        echo "Incorrect CAPTCHA. Please try again.";
    }
}
?>
