<?php
    include("../apps/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    </style>
    <title>Thêm sản phẩm</title>
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
    <form action="product_add.php" method="post" enctype="multipart/form-data" class="container">
        <div class="form-group">
            <p>Nhập id_sanpham</p>
            <input type="text" name="id_sanpham" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập id_catolog</p>
            <input type="text" name="id_catolog" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập id_sub</p>
            <input type="text" name="id_sub" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập tensp</p>
            <input type="text" name="tensp" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập code_product</p>
            <input type="text" name="code_product" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập price</p>
            <input type="text" name="price" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập description</p>
            <input type="text" name="description" id="" class="form-control">
        </div>
       <div class="form-group">
        <p>Nhập content</p>
            <input type="text" name="content" id="" class="form-control">
       </div>
        <div class="form-group">
            <p>Nhập image_sp</p>
            <input type="file" name="image_sp" id="" value="Chọn ảnh nhé">
        </div>
        <div class="form-group">
            <p>Nhập xuatxu</p>
            <input type="text" name="xuatxu" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập sizess</p>
            <input type="text" name="sizess" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập mausac</p>
            <input type="text" name="mausac" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập parent_name_menu</p>
            <input type="text" name="parent_name_menu" id="" class="form-control"></br>
        </div>
        <input type="hidden" name="date" value="<?php echo date('d/m/y') ?>">
        
        <input type="submit" value="Thêm" name="sbm" class="btn btn-success">
        
    </form>
    <?php
        if (!empty($_POST)) {
            $id_sanpham = $_POST["id_sanpham"];
            $id_catolog = $_POST["id_catolog"];
            $id_sub = $_POST["id_sub"];
            $tensp = $_POST["tensp"];
            $code_product = $_POST["code_product"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $content = $_POST["content"];

            if(isset($_FILES["image_sp"])){
                $files = $_FILES["image_sp"];
                $image_sp_index = $image_sp = $files['name'];
                move_uploaded_file($files["tmp_name"], '../images/'.$image_sp_index);
                // move_uploaded_file($files["tmp_name"], 'images/a/'.$image_sp);

            }

            $xuatxu = $_POST["xuatxu"];
            $sizess = $_POST["sizess"];
            $mausac = $_POST["mausac"];
            $parent_name_menu = $_POST["parent_name_menu"];
            $date = $_POST["date"];

            $insert = mysqli_query($conn, "INSERT INTO sanpham (id_sanpham, id_catalog, id_sub, tensp, code_product, price, description, content, discount, image_sp, created, view, xuatxu, sizess, mausac, parent_name_menu, parent_name_sub, date) VALUES ('$id_sanpham','$id_catolog','$id_sub', '$tensp', '$code_product', '$price', '$description', '$content', ' ', '$image_sp', ' ', ' ', '$xuatxu', '$sizess', '$mausac', '$parent_name_menu', ' ', '$date')");
            
            echo "<span id=\"errformdk\">Thêm thành công!</span>";
            header('location: product.php');
        }
              
    ?>
</body>
</html>