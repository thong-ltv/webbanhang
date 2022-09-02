<?php
    include("../apps/config.php");
    //lấy id để tiến hành update
    $idd = $_GET['idd'];
    echo $idd;
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
            $image_sp_index=$image_sp = $files['name'];
            move_uploaded_file($files["tmp_name"], '../images/'.$image_sp_index);
            // move_uploaded_file($files["tmp_name"], 'images/a/'.$image_sp);


        }

        $xuatxu = $_POST["xuatxu"];
        $sizess = $_POST["sizess"];
        $mausac = $_POST["mausac"];
        $parent_name_menu = $_POST["parent_name_menu"];
        $date = $_POST["date"];

        $sql_product_update = "UPDATE `sanpham` SET `id_sanpham`='$id_sanpham',`id_catalog`='$id_catolog',`id_sub`='$id_sub',`tensp`='$tensp',`code_product`='$code_product',`price`='$price',`description`='$description',`content`='$content',`discount`='',`image_sp`='$image_sp',`created`='',`view`='',`xuatxu`='$xuatxu',`sizess`='$sizess',`mausac`='$mausac',`parent_name_menu`='$parent_name_menu',`parent_name_sub`='',`date`='$date' WHERE id_sanpham=$idd";
        // echo $sql_product_update; exit;
        $update = mysqli_query($conn, $sql_product_update);
        echo "<span id=\"errformdk\">Thêm thành công!</span>";
        header('location: product.php');
    }
?>