<?php
require("Connect.php"); //เรียกใช้ไฟล์ Connect.php
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- เรียกใช้ Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
    <!-- เรียกใช้ fontawesome -->
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM product WHERE product_id = '$id'";
            $qr = mysqli_query($conn, $sql);

            // Check if the insertion was successful
            if ($qr) {
                echo '<script type="text/javascript">';
                echo 'Swal.fire("ลบข้อมูลสินค้าสำเร็จ", "", "success")';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo 'Swal.fire("ลบข้อมูลสินค้าไม่สำเร็จ กรุณาลองใหม่อีกครั้ง", "", "error")';
                echo '</script>';
                echo "Error: " . mysqli_error($conn);
            }

            echo '<script type="text/javascript">';
            echo 'setTimeout(function() { window.location.href = document.referrer; }, 2000)';
            echo '</script>';
        }else{
            echo 'no';
        }
    }
    ?>
    <!-- เรียกใช้ Bootstrap JS -->
    <script src="bootstrap/bootstrap/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://kit.fontawesome.com/cd4a476ae9.js" crossorigin="anonymous"></script>
</body>