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
 
if(count($_SESSION['cart_items'])>0){
 
    // get the product ids
  $p_nos = "";
  foreach($_SESSION['cart_items'] as $key=>$value){
    foreach((array)$value as $keys => $values){
        echo "$key : $keys = $values <br/>\n";
        if($keys == 'p_no'){
          $p_nos = $p_nos . $values . ",";
        }
    }
  }
  $p_nos = rtrim($p_nos, ',');
  echo "$p_nos";
  /*
    $p_nos = "";
    foreach($_SESSION['cart_items'] as $p_no=>$value){
        $p_nos = $p_nos . $p_no . ",";
    }
     // remove the last comma
    #$p_nos = rtrim($p_nos, ',');
    #echo $p_nos;
    
    */
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
        $sql = "SELECT * FROM product WHERE p_no IN ({$p_nos})";

        $result = mysqli_query($conn, $sql);
    
        $total_price = 0;
        while ($row = mysqli_fetch_assoc($result)){

    ?>
      <tr>
      <td>
      <a href="#"><img style="border: none;" src="../productimages/<?= $row['p_image'] ?>.jpg" width="36px" height="100px"></a>
      <div style="display: inline-block;">
      <?= $row['p_brand'] ?> <br>
      <?= $row['p_name'] ?>  - <?= $row['p_size'] ?> 
      </div>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?= $row['p_price'] ?> 
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?= $row['p_qty'] ?> 
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      </td>
      <td style="display: table-cell; vertical-align: inherit;">
      <?= $row['p_price'] ?> 
      </td>
      </tr>
    <?
      $total_price += $row['p_price'];
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