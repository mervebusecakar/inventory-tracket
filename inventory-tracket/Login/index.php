
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Log In</h1>
            </div>
            <form action="connect.php" method="post">
                <div class="login-form">
                    <div class="custom-select">
                        <select name="adminoruser" id="adminoruser">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="control-group">
                        <input type="text" name="username" class="login-field" placeholder="username" id="login-name" required>
                    </div>
                    <div class="control-group">
                        <input type="password" name = "password" class="login-field" placeholder = "password" id="login-pass" 
                         required>
                    </div>
                    <button href="index.php" name = "login" class="btn btn-primary btn-large btn-block">Log In</buttona>
                   
                </div>
            </form>
            <a href="signup.php"> <button href="signup.php" name="signup" class="btn btn-primary btn-large btn-block">Sign Up</button></a>
        </div>
    </div>

</body>
</html>