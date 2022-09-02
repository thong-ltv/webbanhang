<?php
//kết nối dữ liệu đến sql
include("../apps/config.php");

//lấy dữ liệu id để xác định đối tượng sửa
$id = $_GET['sidd'];

//câu lệnh chọn 1 sản phẩm trong sql
$sql_product_delete = "DELETE FROM sanpham WHERE id_sanpham= $id";

//lấy kết quả khi kết nối
$result = mysqli_query($conn,$sql_product_delete);
header('location: product.php');
?>