<?php
include("../apps/config.php");
$idd = $_GET['idd'];
$sql_product_edit = "SELECT * FROM sanpham WHERE id = $idd";
$result = mysqli_query($conn, $sql_product_edit);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    </style>
    <title>Cập nhật tài khoản người dừng</title>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <form action="user_update.php?idd=<?php echo $id ?>" method="post" enctype="multipart/form-data" class="container">
        <div class="form-group">
            <p>Nhập id</p>
            <input type="text" name="id" id="" class="form-control" value="<?php echo $row['id'] ?>>
        </div>
        <div class="form-group">
            <p>Nhập username</p>
            <input type="text" name="username" id="" class="form-control" value="<?php echo $row['username'] ?>>
        </div>
        <div class="form-group">
            <p>Nhập password</p>
            <input type="text" name="password" id="" class="form-control" value="<?php echo $row['password'] ?>>
        </div>
        <div class="form-group">
            <p>Nhập fullname</p>
            <input type="text" name="fullname" id="" class="form-control" value="<?php echo $row['fullname'] ?>>
        </div>
        <div class="form-group">
            <p>Nhập email</p>
            <input type="email" name="email" id="" class="form-control" value="<?php echo $row['email'] ?>>
        </div>
        <div class="form-group">
            <p>Nhập phone</p>
            <input type="text" name="phone" id="" class="form-control" value="<?php echo $row['phone'] ?>>
        </div>
        <div class="form-group">
            <p>Nhập address</p>
            <input type="text" name="address" id="" class="form-control" value="<?php echo $row['address'] ?>>
        </div>
        <input type="hidden" name="creted" value="<?php echo date('d/m/y') ?>">
       <div class="form-group">
        <p>Nhập level</p>
            <input type="text" name="level" id="" class="form-control" value="<?php echo $row['level'] ?>>
       </div>
        <div class="form-group">
            <p>Nhập idgroup</p>
            <input type="text" name="idgroup" id="" class="form-control" value="<?php echo $row['idgroup'] ?>>
        </div>
        
        
        <input type="submit" value="Cập nhật" name="sbm" class="btn btn-success">
        
    </form>