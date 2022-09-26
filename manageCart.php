 <?php

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myItem = array_column($_SESSION['cart'], 'id_sanpham');
        
            if(in_array($_POST['id_sanpham'], $myItem)){
                echo "<script>
                    alert('Sản phẩm đã tồn tại!!!');
                    window.location.href='index.php';
                    </script>";
            }
            else
            {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('id_sanpham' => $_POST['id_sanpham'], 'images' => $_POST['images'], 'title' => $_POST['title'], 'price' => $_POST['price'], 'quantity' => 1);
                echo "<script>
                    alert('Sản phẩm đã được thêm vào giỏ');
                    window.location.href='index.php';
                    </script>";
            }
        }
        else
        {
            $_SESSION['cart'][0] = array( 'id_sanpham' => $_POST['id_sanpham'], 'images' => $_POST['images'], 'title' => $_POST['title'], 'price' => $_POST['price'], 'quantity' => 1);
            echo "<script>
                    window.location.href='index.php';
                  </script>";
        }
    }
    else
    {
        
    }

    if(isset($_POST['mod_quantity']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['id_sanpham'] == $_POST['id_sanpham'])
                {
                    $_SESSION['cart'][$key]['quantity'] = $_POST['mod_quantity'];
    
                    echo
                    "
                        <script>
                            window.location.href = 'cart.php';
                        </script>
                    ";
                }
            }
        }
}

?>