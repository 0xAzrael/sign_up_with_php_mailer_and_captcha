<?php
session_start();
include '../connection/conn.php';

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_otp'])) {
    $otp_input = $_POST['otp'];
    $email = $_SESSION['email'];

    // Check if the OTP matches for the given email
    $sql = "SELECT * FROM user_tbl WHERE email='$email' AND otp='$otp_input'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // OTP is correct, mark user as verified
        $update_sql = "UPDATE user_tbl SET is_verified=1 WHERE email='$email'";
        mysqli_query($conn, $update_sql);

        // Unset the session variable and redirect to login
        unset($_SESSION['email']);
        echo "<script>alert('Your email has been verified. You can now log in.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Invalid OTP. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OTP Verification</title>
</head>
<body>
    <div id="container">
        <form method="post" action="otp_verification.php">
            <label for="otp">Enter OTP:</label><br>
            <input type="text" name="otp" placeholder="Enter the OTP sent to your email" required><br><br>

            <input type="submit" name="verify_otp" value="Verify"><br><br>
        </form>
    </div>
</body>
</html>
