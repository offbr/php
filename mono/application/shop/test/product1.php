<?php 
  session_start();
  include("../config/dbconfig.php");
?>

<?
$action = isset($_GET['action']) ? $_GET['action'] : "";
$p_no = isset($_GET['p_no']) ? $_GET['p_no'] : "1";
$p_name = isset($_GET['p_name']) ? $_GET['p_name'] : "";
$m_email = isset($_SESSION['m_email']) ? $_SESSION['m_email'] : "";


$sql = "select * from product where p_no = '$p_no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); //mysqli_fetch_row($result) //row[0];
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<script type="text/javascript">

 function viewDisp(){
    $("#p_qty").val($("#qty").val());
    $("#pclass").show("slow");
    f.submit();
 }

 function qtyLeft(){
  alert("aa");
 }
 
 function qty(number){

  if(isNaN($("#qty").val()) || $("#qty").val() < 1){
          $("#qty").focus();
          $("#qty").val(1);
          return;
     }

  if($("#qty").val() >= $("#p_stock").val()){
      $("#qty").val($("#p_stock").val() - 1);
  }

   var q = parseInt($("#qty").val())+parseInt(number);    
   $("#qty").val(q);
 }
  
function cartOk(){
  $("#cart").submit();
}

</script>

<style>
#product_detail {
	color: #444444;
	letter-spacing: 2px;
}
.price{
	color: #949494;
	letter-spacing: normal;
}
.product_div{
	border-top: 1px solid #f0f0f0;
	border-bottom: 1px solid #f0f0f0;
}
.pclass{
  color: #949494;
}
</style>

</head>

<div class="container">
<body>

<!-- header -->
<?php include("../header.html") ?>
<!-- //header -->
<br>

<!-- subMenu -->
<?php include("../shopLink.html") ?>
<!-- //subMenu -->
<br>


<!-- 상품표시 -->
<div class="container-fluid">
<div class="row">	

	<div class="col-md-6 text-center">
    <a href="#" class="thumbnail" style="border: none;" onclick="javascript:goProduct(<?= $row['p_no'] ?>);">
      <img style="border: none;" src="../productimages/<?= $row['p_detailimage'] ?>.jpg" alt="">
    </a>
  	</div>
  	
  	<div class="col-md-6 text-center" style="border: 7px double; color: #f0f0f0;">
  		<div id="product_detail">
  		<br>
  		<h6><?= $row['p_brand'] ?></h6>
      	<h4><?= $row['p_name'] ?></h4>
 	  	<p class="pprice"><span class="price">￦ <?= $row['p_price'] ?></span></p>
 	  	<div class="product_div" style="padding-top: 10px; padding-bottom: 10px;">
 	  	
      <input type="hidden" id="p_stock" value="<?= $row['p_stock'] ?>">

      <p class="pprice"><span class="price">size : <?= $row['p_size'] ?></span></p>
      <br>
      <h5 style="font-weight: bold;">QUANTITY</h5>
        <a href="#" onclick="javascript:qty(-1)" style="height: 25px; text-decoration: none;">
        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        </a>
        <input type="text" id="qty" style="text-align: center;" value="1" size="1" name="qnantity">
         <a href="#" onclick="javascript:qty(1)" style="height: 25px; text-decoration: none;">
        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
        </a>
        <br><br>
        <button class="btn btn-default btn-lg" onclick="javascript:viewDisp()">ADD TO CART</button></a>
      <p id="pclass" class="pclass" style="display: none;">
      <br>Item added to cart! <a href="#" onclick="javascript:cartOk()" class="aclass">View cart and check out »</a>
      </p>
      </div> 
      <h6>by 5BORONYC</h6>
      </div>
    </div>
    
</div>
</div>
<!-- //상품표시 -->

<form action="shopmodel/cart_Ok.php" method="post" name="cart" id="cart">
    <input type="hidden" name="method" value="add">
    <input type="hidden" name="p_no" value="<?= $row['p_no'] ?>">
    <input type="hidden" name="p_name" value="<?= $row['p_name'] ?>">
    <input type="hidden" name="p_brand" value="<?= $row['p_brand'] ?>">
    <input type="hidden" name="p_price" value="<?= $row['p_price'] ?>">
    <input type="hidden" name="p_size" value="<?= $row['p_size'] ?>">
    <input type="hidden" name="p_image" value="<?= $row['p_image'] ?>">
    <input type="hidden" name="m_email" value="<?= $m_email ?>">
    <input type="text" id="p_qty" name="p_qty" value="">
</form>

<br><br>
<!-- footer -->
<?php include("../footer.html") ?>
<!-- //footer -->


</body>
</div>
</html>











