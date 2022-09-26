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
/*mysqli_close($conn);*/
session_start();
?>
