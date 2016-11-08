<?php 
session_start();
include ("cartAction.php");


$method = isset($_POST['method']) ? $_POST['method'] : "";
$p_no = isset($_POST['p_no']) ? $_POST['p_no'] : "";
$p_name = isset($_POST['p_name']) ? $_POST['p_name'] : "";
$p_brand = isset($_POST['p_brand']) ? $_POST['p_brand'] : "";
$p_price = isset($_POST['p_price']) ? $_POST['p_price'] : "";
$p_size = isset($_POST['p_size']) ? $_POST['p_size'] : "";
$p_image = isset($_POST['p_image']) ? $_POST['p_image'] : "";
$m_email = isset($_POST['m_email']) ? $_POST['m_email'] : "";
$p_qty = isset($_POST['p_qty']) ? $_POST['p_qty'] : "";

/*
$method = $_POST['method'];
$p_no = $_POST['p_no'];
$p_name = $_POST['p_name'];
$p_brand = $_POST['p_brand'];
$p_price = $_POST['p_price'];
$p_size = $_POST['p_size'];
$p_image = $_POST['p_image'];
$p_qty = $_POST['p_qty'];
$m_email = $_POST['m_email'];
*/

//$method = 'reset';
$cart = new cart();
$cart->set_cart($method, $p_no, $p_name, $p_brand, $p_price, $p_size, $p_image, $m_email, $p_qty);

Header("Location: ../../order/cart.php");

?>






