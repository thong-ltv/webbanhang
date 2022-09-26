<?php
include("apps/config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

       .heading {
            text-align: center;
            padding: 2.5rem 0
        }

        .heading span {
            font-size: 3.5rem;
            background: rgba(255, 165, 0, .2);
            color: var(--orange);
            border-radius: .5rem;
            padding: .2rem 1rem;
            font-size: 2rem;
            color: #FF9800;
        }

        .heading span.space {
            background: none;
        }

        footer {
            background-color: #2E3639;
            /* position: relative; */
            z-index: 1;
            /*margin-top: 800px;*/
            bottom: 0;
        }

        footer .splitter {
            background-color: #ac0;
            background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.25, rgba(255, 255, 255, .2)), color-stop(.25, transparent), color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .2)), color-stop(.75, rgba(255, 255, 255, .2)), color-stop(.75, transparent), to(transparent));
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
            background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
            background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
            background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
            background-image: linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
            -webkit-background-size: 50px 50px;
            -moz-background-size: 50px 50px;
            background-size: 50px 50px;
            -moz-box-shadow: 1px 1px 8px gray;
            -webkit-box-shadow: 1px 1px 8px gray;
            box-shadow: 1px 1px 8px gray;
            height: 20px;
        }

        footer>ul {
            list-style: none outside none;
            margin: 0 auto;
            max-width: 1200px;
            overflow: hidden;
            padding: 25px 0;
            position: relative;
            width: 95%;
        }

        footer>ul li {
            float: left;
            padding: 20px 15px;
            width: 33.3%;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        footer>ul li:first-child {
            padding-left: 0;
        }

        footer>ul li:nth-child(3) {
            padding-right: 0;
        }

        footer>ul li .icon {
            font-size: 80px;
            line-height: 80px;
            text-align: center;
        }

        footer ul li p {
            color: #ffffff;
            text-align: center;
            font-size: 14px;
        }

        footer>ul li .text {
            color: #ffffff;
            font-size: 13px;
            line-height: 20px;
            margin-left: 105px;
            position: relative;
            text-align: justify;
        }

        .text h4 {
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .text a {
            border-bottom: 1px dotted transparent;
            color: #FFDD00;
            font-weight: bold;
            line-height: 30px;
        }

        .text a:hover {
            border-color: #FFDD00;
        }


        /* bar section */

        footer .bar {
            background-color: #1E2629;
            padding: 20px 0;
        }

        footer .bar-wrap {
            font-size: 12px;
            margin: 0 auto;
            max-width: 1200px;
            position: relative;
            width: 95%;
        }

        .links {
            float: left;
            list-style: none outside none;
            position: relative;
        }

        .links li {
            float: left;
            margin-right: 10px;
        }

        .links a {
            color: #778888;
        }

        .links a:hover {
            color: #FFFFFF;
        }

        .social {
            position: absolute;
            right: 0;
            top: 0;
        }

        .social a {
            color: #fff;
            margin-left: 20px;
        }

        .social a:hover {
            color: #ffffff;
        }

        .social .icon {
            display: inline-block;
            font-size: 36px;
            margin-right: 5px;
            vertical-align: middle;
            -webkit-transition: -webkit-transform .3s linear;
            -moz-transition: -moz-transform .3s linear;
            -ms-transition: -ms-transform .3s linear;
            -o-transition: -ms-transform .3s linear;
            transition: transform .3s linear;
        }

        .social a:hover .icon {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .social .info {
            display: inline-block;
            vertical-align: middle;
        }

        .social .info .num {
            display: block;
        }

        .copyright {
            color: #778888;
            margin-top: 5px;
        }

    </style>
</head>
<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else
{
    $id = 1;
}

?>
<body>
    <div id="boss">
        
        <div id="muiten"><a href="http://localhost/webbanhang/"><img src="images/muiten.jpg" alt="" width="50px"></a></div>
        <div id="boss1"> <h3>Chào mừng bạn đến với trang Tin Tức Của BelleMode</h3></div>
    </div>

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
   
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <?php
                    $qr = "SELECT * FROM tintuc";
                    $result_qr = mysqli_query($conn, $qr);
                    $num_row = mysqli_num_rows($result_qr);
                    while($row = mysqli_fetch_array($result_qr))
                    {
                        if($row['id'] == $id)
                        {
                ?>
                            <h4><?php  echo $row['title'] ?></h4>
                            <p><?php echo $row['time']  ?></p>
                            <p><?php echo $row['content_index']  ?></p>
                            <img src="images/tintuc/<?php echo $row['image']  ?>" class="mx-auto d-block" style="width:50%">
                            <br>
                            <p><?php echo $row['content']  ?></p>
                <?php 
                        }
                    } 
                ?>
            </div>
            <div class="col-sm-2">
                <h5 style="text-decoration-line:underline;">Tin liên quan</h5>
                <?php
                    $start = rand(1, $num_row - 3);
                    $qr = "SELECT * FROM tintuc LIMIT {$start}, 3";
                    $result_qr = mysqli_query($conn, $qr);
                    while($row = mysqli_fetch_array($result_qr))
                    {
                ?>
                        
                        <img src="images/tintuc/<?php echo $row['image']  ?>" class="img-thumbnail" style="width:50%; ">
                        <a href="tintuc_detail.php?id=<?php  echo $row['id'] ?>" style="text-decoration: none;"><p style="font-weight: bold ;"><?php  echo $row['title'] ?></p></a>
                        <p><?php echo $row['time']  ?></p>
                        <br>
                        
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>

</body>

    <?php
    include("./apps/libs/footer.php");

    ?>

</html>