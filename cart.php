<!DOCTYPE HTML>
<html lang="vi">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

<?php
include("apps/config.php");
include("apps/libs/header.php");

?>

<div class="navigation"></div>
<form method="post" action="<?php echo $base ?>/manageCart.php">
	<div class="main-shopping">
<p class="cart_info">
    <?php
         if(isset($_SESSION['cart'])) {echo "Thông tin chi tiết giỏ hàng!";}
         else
         {
            echo"Hiện tại bạn chưa có sản phẩm nào!";
            exit();
        }
         
     ?>
</p>

<div class="cart_oder_1" id="cart_oder_1">
    <ul class="table_cart">
        <li class="sp_cart">SẢN PHẨM </li>
        <li class="dg_cart">ĐƠN GIÁ</li>
        <li class="sl_cart">SỐ LƯỢNG</li>
        <li class="tt_cart">THÀNH TIỀN</li>
    </ul>
    
    <?php

    // $sum_all = 0;
    // $sum_sp = 0;
    // if($_SESSION['cart'] != NULL)
    // {
    //     foreach($_SESSION['cart'] as $id =>$prd)
    //     {
    //         $arr_id[] = $id;
    //     }
    //     $str_id = implode(',',$arr_id);//nối chuỗi bằng dấu ,
    //     $item_query = "SELECT * FROM  sanpham WHERE id_sanpham IN ($str_id) ORDER BY id_sanpham ASC";
    //     $item_result = mysqli_query($conn,$item_query) or die ('Cannot select table!');
    //     while ($rows = mysqli_fetch_array($item_result))
    //     {
        $total = 0;

        foreach($_SESSION['cart'] as $key => $value)
        {
            $sr = $key + 1; 

            ?>
            <!--SHOW CART-->
            
            <div id="cart_1">
                <ul class="bottom_cart" id="bottom">
                    <li class="sp_cart">
                        <img src="images/<?php echo $value['images']; ?>" class="cartImg">
                        <b class="Cart_title_pro"><?php echo $value['title']; ?></b>
                        <div class="delete_Cart" style="text-align: center;font-size: 15px;"><a
                                    href="<?php echo $base?>/del-product.php?id=<?php echo $value['id_sanpham']; ?>"
                                    class="del_sp">Xóa</a></div>

                    </li>
                    <li class="dg_cart" name="dg_cart" value="<?php echo number_format($value['price'], 0, '', ','); ?>"><?php echo number_format($value['price'], 0, '', ','); ?> VNĐ
                        <input type="hidden" class="iprice" value="<?php echo number_format($value['price']); ?>" >
                    </li>

                    <form action="<?php  echo $base ?>/manageCart.php" method="POST">
                        <li class="sl_cart" ><input type="number"
                                            name="mod_quantity"
                                            value="<?php echo $value['quantity']; ?>"
                                            size="3" class="iquantity"
                                            onchange="this.form.submit();"
                                            max = "<?php 
                                                echo 10;
                                            ?>" 
                                            min= "<?php echo 0 ?>"/>
                        </li>
                        <input type="hidden" name="id_sanpham" value="<?php echo $value['id_sanpham']; ?>">
                    </form>

                    <li class="tt_cart_li" name= "ttt_cart" style=" width: 200px; text-align: center; font-size: 14px;">
                        
                    </li>
                </ul>
            </div>

            <?php
            
        }
        echo '</div><!--end cart_oder-->

<div class="bottom_button">
<p class="update_cart">

        <a href="'.$base.'/checkout.php" class="dat_hang" name="checkout" style="display:block;">Thanh toán</a>
    
</p><!--end update-cart--->

<div>
<h4>Tổng số sản phẩm: <span id= "sum_quantity">'.$prd.'</span></h4>
<h4>Tổng tiền: <span id= "gtotal"></span> VNĐ</h4>
</div>

<a href="http://localhost/webbanhang/" class="back_page"> Tiếp tục mua hàng</a>
<a href="del-product.php?id=0" class="delete_all">Xóa giỏ hàng</a>
</div>
        <div class="clear10px"></div> ';
    ?>
</form>
<?php include ("apps/libs/footer.php"); ?>

<script>
//    var iprice = document.getElementsByClassName('iprice');
//    var iquantity = document.getElementsByClassName('iquantity');
//    var itotal = document.getElementsByClassName('tt_cart_li');
//    var sum_quantity = document.getElementById("sum_quantity");
//    var sum_total = document.getElementById("sum_total");


//    function subTotal() {

//         var sumQuantity = 0;
//         var sumTotal = 0;

//     for (var i = 0; i < iprice.length; i++) {

//         // var numb= parseFloat(iprice[i].value.replace(",", ".")) * (iquantity[i].value) * 100;
//         // var rounded = Math.round((numb + Number.EPSILON) * 100) / 100;
//         // console.log(rounded);

//         // itotal[i].innerHTML = rounded * 10000;  
        
//         var format_num = iprice[i].value.replace(/,/g, "");
//         // console.log(format_num);

//         itotal[i].innerHTML = parseInt(format_num) * parseInt(iquantity[i].value);
        
//         sumQuantity += parseInt(iquantity[i].value);

//         sumTotal += parseInt(format_num) * parseInt(iquantity[i].value);
        
//     }

//     sum_quantity.innerHTML = sumQuantity;
//     sum_total.innerHTML = sumTotal;
    

//    }

//    subTotal();

    var gt = 0;
    var sum_q = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('tt_cart_li');
    var gtotal =document.getElementById('gtotal');
    var sum_quantity = document.getElementById("sum_quantity");

    function Subtotal()
    {
        for (let i = 0; i < iprice.length; i++) 
        {

            var format_num = iprice[i].value.replace(/,/g, "");
        
            if(iprice[i].value.length < 9)
            {
                var pr1 = (parseFloat(iprice[i].value.replace(/,/g, '.')) * 1000);
                var pr11 = (pr1 * parseInt(iquantity[i].value) / 1000);
                var pr111 = pr11.toString().replace(/,/g, '.');
                var pr1111 = pr111.concat('.', '000');
                itotal[i].innerText = pr1111;
                gt += pr1 * parseInt(iquantity[i].value);
                
            }
            else
            {
                var pr2 = (parseFloat(iprice[i].value.replace(/,/g, '.')) * 1000000);
                var pr22 = (pr2 * parseInt(iquantity[i].value) / 1000000);
                var pr222 = pr22.toString().replace(/,/g, '.');
                var pr2222 = pr222.concat('.', '000');
                itotal[i].innerText = pr2222;
                gt += pr2 * parseInt(iquantity[i].value);
        
            }

            sum_q += parseInt(iquantity[i].value);
            
        }

        var gt1 = (gt / 1000);
        var gt2 = gt1.toString().replace(/,/g, '.');
        var gt3 = gt2.concat('.', '000');

        sum_quantity.innerText = sum_q;
        gtotal.innerText = gt3;
    }

    Subtotal()

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
