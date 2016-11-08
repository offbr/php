<?php
require ('sql_con.php');


$display_block = "<h1>My Categories</h1>
<p>Select a category to see its items</p>";

// 카테고리 가져오기
$get_cats_sql = "SELECT id, cat_title, cat_desc FROM store_categories ORDER BY cat_title";
$get_cats_res = mysqli_query($conn, $get_cats_sql) or die(mysqli_connect_error());

if(mysqli_num_rows($get_cats_res) < 1)
{
	$display_block = "<p><em>Sorry, no categories to browse.</em></p>";
}
else
{
	while($cats = mysqli_fetch_array($get_cats_res))
	{
		$cat_id = $cats['id'];
		$cat_title = strtoupper(stripslashes($cats['cat_title']));
		$cat_desc = stripslashes($cats['cat_desc']);

		$display_block .= "<p><strong><a href='?cat_id=${cat_id}'>${cat_title}</a></strong><br />${cat_desc}</p>";

		if(isset($_GET['cat_id']))
		{
			// 카테고리 상품가져오기
			if($_GET['cat_id'] == $cat_id)
			{
				$get_items_sql = "SELECT id, item_title, item_price FROM store_items WHERE cat_id = '${cat_id}' ORDER BY item_title";
				$get_items_res = mysqli_query($conn, $get_items_sql) or die(mysqli_connect_error());

				if(mysqli_num_rows($get_items_res) < 1)
				{
					$display_block = "<p><em>Sorry, no categories to browse.</em></p>";
				}
				else
				{
					$display_block .= "<u1>";
					while($items = mysqli_fetch_array($get_items_res))
					{
						$item_id = $items['id'];
						$item_title = stripslashes($items['item_title']);
						$item_price = $items['item_price'];

						$display_block .= "<li><a href='show_item.php?item_id=${item_id}'>${item_title}</a></strong>(\$${item_price})</li>";
					}
					$display_block .= "</u1>";
				}
				mysqli_free_result($get_items_res);
			}
		}
	}
}

mysqli_free_result($get_cats_res);
mysqli_close($conn);
?>

<html>
<head>
<title>My Categories</title>
</head>
<body>
<?php echo $display_block; ?>
</body>
</html>