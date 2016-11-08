<?php 
  include("../../config/dbconfig.php");

include ("cartclass.php");
session_cache_limiter("");
session_start();

$cart = new cart;

$p_no = $_POST['p_no'];
$p_name = $_POST['p_name'];
$p_brand = $_POST['p_brand'];
$p_price = $_POST['p_price'];
$p_size = $_POST['p_size'];
$p_image = $_POST['p_image'];
$p_qty = $_POST['p_qty'];
$m_email = $_POST['m_email'];



$cart->set($p_no, $p_name, $p_brand, $p_price, $p_size, $p_image, $p_qty, $m_email);


$_SESSION["cart"] = array();
$_SESSION["cart"] = $cart;

//if(!$_SESSION["cart"][0]) { 
//	$_SESSION["cart"][0] = $cart; //$cart를 세션객체로 등록 /
//	$cart = new Cart; 
//}else{

//}

//if(isset($_SESSION['cart']) or is_array($_SESSION['cart'])) { 
			//현재 구상 item[]=01,1024,2 
			//item이 이미 있을경우(array) item에 대한 추가 
			//$count = sizeof($_SESSION['cart']); 


Header("Location: ../../order/cart.php");


/*
$is_p_no='';

if(!$_SESSION["p_no"][0]){ //생성된 세션이 없으면
	//$cart->set($p_no, $p_name, $p_brand, $p_price, $p_size, $p_image, $p_qty, $m_email);
	$_SESSION["p_no"][0] = $cart; //세션 array변수에 제품을 담는다.
}else{ //생성된 세션(장바구니) 가 있으면
    $s_c = count($_SESSION["p_no"]); //총 장바구니의 크기를 구한다. 
  	for($i=0;$i<$s_c;$i++) {//장바구니에 추가한 제품이 있는지 찾기 위한 for문
  		if($_SESSION["p_no"][$i] == $cart){ //저장된 제품이 있는지 검사
    		$is_p_no = 1; //이미 장바구니에 추가된 제품이라면 1을 저장
    		echo "장바구니에 추가한 제품이 이미 존재합니다.<br>";
    	  }
	}	
  
	if($is_p_no != 1) { //장바구니에 추가된 제품이 아니라면
		//$cart->set($p_no, $p_name, $p_brand, $p_price, $p_size, $p_image, $p_qty, $m_email);
		$_SESSION["p_no"][$s_c] = $cart;  //세션변수에 새로 제품 등록
	}
 }

//저장된 세션 배열 변수에서 장바구니 제품을 꺼내 온다.
global $s_c;

for($i=0;$i<$s_c;$i++) {
 	echo "귀하가 장바구니 추가한 제품은";
   	var_dump($_SESSION["p_no"][$i]) . "<br>";	
}
*/




/*
if(!$_SESSION["p_num"][0]) { //생성된 세션이 없으면
	$_SESSION["p_num"][0] = $product; //세션 array변수에 제품을 담는다.
}else{ //생성된 세션(장바구니) 가 있으면
    $s_c = count($_SESSION["p_num"]); //총 장바구니의 크기를 구한다. 
  	for($i=0;$i<$s_c;$i++) {//장바구니에 추가한 제품이 있는지 찾기 위한 for문
  		if($_SESSION["p_num"][$i] == $product){ //저장된 제품이 있는지 검사
    		$is_p_num = 1; //이미 장바구니에 추가된 제품이라면 1을 저장
    		echo "장바구니에 추가한 제품이 이미 존재합니다.<br>";
    	  }
	}	
  
	if($is_p_num != 1) { //장바구니에 추가된 제품이 아니라면
		$_SESSION["p_num"][$s_c] = $product;  //세션변수에 새로 제품 등록
	}
 }

 //저장된 세션 배열 변수에서 장바구니 제품을 꺼내 온다.
 global $s_c;
 
 for($i=0;$i<$s_c;$i++) {
   echo "귀하가 장바구니 추가한 제품은";
   echo $_SESSION["p_num"][$i] . "<br>";
 }
*/


?>












