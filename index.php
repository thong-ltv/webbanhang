<!DOCTYPE HTML>
<html lang="vi">
<style>
body{
    background-color:	#efe3d7;
}
.white{
    background-color: white;
}

</style>
<body>
<?php
include("apps/config.php");
include_once ("apps/libs/header.php");
if (isset($_GET['current_page_tui'])) {
    $current_page_tui = $_GET['current_page_tui'];
}else {
    $current_page_tui = 1;
}

if (isset($_GET['current_page_balo'])) {
    $current_page_balo = $_GET['current_page_balo'];
}else {
    $current_page_balo = 1;
}

if (isset($_GET['current_page_vi'])) {
    $current_page_vi = $_GET['current_page_vi'];
}else {
    $current_page_vi = 1;
}
?>
<div class="container white">
<div id ="wrapper">
        <!-- banner --><div class="banner">
            <div class="owl-carousel owl-theme">

                <?php
                $banner_query = mysqli_query($conn,"SELECT * FROM banner ORDER BY id_banner ASC limit 5");
                while ($banner_items = mysqli_fetch_array($banner_query)){
                    echo '<div class="owl-carousel owl-theme">';
                    echo ' <div class="item"><img src="images/'.$banner_items['link_banner'].'" alt="'.$banner_items['name_banner'].'"></div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div><!--end banner-->
<!--body -->
<!--Tui xach tay-->
        <div class="sliderows">
            <div class="navicate">
                <h2 class="parent">
                    <a href="#" tittle="TÚI XÁCH TAY">TÚI XÁCH TAY</a>
                </h2><!--end parent-->
                <div class="sub">
                    <?php
                    $balo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=25") or die('Cannot select table!');
                    $balo_items = mysqli_fetch_array($balo_res);
                    echo"<a href='sanpham.php?id_menu=".$balo_items['id_catalog']."'>Xem tất cả</a>";
                    ?>
                </div><!--end sub-->
                <?php
                $tuixach_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=25") or die('Cannot select table!');
                while ($tuixach_items = mysqli_fetch_array($tuixach_res))
                {
                ?>
                <h2 class="sub">
                    <?php
                    echo"<a href='sanpham.php?id_menu=".$tuixach_items['id_sub']."'>". $tuixach_items['name_sub']." </a>";
                    echo"</h2>";
                    }
                    ?>
            </div><!--end navicate-->
            <a href="#" tittle="tieu de 1" target="_blank">
                <img class="banner_rows" src="images/banner/banner.jpg" alt="1"/>
            </a>
            <div class="selling">
                <a href="#" tittle="tieu de 2" target="_blank">
                    <img src="images/banner/banner2.jpg" alt="2"/>
                </a>
            </div><!--end selling-->
            <div class="row_product">
                <div class="row_product_1">
                        
                        <?php
                        $item_per_page = 4;
                        // $current_page = 1;
                        $offset = ($current_page_tui - 1) * $item_per_page;
                        $sql_page = mysqli_query($conn, "SELECT * FROM sanpham where id_catalog=25");
                        $row_count = mysqli_num_rows($sql_page);
                        $page = ceil($row_count/$item_per_page);
                        
                        $tuixach_query="SELECT * FROM sanpham where id_catalog=25 order by 'id_sanpham' desc limit ".$offset.",".$item_per_page."";
                        $tuixach_res = mysqli_query($conn,$tuixach_query) or die('Cannot select table!');
                        while ($tuixach_items = mysqli_fetch_array($tuixach_res))
                        {
                            ?>
                            <div class="product-item" >
                                <div class="row_product_h">
                                    <?php
                                    echo"
					<a href='chitiet.php?id=".$tuixach_items['id_sanpham']."' class='images'>
						<img alt='".$tuixach_items['tensp']."' src='images/".$tuixach_items['image_sp']."'>
					</a>
					<h2>
					<a title='".$tuixach_items['tensp']."' href='chitiet.php?id=".$tuixach_items['id_sanpham']."' style='text-align: center;display: inherit;font: 16px/20px \"Roboto\",Helvetica,Arial,sans-senif;'>".$tuixach_items['tensp']."</a>
					</h2>
					<div class='price' style='text-align: center;'>".number_format($tuixach_items['price'])." VNĐ</div><!--end price-->
					<div class='ratings'>
						<div class='rating-box'></div><!--end ratingbox-->
					</div><!--end ratings-->
					<a href='add-cart.php?id=".$tuixach_items['id_sanpham']."'><div class='add_cart''><i></i>THÊM VÀO GIỎ </div></a>
					";
                                    ?>
                                </div><!--end row_product_h-->
                            </div><!--end owl-item--->
                            <?php
                        }
                        ?>
                        <div style="clear: both;"></div>
                        <ul>
                            <?php
                                for ($i=1; $i <= $page ; $i++) { ?>
                                <?php if($current_page_tui != $i){ ?>
                                    <li style="float: left; padding: 5px 13px; margin: 5px; background: burlywood; display: block;"><a href="index.php?current_page_tui=<?php echo $i ?>" style="color: #000; text-align:center; text-decoration: none;"><?php echo $i ?></a></li>
                                <?php } else { ?>
                                    <strong><li style="float: left; padding: 5px 13px; margin: 5px; background: red; display: block;"><a href="index.php?current_page_tui=<?php echo $i ?>" style="color: #000; text-align:center; text-decoration: none;"><?php echo $i ?></a></li></strong>
                                <?php } ?>
                            <?php } ?>

                        </ul>
                </div><!--end owl-wrapper-outer-->
            </div><!---end row_product owl-carousel owl-theme-->
        </div><!--end sliderows 1-->
<!--balobalo-->
<div class="sliderows">
            <div class="navicate">
                <h2 class="parent">
                    <a href="#" tittle="balo">BALO</a>
                </h2><!--end parent-->
                <div class="sub">
                    <?php
                    $balo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=26") or die('Cannot select table!');
                    $balo_items = mysqli_fetch_array($balo_res);
                    echo"<a href='sanpham.php?id_menu=".$balo_items['id_catalog']."'>Xem tất cả</a>";
                    ?>
                </div><!--end sub-->
                <?php
                $balobalo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=26") or die('Cannot select table!');
                while ($balobalo_items = mysqli_fetch_array($balobalo_res))
                {
                ?>
                <h2 class="sub">
                    <?php
                    echo"<a href='sanpham.php?id_menu=".$balobalo_items['id_sub']."'>". $balobalo_items['name_sub']." </a>";
                    echo"</h2>";
                    }
                    ?>
            </div><!--end navicate-->
            <a href="#" tittle="tieu de 1" target="_blank">
                <img class="banner_rows" src="images/banner/banner7.jpg" alt="1"/>
            </a>
            <div class="selling">
                <a href="#" tittle="tieu de 2" target="_blank">
                    <img src="images/banner/banner8.jpg" alt="2"/>
                </a>
            </div><!--end selling-->
            <div class="row_product">
                <div class="row_product_1">

                        <?php
                        $item_per_page = 4;
                        // $current_page = 1;
                        $offset = ($current_page_balo - 1) * $item_per_page;
                        $sql_page = mysqli_query($conn, "SELECT * FROM sanpham where id_catalog=26");
                        $row_count = mysqli_num_rows($sql_page);
                        $page = ceil($row_count/$item_per_page);

                        $balobalo_query="SELECT * FROM sanpham where id_catalog=26 order by 'id_sanpham' desc limit ".$offset.",".$item_per_page."";
                        $balobalo_res = mysqli_query($conn,$balobalo_query) or die('Cannot select table!');
                        while ($balobalo_items = mysqli_fetch_array($balobalo_res))
                        {
                            ?>
                            <div class="product-item" >
                                <div class="row_product_h">
                                    <?php
                                    echo"
					<a href='chitiet.php?id=".$balobalo_items['id_sanpham']."' class='images'>
						<img alt='".$balobalo_items['tensp']."' src='images/".$balobalo_items['image_sp']."'>
					</a>
					<h2>
					<a title='".$balobalo_items['tensp']."' href='chitiet.php?id=".$balobalo_items['id_sanpham']."' style='text-align: center;display: inherit;font: 16px/20px \"Roboto\",Helvetica,Arial,sans-senif;'>".$balobalo_items['tensp']."</a>
					</h2>
					<div class='price' style='text-align: center;'>".number_format($balobalo_items['price'])." VNĐ</div><!--end price-->
					<div class='ratings'>
						<div class='rating-box'></div><!--end ratingbox-->
					</div><!--end ratings-->
					<a href='add-cart.php?id=".$balobalo_items['id_sanpham']."'><div class='add_cart''><i></i>THÊM VÀO GIỎ </div></a>
					";
                                    ?>
                                </div><!--end row_product_h-->
                            </div><!--end owl-item--->
                            <?php
                        }
                        ?>
                        <div style="clear: both;"></div>
                        <ul>
                            <?php
                                for ($i=1; $i <= $page ; $i++) { ?>
                                <?php if($current_page_balo != $i){ ?>
                                    <li style="float: left; padding: 5px 13px; margin: 5px; background: burlywood; display: block;"><a href="index.php?current_page_balo=<?php echo $i ?>" style="color: #000; text-align:center; text-decoration: none;"><?php echo $i ?></a></li>
                                <?php } else { ?>
                                    <li style="float: left; padding: 5px 13px; margin: 5px; background: red; display: block;"><a href="index.php?current_page_balo=<?php echo $i ?>" style="color: #000; text-align:center; text-decoration: none;"><?php echo $i ?></a></li>
                                <?php } ?>
                            <?php } ?>

                        </ul>
                </div><!--end owl-wrapper-outer-->
            </div><!---end row_product owl-carousel owl-theme-->
        </div><!--end sliderows 2-->
  <!-- Bóp-ví-->
        <!-- sliderows 3-->
        <div class="sliderows">
            <div class="navicate">
                <h2 class="parent">
                    <a href="#" tittle="VÍ-BÓP">VÍ - BÓP</a>
                </h2><!--end parent-->
                <div class="sub">
                    <?php
                    $balo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=27") or die('Cannot select table!');
                    $balo_items = mysqli_fetch_array($balo_res);
                    echo"<a href='sanpham.php?id_menu=".$balo_items['id_catalog']."'>Xem tất cả</a>";
                    ?>
                </div><!--end sub-->
                <?php
                $balo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=27") or die('Cannot select table!');
                while ($balo_items = mysqli_fetch_array($balo_res))
                {
                ?>
                <h2 class="sub">
                    <?php
                    echo"<a href='sanpham.php?id_menu=".$balo_items['id_sub']."'>". $balo_items['name_sub']." </a>";
                    echo"</h2>";
                    }
                    ?>
            </div><!--end navicate-->
            <a href="#" tittle="tieu de 1" target="_blank">
                <img class="banner_rows" src="images/banner/banner01.jpg" alt="1"/>
            </a>
            <div class="selling">
                <a href="#" tittle="tieu de 2" target="_blank">
                    <img src="images/banner/banner5.png" style="height: 310px;" alt="2"/>
                </a>
            </div><!--end selling-->
            <div class="row_product">
                <div class="row_product_1">
                    <?php
                    $offset = ($current_page_vi - 1) * $item_per_page;
                    $sql_page = mysqli_query($conn, "SELECT * FROM sanpham where id_catalog=27");
                    $row_count = mysqli_num_rows($sql_page);
                    $page = ceil($row_count/$item_per_page);

                    $balo_query="SELECT * FROM sanpham where id_catalog=27 order by 'id_sanpham' desc limit ".$offset.",".$item_per_page."";
                    $balo_res = mysqli_query($conn,$balo_query) or die('Cannot select table!');
                    while ($balo_items = mysqli_fetch_array($balo_res))
                    {
                        ?>
                        <div class="product-item" >
                            <div class="row_product_h">
                                <?php
                                echo"
					<a href='chitiet.php?id=".$balo_items['id_sanpham']."' class='images'>
						<img alt='".$balo_items['tensp']."' src='images/".$balo_items['image_sp']."'>
					</a>
					<h2>
					<a title='".$balo_items['tensp']."' href='chitiet.php?id=".$balo_items['id_sanpham']."' style='text-align: center;display: inherit;font: 16px/20px \"Roboto\",Helvetica,Arial,sans-senif;'>".$balo_items['tensp']."</a>
					</h2>
					<div class='price' style='text-align: center;'>".number_format($balo_items['price'])." VNĐ</div><!--end price-->
					<div class='ratings'>
						<div class='rating-box'></div><!--end ratingbox-->
					</div><!--end ratings-->
					<a href='add-cart.php?id=".$balo_items['id_sanpham']."'><div class='add_cart''><i></i>THÊM VÀO GIỎ</div></a>
					";
                                ?>
                            </div><!--end row_product_h-->
                        </div><!--end owl-item--->
                        <?php
                    }
                    ?>
                    <div style="clear: both;"></div>
                    <ul>
                            <?php
                                for ($i=1; $i <= $page ; $i++) { ?>
                                <?php if($current_page_vi != $i){ ?>
                                    <li style="float: left; padding: 5px 13px; margin: 5px; background: burlywood; display: block;"><a href="index.php?current_page_vi=<?php echo $i ?>" style="color: #000; text-align:center; text-decoration: none;"><?php echo $i ?></a></li>
                                <?php } else { ?>
                                    <strong><li style="float: left; padding: 5px 13px; margin: 5px; background: burlywood; display: block;"><a href="index.php?current_page_vi=<?php echo $i ?>" style="color: #000; text-align:center; text-decoration: none;"><?php echo $i ?></a></li></strong>
                                <?php } ?>
                            <?php } ?>

                        </ul>

                </div><!--end owl-wrapper-outer-->
            </div><!---end row_product owl-carousel owl-theme-->
        </div><!--end sliderows-->
</div><!--End Wrapper--->
</div>
<!------------------------------------------FOOTER------------------------------------------------------>
<?php include ("apps/libs/footer.php");?>
<!------------------------------------------END FOOTER------------------------------------------------------>
</body>
</html>