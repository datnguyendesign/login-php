<?php 
    
    require_once "connection.php";

    // Insert data during login
    @$username = $_POST["username"];
    @$login_password = $_POST["login_password"];

    // Insert data during registration
    @$firstname = $_POST["firstname"];
    @$lastname = $_POST["lastname"];
    @$email = $_POST["email"];
    @$phonenumber = $_POST["phonenumber"];
    @$register_password = $_POST["register_password"];
    @$re_password = $_POST["re_password"];

    if (isset($_POST["login"])) {
        $sql = "SELECT * FROM register WHERE phonenumber = $username AND password = '$login_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            setcookie("client_id", $row["client_id"], time()+(86400*30), "/");
            $message = "You are logged in";
        } else {
            $message = "Register first then you can login";
        }

        header('Location:home.php?message='.$message);
    }

    if (isset($_POST["register"])) {
        if ($register_password === $re_password) {
            $sql = "INSERT INTO register(firstname, lastname, email, phonenumber, password) 
                    VALUES ('$firstname', '$lastname', '$email', $phonenumber, '$register_password')";
            if ($conn->query($sql)) {
                $message = "Registered";
            } else {
                $message = "Can not register";
            }
        } else {
            $message = "Re-type password doesn't match with password";
        }

        header('Location:home.php?message='.$message);
    }

?>