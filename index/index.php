<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
      <form action="reg_func.php" method="POST">
            <label for="username">Username:</label><br>
                  <input type="text" name="username" placeholder="Enter Username" required><br><br>
      
                  <label for="email">Email:</label><br>
                  <input type="text" name="email" placeholder="Enter Your Email" required><br><br>
      
                  <label for="password">Password:</label><br>
                  <input type="password" name="password" placeholder="Enter Password" required><br><br>

                  <img src="captcha.php" alt="CAPTCHA">
                  <input type="text" name="captcha_input" required>
      
                  <input type="submit" name="register" value="Register"><br><br>
                       
      </form>
</body>
</html>