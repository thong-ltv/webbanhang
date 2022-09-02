<?php
include("../apps/config.php");
$idd = $_GET['idd'];
$sql_product_edit = "SELECT * FROM sanpham WHERE id_sanpham = $idd";
$result = mysqli_query($conn, $sql_product_edit);
$row = mysqli_fetch_assoc($result);
?>
<!-- //hiển thị form để chỉnh sửa -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <styl>
        
    </style>
    <title>Cập nhật sản phẩm</title>
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
    <form action="product_update.php?idd=<?php echo $idd ?>" method="post" enctype="multipart/form-data" class="container">
        <div class="form-group">
            <p>Sửa id_sanpham</p>
            <input type="text" name="id_sanpham" id="" class="form-control" value="<?php echo $row['id_sanpham'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa id_catolog</p>
            <input type="text" name="id_catolog" id="" class="form-control" value="<?php echo $row['id_catalog'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa id_sub</p>
            <input type="text" name="id_sub" id="" class="form-control" value="<?php echo $row['id_sub'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa tensp</p>
            <input type="text" name="tensp" id="" class="form-control" value="<?php echo $row['tensp'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa code_product</p>
            <input type="text" name="code_product" id="" class="form-control" value="<?php echo $row['code_product'] ?>" >
        </div>
        <div class="form-group">
            <p>Sửa price</p>
            <input type="text" name="price" id="" class="form-control" value="<?php echo $row['price'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa description</p>
            <input type="text" name="description" id="" class="form-control" value="<?php echo $row['description'] ?>">
        </div>
       <div class="form-group">
        <p>Sửa content</p>
            <input type="text" name="content" id="" class="form-control" value="<?php echo $row['content'] ?>">
       </div>
        <div class="form-group">
            <img src="images/<?Php echo $row['image_sp'] ?>" alt="" style="width:300px;">
            <p>Sửa image_sp</p>
            <input type="file" name="image_sp" id="" value="<?php echo $row['image_sp'] ?>">
           
        </div>
        <div class="form-group">
            <p>Sửa xuatxu</p>
            <input type="text" name="xuatxu" id="" class="form-control" value="<?php echo $row['xuatxu'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa sizess</p>
            <input type="text" name="sizess" id="" class="form-control" value="<?php echo $row['sizess'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa mausac</p>
            <input type="text" name="mausac" id="" class="form-control" value="<?php echo $row['mausac'] ?>">
        </div>
        <div class="form-group">
            <p>Sửa parent_name_menu</p>
            <input type="text" name="parent_name_menu" id="" class="form-control" value="<?php echo $row['parent_name_menu'] ?>"></br>
        </div>
        <input type="hidden" name="date" value="<?php echo date('d/m/y') ?>">
        
        <input type="submit" value="Cập nhật sản phẩm" name="sbm" class="btn btn-success">
        
    </form>
    
