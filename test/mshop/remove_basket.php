<?php
require ('sql_con.php');


$id = preg_replace("/[^0-9]/", "", $_GET['id']);
$PHPSESSID = preg_quote(addslashes($_COOKIE['PHPSESSID']));




if(!empty($id) && !empty($PHPSESSID))
{
	// 장바구니 삭제
	$delete_item_sql = "DELETE FROM store_shoppertrack WHERE id='" . $id . "' and session_id = '" . $PHPSESSID . "'";
	$delete_item_res = mysqli_query($conn, $delete_item_sql) or die(mysqli_connect_error());

	mysqli_close($conn);

	header("Location: show_cart.php");
}
else
{
	header("Location: get_store.php");
}
?>