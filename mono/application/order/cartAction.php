<?php
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// include database configuration file
include("../config/dbconfig.php");
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['p_no']) && !empty($_REQUEST['p_qty'])){
        $p_no = $_REQUEST['p_no'];
        $p_qty = $_REQUEST['p_qty'];
        // get product details
        $query = $conn->query("SELECT * FROM product WHERE p_no = ".$p_no);
        $row = $query->fetch_assoc();
        $itemData = array(
            'p_no' => $row['p_no'],
            'p_name' => $row['p_name'],
            'p_brand' => $row['p_brand'],
        	'p_price' => $row['p_price'],
        	'p_size' => $row['p_size'],
        	'p_stock' => $row['p_stock'],
        	'p_image' => $row['p_image'],
        	'p_detailimage' => $row['p_detailimage'],
            'p_qty' => $p_qty
        );
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'../index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['p_no'])){
        $itemData = array(
            'row_p_no' => $_REQUEST['p_no'],
            'p_qty' => $_REQUEST['p_qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['p_no'])){
        $deleteItem = $cart->remove($_REQUEST['p_no']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['m_email'])){
        // insert order details into database
        $insertOrder = $conn->query("INSERT INTO orders (m_email, total_price, created, modified) VALUES ('".$_SESSION['m_email']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $conn->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){  
                $sql .= "INSERT INTO order_items (order_no, product_no, quantity) VALUES ('".$orderID."', '".$item['p_no']."', '".$item['p_qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $conn->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        //header("Location: http://localhost:8080/mono/application/index.php");
    }
}else{
    //header("Location: http://localhost:8080/mono/application/index.php");
}