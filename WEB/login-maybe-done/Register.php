<?php

require '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = trim($_POST["Name_rq"]);
    $Password = trim($_POST["Password_rq"]);
    $Email = trim($_POST["Email_rq"]);
    $Number = trim($_POST["Number_rq"]);
    $Address = trim($_POST["Address_rq"]);

    // ma hoa pass
    $hashed_password = Password_hash($Password, PASSWORD_DEFAULT);

    // $conn = new mysqli("localhost", "username", "password", "database_name");

    $sql = "INSERT INTO users (Username, Password, Email, Number ,Address) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn ,$sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "sssis", $Username , $hashed_password, $Email, $Number, $Address);
        if (mysqli_stmt_execute($stmt)) {
            // echo("Success!");
            header("Location: ../form-home/ASM1.html");
            exit();
        }
        else {
            echo "ket noi khong thanh cong" . mysql_connect_error();
        }
    mysqli_stmt_close($stmt);
    }
    else{
        echo "ket noi khong thanh cong 123". mysql_connect_error();
    }
}
mysqli_close($conn);
