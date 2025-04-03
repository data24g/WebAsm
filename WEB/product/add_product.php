<?php
require '../connect.php';
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Thêm sản phẩm vào cơ sở dữ liệu
    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', $price, '$image')";
    if ($conn->query($sql)) {
        header("Location: index.php"); // Chuyển hướng về trang chính
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
?>

