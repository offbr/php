<?php 
if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['m_email'])){ //세션값이 없을 경우 로그인 페이지 이동
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<!-- signin.css 부트스트랩을 cdn으로 가져왔으므로 정렬css 직접추가 -->
<style type="text/css">
.form-signin {
max-width: 330px;
padding: 15px;
margin: 0 auto;
}
</style>

</head>
<div class="container">
<body>
<!-- header -->
<? include("../header.php") ?>
<!-- //header -->
<br><br><br><br>

<div class="container text-center">
<div class="btn-group" role="group" aria-label="...">
  <a href="mypagemodel/logoutOk.php"><button type="button" class="btn btn-default">Logout</button></a>
  <a href="info.php"><button type="button" class="btn btn-default">Information</button></a>
  <a href="#"><button type="button" class="btn btn-default">Cart</button></a>
  <a href="#"><button type="button" class="btn btn-default">Order</button></a>
</div>
</div>


<br><br><br><br>
<!-- footer -->
<? include("../footer.php") ?>
<!-- //footer -->
</body>
</div>
</html>