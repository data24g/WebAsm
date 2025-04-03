<?php
require '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["Email_DN"]);
    $password = trim($_POST["Password_DN"]);

    $sql = "SELECT Password FROM users WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $hashed_password);
            mysqli_stmt_fetch($stmt);


            // Kiểm tra mật khẩu
            if (password_verify($password, $hashed_password)) {
                echo ("checkkk!");
                header("location: ../form-home/ASM1.html"); 
                exit();
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "User not found!";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>