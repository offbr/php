<?php 
  include("../config/dbconfig.php");
?>

<?

session_start();

if(!isset($_SESSION['m_email'])){ //세션값이 없을 경우 로그인 페이지 이동
    header('Location:../mypage/login.php');
}

$m_email = $_SESSION['m_email'];

if(isset($_POST['p_no'])){
	$p_no = $_POST['p_no'];
}else{
  $p_no = 0;
}

$sql = "select * from product where p_no = '$p_no'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>mono</title>

<style type="text/css">

table{
  font-size: 13px;
  color: #949494;
}
.center{
  text-align: center;
}
</style>

</head>
<div class="container">
<body>

<!-- header -->
<?php include("../header.html") ?>
<!-- //header -->
<br><br>

<!-- 상품테이블 -->
<div class="container-fluid">
<div class="row">	

  <!-- Table -->
 <div class="col-md-9 text-center">
 	<table class="table">
 		<tr><th class="center">Product</th><th class="center">Price</th>
    <th class="center">Qty</th><th class="center">Delete</th><th class="center">Total</th></tr>
 		<?
 		while($row = mysqli_fetch_assoc($result)){
	  ?>
      <tr>
      <td>
      <a href="#"><img style="border: none;" src="../productimages/<?= $row['p_image'] ?>.jpg" width="36px" height="100px"></a>
      <div style="display: inline-block;">
      <?=$row['p_brand']?> <br>
      <?=$row['p_name']?> - <?=$row['p_size']?>
      </div>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?=$row['p_price']?>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
        Qty
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?=$row['p_price'] * 1?>
      </td>
      </tr>
    <?
		}
		mysqli_free_result($result);
		mysqli_close($conn);

 		?>
 	</table>
 </div>

 	<div class="col-md-3 text-center" style="border: 7px double; color: #f0f0f0;">
  		<div id="product_detail">
  		<br>
  		<h6><?= $row['p_brand'] ?></h6>
      	<h4><?= $row['p_name'] ?></h4>
 	  	<p class="pprice"><span class="price">￦ <?= $row['p_price'] ?></span></p>
 	  	<form action="../order/cart.php" name="f" method="post" class="product_frm" 
      style="padding-top: 10px; padding-bottom: 10px;">
 	  	<input type="hidden" name="p_no" value="<?= $row['p_no'] ?>">
 	  	<p class="pprice"><span class="price">size : <?= $row['p_size'] ?></span></p>
 	  	<br>
 	  	<h5 style="font-weight: bold;">QUANTITY</h5>
 	  		<button type="submit" class="btn btn-default btn-xs" style="">UPDATE</button></a><br><br>
 	  		<button type="submit" class="btn btn-default btn-xs" style="">CHECKOUT</button></a>
 	  	</form>
 	  	<h6>by 5BORONYC</h6>
 	  	</div>
  	</div>
  <!-- //table -->
  
</div>
</div>
<!-- //상품테이블 -->


<br><br>
<!-- footer -->
<?php include("../footer.html") ?>
<!-- //footer -->

</body>
</div>
</html>
