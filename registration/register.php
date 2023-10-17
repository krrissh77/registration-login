<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["full_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phoneno = $_POST["phone_number"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm_password"];
    
    

    $conn = new mysqli("localhost", "root", "", "niet");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $hashed_password = password_hash($password,PASSWORD_DEFAULT);



    $sql="INSERT INTO registration(Full_name,Username,Email,Phone_number,password,confirm_password) VALUES('$fullname','$username','$email','$phoneno','$password','$confirmpassword')";

    if($conn->query($sql)==TRUE){
        echo "Registration successful";
    }
    else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
    $conn->close();
}
?>