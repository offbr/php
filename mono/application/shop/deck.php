<?php 
	include("../config/dbconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<script>
function goProduct(p_no){
	document.pFrm.p_no.value = p_no;
	document.pFrm.submit();
}
</script>

<style>
.brand{
	text-transform: uppercase;
	font-size: 10px;
}
label{
	text-transform: uppercase;
	font-size: 12px;
}
.money{
	color: #949494;
	font-size: 12px;
}
</style>

</head>
<div class="container">
<body>

<!-- header -->
<?php include("../header.php") ?>
<!-- //header -->
<br>

<!-- subMenu -->
<?php include("../shopLink.php") ?>
<!-- //subMenu -->

<br><br>

<!-- 상품표시 -->
<div class="container">
<div class="row">

<?php
   	//상품자료
   	
	$sql = "SELECT * from product order by p_no desc";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)){
	?>
	<div class="col-sm-6 col-md-4 text-center">
    <a href="#" class="thumbnail" style="border: none;" onclick="javascript:goProduct(<?= $row['p_no'] ?>);">
      <img style="border: none;" src="../productimages/<?= $row['p_image'] ?>.jpg" alt="">
      <label class="brand"><?= $row['p_brand'] ?></label><br>
 	  <label><?= $row['p_name'] ?></label><br>
 	  <label class="money">￦ <?= number_format($row['p_price']) ?></label>
    </a>
  	</div>
  	<?
  	}
  	mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
	mysqli_close($conn);
  	
 ?>

</div>
</div>
<!-- //상품표시 -->



<!-- 상품번호 -->
<form action="product.php" method="get" name="pFrm">
	<input type="hidden" name="p_no">
</form>
<!-- //상품번호 -->



<br><br>
<!-- footer -->
<?php include("../footer.php") ?>
<!-- //footer -->

</body>
</div>
</html>