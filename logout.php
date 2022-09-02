<?php
session_start();
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
    if (isset($_GET['id']) && $_GET['id'] != NULL) {
        $id = $_GET['id'];
        if (empty($id)) {
            unset($_SESSION['cart']);
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }
    header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
    header("location:".$_SERVER['HTTP_REFERER']);
}
?>