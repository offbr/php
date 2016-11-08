<?php
session_start();
 
// get the product id
$p_no = isset($_POST['p_no']) ? $_POST['p_no'] : "";
$p_name = isset($_POST['p_name']) ? $_POST['p_name'] : "";
$p_qty = isset($_POST['p_qty']) ? $_POST['p_qty'] : "";
 

if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = array();
}
 
// check if the item is in the array, if it is, do not add
if(array_key_exists($p_no, $_SESSION['cart_items'])){
    // redirect to product list and tell the user it was added to cart
    //header('Location: products.php?action=exists&id' . $id . '&name=' . $name);
    //header('Location: products.php?action=exists&id' . $id . '&name=' . $name);
    Header("Location: ../../order/cart.php");
	//unset($_SESSION['cart_items'][3]);
}
 
// else, add the item to the array
else{
    $_SESSION['cart_items'][$p_no]['p_no']=$p_no;
    $_SESSION['cart_items'][$p_no]['p_name']=$p_name;
	$_SESSION['cart_items'][$p_no]['p_qty']=$p_qty;
	//echo "$p_qty";
    if (!empty($p_qty)){
        
    }
    // redirect to product list and tell the user it was added to cart
    //header('Location: products.php?action=added&id' . $id . '&name=' . $name);
    //Header("Location: ../../order/aa.php");
    Header("Location: ../../order/cart.php");
}
?>