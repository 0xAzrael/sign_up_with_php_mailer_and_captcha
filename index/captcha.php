<?php
// Start session
session_start();

// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Generate a random CAPTCHA code (6 characters long)
$captcha_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

// Store the generated CAPTCHA in session for later verification
$_SESSION['captcha'] = $captcha_code;

// Create the image (200px by 50px)
$image = imagecreatetruecolor(200, 50);

// Define colors for background, text, and decorations
$background_color = imagecolorallocate($image, 255, 255, 255); // white background
$text_color = imagecolorallocate($image, 0, 0, 0); // black text
$line_color = imagecolorallocate($image, 64, 64, 64); // gray lines
$pixel_color = imagecolorallocate($image, 0, 0, 255); // blue dots

// Fill the background with white color
imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

// Add random lines for CAPTCHA security
for ($i = 0; $i < 5; $i++) {
    imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
}

// Add random pixels to make the CAPTCHA more secure
for ($i = 0; $i < 500; $i++) {
    imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
}

// Add the text to the image using the built-in font for testing purposes
imagestring($image, 5, 50, 15, $captcha_code, $text_color);

// Set the content type to display the image as PNG
header('Content-Type: image/png');

// Output the image
imagepng($image);

// Free memory
imagedestroy($image);
?>
