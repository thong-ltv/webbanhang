<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
require_once ("../apps/config.php");
if(!empty($_POST['task']) && $_POST['task'] == 'delete') {
    $data = file_get_contents('php://input'); // Lấy tất cả dữ liệu tới
    $spid= []; // Mảng mã sản phẩm được chọn
    foreach(explode("&", $data) as $eeee) { // Chia dữ liệu thành các gói nhỏ
        $a = explode('=', $eeee);
        //list($key,$value) = $a;
        $key = $a[0];
        $value = $a[1];
        if($key != 'spid') continue; // Nếu không phải mã sản phẩm thì bỏ qua
        $spid[] = $value; // Nếu là mã sản phẩm thì thêm vào biến $spid
        }
    foreach($spid as $id) {
        mysqli_query($conn,'DELETE FROM `sanpham` WHERE `sanpham`.`id_sanpham` = '.$id);
    }
}
?>
<?php include ("headeradm.php"); ?>
<body>
<div class="clearfix">
    <div id="sidebar-bg"></div>
    <div id="sidebar" role="navigation">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-th"></i><span> Danh mục quản lý</span>
                    <b class="fa fa-plus-sign visible-xs pull-right"></b>
                </h3>
            </div>
            <ul id="menu" class="list-group">
                <li class="list-group-item">
                    <a href="post.php">
                        <i class="fa fa-edit"></i> <span>Tin tức</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="product.php">
                        <i class="fa fa-fire"></i><span>Sản phẩm</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="type_product.php">
                        <i class="fa fa-bars"></i> <span>Loại sản phẩm</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="contact.php">
                        <i class="fa fa-envelope-o"></i> <span>Phản hồi<span class="badge pull-right">1</span></span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="slider.php">
                        <i class="fa fa-picture-o"></i> <span>Slider</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="user.php">
                        <i class="fa fa-user"></i> <span>Tài khoản</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="setting.php">
                        <i class="fa fa-wrench"></i> <span>Cấu hình</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="main">
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Trang quản trị</a></li>
            <li class="active"><a href="product.php">Sản phẩm</a></li>
        </ol>
        <div class="col-xs-12">
            <form id="post_form" method="post" action="product_search.php" role="form">
                <div class="col-xs-12">
                    <div class="form-group">
                        <!-- Single button -->
                        <div class="btn-group">
                            <select id="task" name="task" class="form-control">
                                <option>Tác vụ</option>
                                <option value="delete">Xóa</option>
                                <option value="deactive">Ẩn</option>
                                <option value="active">Hiện</option>
                            </select>
                        </div>
                        <a href="product_add.php" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>
                        
                            <div class="btn-group pull-right hidden-xs" id="div-search">
                                <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tìm kiếm">
                                <span class="fa fa-search"></span>
                                <input type="submit" value="Tìm kiếm" class="btn btn-success">
                            </div>
                            
                      
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><input id="check_all" type="checkbox"></th>
                            <th class="hidden-xs">ID</th>
                            <th class="hidden-xs">Mã</th>
                            <th>Sản phẩm</th>
                            <th class="hidden-sm hidden-xs">Giá</th>
                            <th class="hidden-sm hidden-xs">Ngày thêm</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                            <th>Tình trạng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $danhmuc_query = mysqli_query($conn,"SELECT * from sanpham ");
                        while ($danhmuc_items = mysqli_fetch_array($danhmuc_query))
                        {
                        ?>
                        <tr>
                            
                            <td>
                                <input name="spid" type="checkbox" value="'.$danhmuc_items['id_sanpham'].'">
                            </td>
                             <td class="hidden-xs"><?php echo $danhmuc_items['id_sanpham'];?></td>
                            <td class="hidden-xs"><?php echo $danhmuc_items['code_product'];?></td>
                            <td><?php echo $danhmuc_items['tensp'];?>'</td>
                             <td class="hidden-sm hidden-xs"><?php echo number_format($danhmuc_items['price']);?>  VNĐ</td>
                             <td class="hidden-sm hidden-xs"> <?php echo $danhmuc_items['date'];?></td>
                            <td>
                                <a href="product_edit.php?idd=<?php echo $danhmuc_items['id_sanpham'];?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa sản phẩm"></i></a>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?');" href="product_delete.php?sidd=<?php echo $danhmuc_items['id_sanpham'];?>"><i class="fa fa-times text-danger" ></i></a>
                            </td>
                            <td>
                                <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>
                            </td>
                       </tr>   
                       <?php }?>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <ul class="pagination" id="step5">
                            <li class="disabled"><span>«</span></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                    <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
                    <p class="note-items"><i class="fa fa-check text-success"></i> Hiển thị với người dùng.</p>
                    <p class="note-items"><i class="fa fa-times text-danger"></i> Ẩn với người dùng</p>
                </div>
            </form>
        </div>
    </div>
    <!--END #main-->
</div>
</body>
</html>
