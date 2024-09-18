<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPTCHA Example</title>
</head>
<body>
    <form action="verify.php" method="post">
        <p>Please enter the CAPTCHA code:</p>
        <img src="captcha.php" alt="CAPTCHA">
        <input type="text" name="captcha_input" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
