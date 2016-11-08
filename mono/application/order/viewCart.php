<?php 
  include 'Cart.php';
  include("../config/dbconfig.php");
  $cart = new Cart;
?>
<?

if(!isset($_SESSION['m_email'])){ //세션값이 없을 경우 로그인 페이지 이동
    header('Location:../mypage/login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>mono</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function updateCartItem(obj,p_no){
    $.get("cartAction.php", {action:"updateCartItem", p_no:p_no, p_qty:obj.value}, function(data){
        if($.trim(data) == 'ok'){
            location.reload();
        }else{
			alert('Cart update failed, please try again.');
        }
    });
}
</script>

<style type="text/css">
table{
  font-size: 13px;
  color: #949494;
}
.center{
  text-align: center;
}
input[type="number"]{width: 20%;}
</style>

</head>
<div class="container">
<body>

<!-- header -->
<?php include("../header.php") ?>
<!-- //header -->
<br><br>

<!-- 상품테이블 -->
<div class="container-fluid">
<div class="row"> 

  <!-- Table -->
 <div class="col-md-9 text-center">
  <table class="table">
    <tr>
    <th class="center">Product</th>
    <th class="center">Price</th>
    <th class="center">Qty</th>
    <th class="center">Delete</th>
    <th class="center">Total</th>
    </tr>
    
    <?php
    $_SESSION['count'] = $cart->total_items();
    if($cart->total_items() > 0){
    	//get cart items from session
        $cartItems = $cart->contents();
        foreach($cartItems as $item){
    ?>
      <tr style="text-align: center;">
      <td>
      <a href="http://localhost:8080/mono/application/shop/product.php?p_no=<?= $item["p_no"] ?>"><img style="border: none;" src="../productimages/<?= $item["p_detailimage"] ?>.jpg" width="36px" height="100px"></a>
      <div style="display: inline-block;">
      <?= $item["p_brand"] ?> <br>
      <?= $item["p_name"] ?>  - <?= $item["p_size"] ?> 
      </div>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?= '￦ '.number_format($item["p_price"])  ?> 
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <input type="number" class="center" value="<?= $item["p_qty"] ?>" onchange="updateCartItem(this, '<?= $item["row_p_no"] ?>')">
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <a href="cartAction.php?action=removeCartItem&p_no=<?= $item["row_p_no"] ?>" class="btn btn-default" onclick="return confirm('정말 삭제하시겠습니까?')"><i class="glyphicon glyphicon-trash"></i></a>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?=  '￦ '.number_format($item["p_qty"] * $item['p_price']) ?> 
      </td>
      </tr>
    <?
    }
  }else{?>
    	<tr><td colspan="5"><p style="text-align: center;">Your cart is empty.....</p></td>
<?}?>  	
  
  </table>
 </div>

  <div class="col-md-3 text-center" style="border: 7px double; color: #454545;">
      <br>
      <? if($cart->total_items() > 0){ ?>
      <strong>Total</strong>
      <p><span> <?= '￦ '.number_format($cart->total()).' won'; ?> </span></p>
      <? } ?>
      <form action="../order/cart.php" name="f" method="post" class="product_frm" 
      style="padding-top: 10px; padding-bottom: 10px;">
      <input type="hidden" name="p_no" value="<?= $row['p_no'] ?>">
      <br>
        <button class="btn btn-default btn-xs" style="">UPDATE</button><br><br>
        <button type="submit" class="btn btn-default btn-block" style="">CHECKOUT</button>
        
        
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
<?php include("../footer.php") ?>
<!-- //footer -->

</body>
</div>
</html>