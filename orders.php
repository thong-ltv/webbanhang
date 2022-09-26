<?php
include ("apps/config.php");
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Đặt hàng</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $base; ?>/images/favicon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/fontawesome-all.min.css" media='all'/>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&amp;subset=vietnamese">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/order.css">
</head>
<body>
    <?php
        if($_SESSION['cart'] != NULL) 
        {
            echo "
            <form method='post'>
            <div class='main-shopping'>
            <p class='cart_info'>
            Thông tin chi tiết giỏ hàng!";

            $now = getdate();
            $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];

            if (isset($_POST['btDathang']) && isset($_SESSION['username']) && isset($_SESSION['cart'])) 
                {
                    $khachhang = mysqli_query($conn, "SELECT * FROM user WHERE username ='" . $_SESSION['username'] . "'");
                    $items = mysqli_fetch_array($khachhang);
                    $hoten = $items['fullname'];
                    $id_user = $items['id'];
                    
                    $time = getdate();
                    $currentDate = $time["year"] . "-" . $time["mon"] . "-" . $time["mday"];
                    // foreach ($_SESSION['cart'] as $id => $prd) {
                    //     $arr_id[] = $id;
                    // }
                    // $str_id = implode(',', $arr_id);
                    // $item_query = "SELECT * FROM  sanpham WHERE id_sanpham IN ($str_id) ORDER BY id_sanpham ASC";
                    // $item_result = mysqli_query($conn, $item_query) or die ('Cannot select table!');
                   
                    // insert vào giao dịch
                    
                    // $insert = mysqli_query($conn, "INSERT INTO giaodich(transaction_id, user_id,user_name, user_email, user_phone, amount, created) VALUES(N'".$trans_id."',N'".$items['id']."',N'".$hoten."',N'".$items['email']."',N'".$items['phone']."', N'" . $_POST['sumcost'] . "' ,N'" . $currentDate . "')");
                    $insert_tran = "INSERT INTO `giaodich`( `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `amount`, `created`) 
                                    VALUES ('0','$id_user','$hoten','$items[email]','$items[phone]','$_POST[sumcost]','$currentDate')";
                    $insert = mysqli_query($conn, $insert_tran);

                    //lay transaction_id
                    $select_trans_id = mysqli_query($conn, "SELECT `transaction_id` FROM `giaodich` ORDER BY transaction_id DESC");
                    $select_trans_id_result = mysqli_fetch_array($select_trans_id);
                    $select_id = $select_trans_id_result[0];

                    // insert vao don hang
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                        $insert_donhang = "INSERT INTO `donhang`(`transaction_id`, `product_id`, `slspdh`, `amount`, `status`) 
                                           VALUES ('$select_id','$value[id_sanpham]','$value[quantity]','$value[price]','0')";
                        $insert = mysqli_query($conn, $insert_donhang);
                    }
                    // while ($rows = mysqli_fetch_array($item_result)) {
                        //insert table donhang
                        
                        // $insert_donhang = "INSERT INTO donhang(transaction_id, product_id, slspdh, amount)
                        //                    VALUES (N'" . $trans_id . "', N'" . $rows['id_sanpham'] . "',N'" . $_SESSION['cart'][$rows['id_sanpham']] . "',N'" . $rows['price'] * $_SESSION['cart'][$rows['id_sanpham']] . "')";
                        
                    // }
                    
                    echo '<p class="sc_infor cart_info">Đặt hàng thành công</p><p class="sc_inforr cart_info">Thắc mắc xin vui lòng liên hệ:0977113657</p>';
                    unset($_SESSION['cart']);
                    echo '<span class="cart_info sc_inforr">Ấn vào <strong><a href="'.$base.'" class="day">đây</a></strong> để quay lại trang chủ! Xin cảm ơn nhiều ạ</span>';
            }
            elseif (isset($_POST['dathang_two']) && isset($_SESSION['cart'])) 
            {
                    $fullname = $_POST['fn'];
                    $em = $_POST['em'];
                    $dt = $_POST['tphone'];
                    $ar = $_POST['ar'];
                    $nt = $_REQUEST['notetext'];
                    $time = getdate();
                    $currentDate = $time["year"] . "-" . $time["mon"] . "-" . $time["mday"];
                // foreach ($_SESSION['cart'] as $id => $prd) {
                //     $arr_id[] = $id;
                // }
                // $str_id = implode(',', $arr_id);
                // $item_result = mysqli_query($conn, "SELECT * FROM sanpham WHERE id_sanpham IN ($str_id) ORDER BY id_sanpham ASC") or die ('Cannot select table!');
                // while ($rows = mysqli_fetch_array($item_result)) {
                //     //insert table giaodich
                //     $insert = mysqli_query($conn,"INSERT INTO giaodich(user_name, user_email, user_phone, address, message, amount) VALUES('".$fullname."','".$em."','".$dt."','".$ar."','".$nt."',N'" . $rows['price'] * $_SESSION['cart'][$rows['id_sanpham']] . "')");
                //     //insert table donhang
                //     $insert = mysqli_query($conn, "INSERT INTO donhang (id_product,quantity,amount,created) VALUES (N'" . $rows['id_sanpham'] . "',N'" . $_SESSION['cart'][$rows['id_sanpham']] . "',N'" . $rows['price'] * $_SESSION['cart'][$rows['id_sanpham']] . "',N'" . $currentDate . "')");

                // }
                    $gt = 0;
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                        $gt += $value['price'] * $value['quantity'];
                    }
                
                    // insert vào giao dịch
                    
                    // $insert = mysqli_query($conn, "INSERT INTO giaodich(transaction_id, user_id,user_name, user_email, user_phone, amount, created) VALUES(N'".$trans_id."',N'".$items['id']."',N'".$hoten."',N'".$items['email']."',N'".$items['phone']."', N'" . $_POST['sumcost'] . "' ,N'" . $currentDate . "')");
                    $insert_tran = "INSERT INTO `giaodich`( `status`, `user_name`, `user_email`, `user_phone`, `message`, `amount`, `created`) 
                                    VALUES ('0','$fullname','$em','$dt', '$nt', '$gt','$currentDate')";
                    $insert = mysqli_query($conn, $insert_tran);

                    //lay transaction_id
                    $select_trans_id = mysqli_query($conn, "SELECT `transaction_id` FROM `giaodich` ORDER BY transaction_id DESC");
                    $select_trans_id_result = mysqli_fetch_array($select_trans_id);
                    $select_id = $select_trans_id_result[0];

                    // insert vao don hang
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                        $insert_donhang = "INSERT INTO `donhang`(`transaction_id`, `product_id`, `slspdh`, `amount`, `status`) 
                                           VALUES ('$select_id','$value[id_sanpham]','$value[quantity]','$value[price]','0')";
                        $insert = mysqli_query($conn, $insert_donhang);
                    }
                    echo '<p class="sc_infor cart_info">Đặt hàng thành công</p><p class="sc_inforr cart_info">Thắc mắc xin vui lòng liên hệ:0977113657</p>';
                    unset($_SESSION['cart']);
                    echo '<span class="cart_info sc_inforr">Ấn vào <strong><a href="'.$base.'" class="day">đây</a></strong> để quay lại trang chủ! Xin cảm ơn nhiều ạ</span>';
            }
            echo '</p></div><!--end main shopping-->

            </form>';
        } 
        else
        {
            echo"Hiện tại bạn chưa có sản phẩm nào!";
        }
    ?>
<div class="clear10px"></div>
<div class="clear50px"></div>
</body></html>