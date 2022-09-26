<!-- cấu hình cho việc thông báo lỗi, khi có lỗi thì đưa vào file php.error.log -->
<?php


ini_set('display_errors', 1);
ini_set('log_errors', 'on');
ini_set('error_log', 'php.error.log');
// error_log( "Hello, errors!" );
// so san pham da add vao cart

?>
<head>
    <title>BelleMode</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $base; ?>/images/favicon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/fontawesome-all.min.css" media='all'/>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&amp;subset=vietnamese">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.theme.default.min.css">
    
</head>
<style>
.ptittle {
    float: left;
    font-size: 15px;
}

/* .pdetail {
    color: #ffffff;
    float: left;
    font-family: "Roboto Condensed", "Roboto", Helvetica, Arial, sans-senif;
    font-size: 18px;
    font-weight: 300;
    margin-right: 10px;
} */
.hotline a[href^="tel:"]:before {
        content: "\260e";
        margin-right: 10px;
      }

</style>
<div id ="header">
    <div class ="topbar">
        <div class ="container">
            <div class="logo">
                <a href="<?php echo $base ?>">
                    <?php
                    $logo_query = mysqli_query($conn,"SELECT * FROM logo ORDER BY  id_logo DESC limit 1");
                    $logo_items = mysqli_fetch_array($logo_query);
                    {
                        echo '<img src="/webbanhang'.$logo_items['image_logo'].'" alt="'.$logo_items['name_logo'].'" tittle="'.$logo_items['name_logo'].'"/>';
                    }
                    ?>
                </a>
            </div><!--end logo-->
            <div class="search">
                <form class="searchform" action="<?php echo $base ?>/search.php" method="get">
                    <input class="s" placeholder="Tìm kiếm …" type="text" name="s" width="300px" />
                    <button class="searchsubmit" type="submit">
                </form>
            </div><!-----end search---->
           

            <div class="hotline">
                <div class="ptittle">HOTLINE:</div><!--ptille-->
                <!-- <div class="pdetail"> &nbsp 0977113657</div>pdetail -->
                <div class="pdetail"> <a href="tel:+0383785124">0383785124</a></div><!--pdetail-->
                
            </div>
            <!-- Đăng nhập -->
        </div><!--end container-->
    </div><!--End topbar--->

    <div class="menu">
        <div class="container">
            <div class="nav">
                <div class='menu_leve_1'><a href = '<?php echo $base ?>' class='parent'>Trang chủ</a></div>
                <div class='menu_leve_1'><a href = '<?php echo $base ?>/tintuc.php' class='parent'>Tin Tức</a></div>
                <?php
                $menu_result = mysqli_query($conn,"SELECT * FROM menu") or die ('Cannot connect table!'.mysqli_error($conn));
                while ($menu_items = mysqli_fetch_array($menu_result,MYSQLI_ASSOC))
                {
                    $submenu_query = "SELECT *
                                      FROM sub_menu
                                      WHERE id_catalog =".$menu_items['id_catalog'];
                    $submenu_res = mysqli_query ($conn,$submenu_query) or die ('Cannot select menu'.mysqli_error($conn));
                    /*--------------------------------SHOW MENU-------------------------------------------*/
                    echo "<div class='menu_leve_1'><a href = '".$base."/sanpham.php?id_menu=".$menu_items['id_catalog']."' class='parent'>".$menu_items['name_menu']."</a>
                <ul class='menuHiden' style='display: none;margin-bottom: 0px;margin-top: 0px;padding-left: 0px;padding-H:10px;'>";
/*                        echo "<li class='active'><a href='".$submenu_items['link_sub']."'><br/>".$menu_items['name_sub']."</a>
                                <ul style='padding-left:0px;padding-bottom:10px;'>";*/
                        while($submenu_items = mysqli_fetch_array($submenu_res,MYSQLI_ASSOC))
                        {
                            echo"<li><a href='".$base."/sanpham.php?id_menu=".$submenu_items['id_sub']."'>". $submenu_items['name_sub']." </a></li>";
                        }
                        echo "
                                </ul>
                                </li>";

                    echo "</ul></div>";
                }
                ?>

                <!-- Phan quyen dang nhap -->
                <?php
                if (isset($_SESSION['username'])){
				$sql_query = mysqli_query($conn, "select * from user where username='".$_SESSION['username']."'");
				$sql_result = mysqli_fetch_array($sql_query);
                $level = $sql_result['level'];
                 
                if ($level == '3'){
                        echo"<div class='user1'>
                        <div class='header_login'>
                        <a href=''>Xin chào: ".$_SESSION['username']. "</a>
                        </div>
                        <ul class='header_logout'>
                            <li><a href='".$base."/logout.php?id=0'>Đăng xuất</a></li>
                        </ul>
                        </div>";
                                    }
                     else if ($level == '1'){
                                        echo"<div class='user1'>
                        <div class='header_login'>
                        <a href=''>Xin chào: ".$_SESSION['username']. "</a>
                        </div>
                        <ul class='header_logout'>
                            <li><a href='".$base."/admin/index.php'>Quản lý</a></li>
                            <li><a href='".$base."/logout.php?id=0'>Đăng xuất</a></li>
                        </ul>
                        </div>";
                                    }
                    else{
                        echo'<div class="user1">
                    <div class="header_login">
                        <a href="#" title="" class="fa fa-user"></a>
                    </div>
                    <ul class="header_login_reg">
                        <li><a href="'.$base.'/login.php">Đăng nhập</a></li>
                        <li><a href="'.$base.'/register.php">Đăng Kí</a></li>
                    </ul>
                </div>';
                    }

                }
                else {
                  echo'  <div class="user1">
                    <div class="header_login">
                        <a href="#" title="" class="fa fa-user"></a>
                    </div>
                    <ul class="header_login_reg">
                        <li><a href="'.$base.'/login.php">Đăng nhập</a></li>
                        <li><a href="'.$base.'/register.php">Đăng Kí</a></li>
                    </ul>
                </div>';
                }
                ?>
                <!-- Ket thuc phan quyen dang nhap -->

                <!-- <div class="cart_div"> -->
                <div>
                    <a href="<?php echo $base?>/cart.php" class="cart_top">
                        <span class="count"><?php 

                            $prd = 0;

                            if(isset($_SESSION['cart']))
                            {
                                foreach($_SESSION['cart'] as $key => $value )
                                {
                                    $prd += $value['quantity'];
                                }
                            }
                            
                            echo $prd; 
                        
                        ?></span><!--end count-->
                        <span class="tit">Giỏ hàng</span><!--end tit-->
                    </a>
                    <div class="quick_cart">
                        <?php //cap nhat lai gia khi nhap vao so luong
                        // if(isset($_POST['update_cart']))
                        // {
                        //     foreach($_SESSION['cart'] as $id => $prd)//prd la gia tri nhap vao.moi id tuong ung voi so luong nhap vao
                        //     {
                        //         if(($prd == 0) and (is_numeric($prd)))//nhap vao =0 thi xoa san pham do di
                        //         {
                        //             unset($_SESSION['cart'][$id]);
                        //         }
                        //         elseif(($prd > 0) and (is_numeric($prd)))// so luong >0  thi tiep tuc tinh
                        //         {
                        //             $_SESSION['cart'][$id] = $prd;
                        //         }
                        //     }
                        // }
                        ?>
                        
                    </div><!--End Quick-->
                </div><!--end cart_div-->

            </div><!--end nav-->

        </div><!--end container-->
    </div><!---menu-->
</div><!--End Header--->