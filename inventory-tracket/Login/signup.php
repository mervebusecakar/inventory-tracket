
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
                    
                    <div class="control-group">
                        <input type="text" name="firstName" class="login-field" placeholder="First Name" id="firstName" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="text" name = "lastName" class="login-field" placeholder = "Last Name" id="lastName" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="tel" name = "phoneNumber" class="login-field" placeholder = "Phone Number" id="phoneNumber"
                        pattern="[0-9]{3} [0-9]{3} [0-9]{4]" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="email" name = "email" class="login-field" placeholder = "Email" id="login-pass" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="password" name="password" class="login-field" placeholder="Password" id="login-name"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="password" name = "passwordAgain" class="login-field" placeholder = "Password Again" id="login-pass"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="text" name = "studentNumber" class="login-field" placeholder = "Student Number" id="login-pass" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="text" name = "faculty" class="login-field" placeholder = "Faculty" id="login-pass" required>
                        <span></span>
                    </div>
                    <div class="control-group">
                        <input type="text" name = "department" class="login-field" placeholder = "Department" id="login-pass" required>
                        <span></span>
                    </div>
                   
                    <button href="signup.php" name="signup" class="btn btn-primary btn-large btn-block">Sign Up</button>
                </div>

            </form>
            <a href="index.php"> <button href="index.php" name = "login" class="btn btn-primary btn-large btn-block">Log In</button></a>
        </div>
    </div>

</body>
</html>