<?php
require ('sql_con.php');


$PHPSESSID = preg_quote(addslashes($_COOKIE['PHPSESSID']));




$display_block = "<h1>Your Shopping Cart</h1>";
?><a href="get_store.php">Home</a><?


// 장바구니 가져오기
$get_cart_sql = "SELECT st.id, si.item_title, si.item_price, si.item_desc, st.sel_item_qty, st.sel_item_size, st.sel_item_color FROM store_shoppertrack AS st LEFT JOIN store_items AS si ON si.id = st.sel_item_id WHERE session_id = '" . $PHPSESSID . "'";
$get_cart_res = mysqli_query($conn, $get_cart_sql) or die(mysqli_connect_error());


if(mysqli_num_rows($get_cart_res) < 1)
{
	$display_block .= "<p>You have no items in your cart. Please <a href='get_store.php'>continue to shop</a>!</p>";
}
else
{
	// 장바구니 정보 출력
	$display_block .= "<table celpadding='3' cellpadding='3' border='1' width='98%'>
		<tr>
			<th>Title
			<th>Size
			<th>Color
			<th>Price
			<th>Qty
			<th>Total Price
			<th>Action
	";

	while($cart_info = mysqli_fetch_array($get_cart_res))
	{
		$id = $cart_info['id'];
		$item_title = stripslashes($cart_info['item_title']);
		$item_price = $cart_info['item_price'];
		$item_qty = $cart_info['sel_item_qty'];
		$item_color = $cart_info['sel_item_color'];
		$item_size = $cart_info['sel_item_size'];
		$item_desc = stripslashes($cart_info['item_desc']);
		$total_price = sprintf("%.02f", $item_price * $item_qty);

		$display_block .= "<tr>
						<td align='center'>${item_title}<br />
						<td align='center'>${item_size}<br />
						<td align='center'>${item_color}<br />
						<td align='center'>\$${item_price}<br />
						<td align='center'>${item_qty}<br />
						<td align='center'>\$${total_price}<br />
						<td align='center'><a href='remove_basket.php?id=${id}'>Remove</a>
		";
	}
	$display_block .= "</table>";
}

mysqli_close($conn);
?>

<html>
<head>
<title>My Store</title>
</head>
<body>
<?php echo $display_block; ?>
</body>
</html>