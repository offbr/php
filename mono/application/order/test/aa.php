<?php 
  session_start();
  include("../config/dbconfig.php");
  include ("../shop/shopmodel/cartclass.php");
?>

<?
$action = isset($_GET['action']) ? $_GET['action'] : "";
$p_name = isset($_GET['p_name']) ? $_GET['p_name'] : "";


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
 $p_qty = 0;
if(count($_SESSION['cart_items'])>0){
    
    // get the product ids
 //   foreach($_SESSION['cart_items'] as $p_no=>$value){
 //       echo "$p_no : $p_name = $value <br/>\n";
 //   }

echo var_dump($_SESSION['cart_items']);
echo "\n";

foreach($_SESSION['cart_items'] as $key => $value){
    foreach((array)$value as $keys => $values){
      echo "$key : $keys = $values <br/>\n";
    }
}

  /*
    $p_nos = "";
    foreach($_SESSION['cart_items'] as $p_no=>$value){
        $p_nos = $p_nos . $p_no . ",";
    }
     // remove the last comma
    #echo $p_nos;
    $p_nos = rtrim($p_nos, ',');
    */
  }
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

  <div class="col-md-3 text-center" style="border: 7px double; color: #454545;">
      <br>
      <p class="pprice"><span class="price">￦ <?= $total_price ?> </span></p>
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