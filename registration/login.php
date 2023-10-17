<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", '', "niet");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "connection failed:";
    }


    $sql = "SELECT * FROM registration WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if($password==$row['password']) {
            echo "Login successful!";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
    $conn->close();
}
?>