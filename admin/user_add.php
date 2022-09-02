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
    <title>Thêm tài khoản người dừng</title>
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
    <form action="user_add.php" method="post" enctype="multipart/form-data" class="container">
        <div class="form-group">
            <p>Nhập id</p>
            <input type="text" name="id" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập username</p>
            <input type="text" name="username" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập password</p>
            <input type="text" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập fullname</p>
            <input type="text" name="fullname" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập email</p>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập phone</p>
            <input type="text" name="phone" id="" class="form-control">
        </div>
        <div class="form-group">
            <p>Nhập address</p>
            <input type="text" name="address" id="" class="form-control">
        </div>
        <input type="hidden" name="creted" value="<?php echo date('d/m/y') ?>">
       <div class="form-group">
        <p>Nhập level</p>
            <input type="text" name="level" id="" class="form-control">
       </div>
        <div class="form-group">
            <p>Nhập idgroup</p>
            <input type="text" name="idgroup" id="" class="form-control">
        </div>
        
        
        <input type="submit" value="Thêm" name="sbm" class="btn btn-success">
        
    </form>
    <?php
        if(!empty($_POST)){
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $creted = $_POST['creted'];
            $level = $_POST['level'];
            $idgroup = $_POST['idgroup'];

            $sql_insert_user =  "INSERT INTO `user`(`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `created`, `level`, `idgroup`) VALUES ('$id','$username','$password','$fullname','$email','$phone','$address','$creted','$level','$idgroup')";

            $insert = mysqli_query($conn, $sql_insert_user);

            header('location: user.php');
        }

       
    ?>
</body>
</html>  