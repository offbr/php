<?php
require ('sql_con.php');

$item_id = preg_replace("/[^0-9]/", "", $_GET['item_id']);




$display_block = "<h1>My Store - Item detail</h1>";


// 상품 가져오기
$get_item_sql = "SELECT c.id as cat_id, c.cat_title, si.item_title, si.item_price, si.item_desc, si.item_image FROM store_items AS si LEFT JOIN store_categories AS c ON c.id = si.cat_id WHERE si.id='" . $item_id . "'";
$get_item_res = mysqli_query($conn, $get_item_sql) or die(mysqli_connect_error());

if(mysqli_num_rows($get_item_res) < 1)
{
	$display_block .= "<p><em>Sorry, no categories to browse.</em></p>";
}
else
{
	while($item_info = mysqli_fetch_array($get_item_res))
	{
		$cat_id = $item_info['cat_id'];
		$cat_title = strtoupper(stripslashes($item_info['cat_title']));
		$item_title = stripslashes($item_info['item_title']);
		$item_price = $item_info['item_price'];
		$item_desc = stripslashes($item_info['item_desc']);
		$item_image = $item_info['item_image'];
	}

	// 상품 정보 출력
	$display_block .= "<p><strong><em>You are viewing:</em></strong><br /><a href='get_store.php?cat_id=${cat_id}'>${cat_title}</a> > ${item_title}</strong></p>
	<table cellpadding='3'>
		<tr>
			<td valign='middle' align='center'>
				<img src='img/${item_image}'>
			<td valign='middle'>
				<p><strong>Description:</strong><br />${item_desc}</p>
				<p><strong>Price:</strong>\$${item_price}</p>
				<form method='post' action='add_basket.php'>";
	mysqli_free_result($get_item_res);

	// 색상 얻기
	$get_color_sql = "SELECT item_color FROM store_item_color WHERE item_id='" . $item_id . "' ORDER BY item_color";
	$get_color_res = mysqli_query($conn, $get_color_sql) or die(mysqli_connect_error());

	if(mysqli_num_rows($get_color_res) > 0)
	{
		$display_block .= "<p><strong>Available Color:</strong><br />
							<select name='sel_item_color'>";
		while($colors = mysqli_fetch_array($get_color_res))
		{
			$item_color = $colors['item_color'];
			$display_block .= "<option value='${item_color}'>${item_color}</option>";
		}
		$display_block .= "</select>";
	}
	mysqli_free_result($get_color_res);

	// 크기 얻기
	$get_sizes_sql = "SELECT item_size FROM store_item_size WHERE item_id='" . $item_id . "' ORDER BY item_size";
	$get_sizes_res = mysqli_query($conn, $get_sizes_sql) or die(mysqli_connect_error());

	if(mysqli_num_rows($get_sizes_res) > 0)
	{
		$display_block .= "<p><strong>Available sizes:</strong><br />
							<select name='sel_item_size'>";
		while($sizes = mysqli_fetch_array($get_sizes_res))
		{
			$item_size = $sizes['item_size'];
			$display_block .= "<option value='${item_size}'>${item_size}</option>";
		}
		$display_block .= "</select>";
	}
	mysqli_free_result($get_sizes_res);

	$display_block .= "<p><strong>Select Quantity:</strong>
							<select name='sel_item_qty'>";

	for($i=1; $i<11; $i++)
	{
		$display_block .= "<option value='${i}'>${i}</option>";
	}

	$display_block .= "</select>
						<input type='hidden' name='sel_item_id' value='" . $item_id . "'>
						<p><input type='submit' name='Submit' value='Add to Cart'></p>
						</form>
						</table>";
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