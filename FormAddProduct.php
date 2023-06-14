<?php
require("Connect.php"); // Include the connect.php file
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- เรียกใช้ Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- เรียกใช้ fontawesome -->
    <!-- <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://kit.fontawesome.com/cd4a476ae9.js" crossorigin="anonymous"></script>

    <title>WORK 3</title>
</head>

<body>
    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $productName = $_POST['name'];
        $productPrice = $_POST['price'];
        $productType = $_POST['type'];
        $maxIdQuery = "SELECT MAX(product_id) as max_id FROM product";
        $maxIdResult = mysqli_query($conn, $maxIdQuery);
        $maxIdRow = mysqli_fetch_assoc($maxIdResult);
        $maxId = $maxIdRow['max_id'] + 1;

        $sql = "INSERT INTO product (product_id, product_name, price, product_type) VALUES ('$maxId','$productName', '$productPrice', '$productType')";
        $result = mysqli_query($conn, $sql);

        // Check if the insertion was successful
        if ($result) {
            echo '<script type="text/javascript">';
            echo 'Swal.fire("บันทึกข้อมูลสินค้าสำเร็จ", "", "success")';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'Swal.fire("บันทึกข้อมูลสินค้าไม่สำเร็จ กรุณาลองใหม่อีกครั้ง", "", "error")';
            echo '</script>';
            echo "Error: " . mysqli_error($conn);
        }

        echo '<script type="text/javascript">';
        echo 'setTimeout(function() { window.location.href = document.referrer; }, 3000)';
        echo '</script>';
    }
    ?>
    <!-- เมนู -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00CED1;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WORK 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="FormAddProduct.php">เพิ่มสินค้า</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            รายการสินค้า
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Snack.php">ขนม</a></li>
                            <li><a class="dropdown-item" href="Drink.php">เครื่องดื่ม</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                เพิ่มข้อมูลสินค้า
                <hr>
            </div>
        </div>
        <form class="p my-3" method="POST" role="search">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">ชื่อสินค้า:</label>
                <div class="col-sm-3">
                    <input class="form-control form-control-sm me-1" type="search" placeholder="" aria-label="name" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">ราคา:</label>
                <div class="col-sm-3">
                    <input class="form-control form-control-sm me-1" type="search" placeholder="" aria-label="price" name="price">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">ประเภท:</label>
                <div class="col-sm-3">
                    <select name="type" class="form-select form-select">
                        <option value="">- เลือกประเภทสินค้า -</option>
                        <option value="ขนม">ขนม</option>
                        <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
</body>

</html>