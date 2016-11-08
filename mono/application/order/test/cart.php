<?php 
  session_start();
  include("../config/dbconfig.php");

?>
<?
$action = isset($_GET['action']) ? $_GET['action'] : "";
//$p_name = isset($_GET['p_name']) ? $_GET['p_name'] : "";


if(!isset($_SESSION['m_email'])){ //세션값이 없을 경우 로그인 페이지 이동
    header('Location:../mypage/login.php');
}

if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity was updated!";
    echo "</div>";
}
 
echo count($_SESSION['item']);
if(count($_SESSION['item'])>0){
 

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
      $total_price = 0;
      if(isset($_SESSION['item']) && is_array($_SESSION['item'])) { 
        foreach($_SESSION['item'] as $key => $value) { 
          $cart = explode(',', $value);
          //$p_no:$cart[0]/$p_name:$cart[1]/$p_brand:$cart[2]/$p_price:$cart[3]
          //$p_size:$cart[4]/$p_image:$cart[5]/$m_email:$cart[6]/$p_qty:$cart[7]
    ?>
      <tr>
      <td>
      <a href="#"><img style="border: none;" src="../productimages/<?= $cart[5] ?>.jpg" width="36px" height="100px"></a>
      <div style="display: inline-block;">
      <?= $cart[2] ?> <br>
      <?= $cart[1] ?>  - <?= $cart[4] ?> 
      </div>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?= $cart[3] ?> 
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?= $cart[7] ?> 
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?= $cart[3] ?> 
      </td>
      </tr>
    <?
      $total_price += $cart[3];
    }
  }
}
  ?>
  </table>
 </div>

  <div class="col-md-3 text-center" style="border: 7px double; color: #454545;">
      <br>
      <p class="pprice"><span class="price">￦ <?= $total_price ?> </span></p>
      <form action="../order/cart.php" name="f" method="post" class="product_frm" 
      style="padding-top: 10px; padding-bottom: 10px;">
      <input type="hidden" name="p_no" value="<?= $row['p_no'] ?>">
      <p class="pprice"><span class="price">size : </span></p>
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