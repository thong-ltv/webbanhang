<?php
$base = str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\','/',dirname(__FILE__,2))); //   /webbanhang
/**
 * $_SERVER['DOCUMENT_ROOT']: file:///C:/xampp/htdocs/: đường dẫn thư mục gốc C:/xampp/htdocs
 * dirname(__FILE__): trả về file:///C:/xampp/htdocs/webbanhang/apps/libs
 * dirname(__FILE__, 2): trả về file:///C:/xampp/htdocs/webbanhang/  :C:\xampp\htdocs\webbanhang
 */
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'webbanhang';
$conn = mysqli_connect($host,$username,'',$database);// ket noi database huong thu tuc
if (!$conn) die ('Không thể kết nối cơ sở dữ liệu');

mysqli_set_charset($conn,'utf8');
?>
<!DOCTYPE html>

<html>
<head>
    <title>BelleMode</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $base; ?>/images/favicon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/fontawesome-all.min.css" media='all' />
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&amp;subset=vietnamese">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="tintuc.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #boss {
            color: rgb(230, 16, 119);
           
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 30px;
            padding: 30px;
            background-color: #FF9800;
            background-clip: padding-box;
            display: flex;
        }
        #boss1{
            text-align: center; 
            margin-left: 100px;
        }
        #muiten{
            margin: 0 100px 0 100px;
        }
        .footer{
        margin-top:30px ;
       }
       .price{
           font-size: 20px;
       }
       .packages .phan_trang a b.prev:before {
            content: "\f100";
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 22px;
            line-height: 30px;
        }
        .packages .phan_trang a b.next:before {
            content: "\f101";
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 22px;
            line-height: 30px;
        }

        span.color_current {
            color: #f44336;
        }

        .packages .ul_phan_page li {
            list-style: none;
            float: left;
        }

        .packages .ul_phan_page {
            margin-bottom: 0px;
            margin-top: 0px;
            float: left;
            padding-left: 0px;
        }

        .packages .ul_phan_page li {
            font-size: 25px;
            padding: 5px 9px;
            border: 1px solid #CCC;
            border-radius: 30px;
            line-height: 18px;
            margin-right: 2px;
        }
    </style>
</head>

<body>
    <div id="boss">
        
        <div id="muiten"><a href="http://localhost/webbanhang/"><img src="images/muiten.jpg" alt="" width="50px"></a></div>
        <div id="boss1"> <h3>Chào mừng bạn đến với trang Tin Tức Của BelleMode</h3></div>
    </div>
    <section class="packages" id="packages">

        <h1 class="heading">
            <span>*</span>
            <span>T</span>
            <span>I</span>
            <span>N</span>
            <span>T</span>
            <span>Ứ</span>
            <span>C</span>
            <span>*</span>
        </h1>
        <div class="box-container">

            <?php
                // Nếu người dùng submit form thì thực hiện
                /*        $_GET=array_change_key_case($_GET,CASE_LOWER);*/
                // Gán hàm addslashes để chống sql injection
                // $search = addslashes($_GET['s']);// Gán hàm addslashes để chống sql injection
                $result = mysqli_query($conn,"SELECT COUNT(id) AS total FROM tintuc ");
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total']; //gán tổng số record là total, đếm bằng id sản phẩm
                // tim limit va current
                $current_page = isset($_GET['page']) ? $_GET['page']:1; //kiểm tra $_GET['page'] khi bấm trang kế có tồn tại không
                $litmit =6; // tổng số record trên 1 trang
                $total_page =ceil($total_records / $litmit); // tổng số page khi mỗi page hiển thị bao nhiêu sp
                if($current_page > $total_page )
                {
                    $current_page = $total_page;
                }
                else if($current_page < 1 )
                {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $litmit;
                /**
                * bắt lỗi truy vấn cơ sở dữ liệu
                */
                try {
                    $result1 = mysqli_query($conn,"SELECT * FROM tintuc LIMIT {$start}, {$litmit}");
                } catch (Exception $e) {
                        
                }   
            ?>

            <?php
                // $qr = "SELECT * FROM tintuc";
                // $result_qr = mysqli_query($conn, $qr);
                // while($row = mysqli_fetch_array($result_qr))
                // {
                if (isset($result1))
                {
                    while ($row = mysqli_fetch_assoc($result1))
                    {
            ?>
                    <div class="box">
                        <img src="images/tintuc/<?php echo $row['image'] ?>" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $row['title'] ?></h3>
                            <p><?php echo $row['time'];
                            ?></p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="price"><?php echo $row['content_index'] ?> </div>
                            <a href="tintuc_detail.php?id=<?php echo $row['id']  ?>" class="btn">Đọc ngay</a>
                        </div>
                    </div>
            <?php   } 
                }   ?>

        </div>
        <br>
        <br>
        
        <div class="phan_trang" style="margin-left: calc(936px/2);">
            <?php
            if($current_page > 1 && $total_page > 1)
            {
                echo "<a href='tintuc.php?page=".($current_page - 1)."'>
                                    <b class='glyphicon glyphicon-circle-arrow-left' style='font-size: 25px;'></b>

                      </a>";
                }
            echo"<ul class='ul_phan_page'>";
            for($i = 1;$i <= $total_page;$i++)
            {
                if($i == $current_page)
                {
                    echo "<li><span class='color_current'>".$i."</span></li>";
                }
                else
                    echo '<li><a href="tintuc.php?page='.$i.'">'.$i.'</a></li>';
            }
            echo"</ul>";
            if($current_page < $total_page  && $total_page > 1)
            {
                echo "<a href='tintuc.php?&page=".($current_page + 1)."'>
                                <b class='glyphicon glyphicon-circle-arrow-right' style='font-size: 25px;'></b>
                    </a>";
            }

            ?>
        </div>

    </section>
    
    <!-- packages section ends -->
   <div class="footer"></div><img src="images/footer1.jpg" alt="" width="100%"></div>
   
</body>
<footer>

</footer>
</html>
