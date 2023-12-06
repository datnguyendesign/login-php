<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>

    <!-- Link css -->
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
    <!-- Require Header -->
    <?php 
        require "header.php";
    ?>

    <main>

        <!-- Login section -->
        <div class="login">
            <h1>Login</h1>
            <form action="db.php" method="post">
                <input type="text" name="username" id="username" placeholder="Mobile Number">
                <input type="password" name="login_password" id="login_password" placeholder="Password">
                <input type="submit" value="Login" name="login">
            </form>
        </div>

        <!-- Register section -->
        <div class="register">
            <h1>Register</h1>
            <form action="db.php" method="post">
                <input type="text" name="firstname" id="firstname" placeholder="First Name" required>
                <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" required>
                <input type="password" name="register_password" id="register_password" placeholder="Password" required>
                <input type="password" name="re_password" id="re_password" placeholder="Re-type Password" required>
                <input type="submit" value="Register" id="register" name="register">
            </form>
        </div>
    </main>
    
    <footer>
        <div id="message">
            <span>
                <?php 
                    if (@$_GET["message"] != null) {
                        echo @$_GET["message"];
                    }
                ?>
            </span>
        </div>
    </footer>
</body>
</html>