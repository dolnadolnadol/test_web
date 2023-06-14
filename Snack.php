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
    <script src="https://unpkg.com/@popperjs/core@2"></script>


    <title>WORK 3</title>
</head>

<body>
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
                        <ul class="dropdown-menu dropdown-menu-start">
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
                สินค้าหมวดหมู่ ขนม
                <hr>
            </div>
        </div>
        <!-- คำสั่งเเสดงข้อมูลจากตาราง product -->
        <?php
        // ASC คำสั่งเรียงจากน้อยไปมาก , desc มากไปน้อย
        $sql = "SELECT * FROM product where product_type = 'ขนม' order by price ASC";
        $query = mysqli_query($conn, $sql);
        ?>

        <div class="row">
            <table class="table">

                <!-- หัวตาราง -->
                <thead class="table-dark">
                    <tr>
                        <th> ID สินค้า </th>
                        <th> ชื่อสินค้า </th>
                        <th> ราคา </th>
                        <th> ประเภท </th>
                        <th> ลบ </th>
                    </tr>
                </thead>


                <!-- วนลูปเพื่อแสดงข้อมูล -->
                <?php
                while ($result = mysqli_fetch_array($query)) {
                ?>

                    <!-- แสดงข้อมูล -->
                    <tbody>
                        <thead>
                            <tr>
                                <td><?php echo $result["product_id"]; ?></td>
                                <td><?php echo $result["product_name"]; ?></td>
                                <td><?php echo $result["price"]; ?></td>
                                <td><?php echo $result["product_type"]; ?></td>

                                <!-- ปุ่มลบ -->
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product_id<?php echo $result["product_id"]; ?>">
                                        <i class="fa-solid fa-folder-minus fa-spin"></i>
                                    </button>
                                    <div class="modal fade" id="product_id<?php echo $result["product_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">ยืนยันลบสินค้า</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ต้องการลบ <h4>
                                                        <font color="purple"> <b><u><?php echo $result["product_name"]; ?></u></b></font>
                                                    </h4> ใช่หรือไม่
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="DeleteProduct.php" method="post">
                                                        <!-- ส่งค่า ID สินค้า แบบ Hidden -->
                                                        <input type="hidden" name="id" value="<?php echo $result["product_id"]; ?>">

                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">ตกลง</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>

                    <!-- จบวนลูปแสดงข้อมูล -->
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- เรียกใช้ Bootstrap JS -->
    <script src="bootstrap/bootstrap/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://kit.fontawesome.com/cd4a476ae9.js" crossorigin="anonymous"></script>
</body>

</html>