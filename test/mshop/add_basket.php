<?php
require ('sql_con.php');

$sel_item_id = preg_replace("/[^0-9]/", "", $_POST['sel_item_id']);
$sel_item_qty = preg_replace("/[^0-9]/", "", $_POST['sel_item_qty']);
$sel_item_size = preg_quote(addslashes($_POST['sel_item_size']));
$sel_item_color = preg_quote(addslashes($_POST['sel_item_color']));
$PHPSESSID = preg_quote(addslashes($_COOKIE['PHPSESSID']));

if(!empty($sel_item_id))
{
	if($sel_item_qty < 1)
	{
		$sel_item_qty = 1;
	}


	// 장바구니 상품 가져오기
	$get_iteminfo_sql = "SELECT item_title FROM store_items WHERE id='" . $sel_item_id . "'";
	$get_iteminfo_res = mysqli_query($conn, $get_iteminfo_sql) or die(mysqli_connect_error());

	if(mysqli_num_rows($get_iteminfo_res) < 1)
	{
		echo ("유효하지 않은 상품입니다.");
		exit;
	}
	else
	{
		while($item_info = mysqli_fetch_array($get_iteminfo_res))
		{
			$item_title = stripslashes($item_info['item_title']);
		}

		// 상품을 장바구니에 추가
		$add_basket_sql = "INSERT INTO store_shoppertrack (
							session_id, sel_item_id, sel_item_qty,
							sel_item_size, sel_item_color, date_added
						) VALUES (
							'" . $PHPSESSID . "',
							'" . $sel_item_id . "',
							'" . $sel_item_qty . "',
							'" . $sel_item_size . "',
							'" . $sel_item_color . "',
							now()
						)";
		$add_basket_res = mysqli_query($conn, $add_basket_sql) or die(mysqli_connect_error());

		mysqli_close($conn);

		header('Location: show_cart.php');
	}
}
else
{
	header('Location: get_store.php');
}

?>