<?php 
if(!isset($_SESSION)) session_start();
include("../config/dbconfig.php");

?>

<? 

if(!isset($_SESSION['m_email'])){ //세션값이 없을 경우 로그인 페이지 이동
    header('Location:../mypage/login.php');
}
  
$m_email = $_SESSION['m_email'];
$sql = "SELECT * from member where m_email = '$m_email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<script src="../js/registerCheck.js"></script>

<style type="text/css">
label{
	color: #454545;
}

.form-info{
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

<!-- 회원가입 폼 -->
<div class="container">

	<form class="form-info" name="updateInfo" action="mypagemodel/infoOk.php" method="post">
		<h2 class="form-signin-heading">User Profile</h2>
		
		<br>
		<label>Email address</label>
		<input type="email" name="inputEmail" id="inputEmail" class="form-control" readonly="readonly" value="<?= $row['m_email'] ?>">
		
		<br>		
		<label>Name</label>
		<input type="text" name="inputName" id="inputName" class="form-control" placeholder="Name" value="<?= $row['m_name'] ?>" required autofocus>
		
		<br>
		<label>Passwrod</label> 
		<input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
		
		<br>
		<label>Confirm Passwrod</label> 
		<input type="password" name="inputPasswordOk" id="inputPasswordOk" class="form-control" placeholder="Confirm Password" required autofocus>
		
		<br>
		<label>address</label> 
		<input type="text" name="postcode" id="postcode" class="form-control" placeholder="PostCode" readonly="readonly" value="<?= $row['m_postcode'] ?>">
		<input type="button" onclick="daumPostcode()" value="PostCode Search" class="form-control"><br>
		<input type="text" name="address1" id="address1" placeholder="address" class="form-control" readonly="readonly" value="<?= $row['m_address'] ?>">
		<input type="text" name="address2" id="address2" placeholder="address" class="form-control" required autofocus>
	
		<br>
		<label>Tel</label> 
		<input type="text" name="inputTel" id="inputTel" class="form-control" placeholder="Tel" value="<?= $row['m_tel'] ?>" required autofocus>
		
		<br>
		<button class="btn btn-lg btn-default btn-block" type="submit" id="btnJoin">Save Profile</button><br>
	</form>
	
</div>
 
<!-- 우편번호 검색 -->

<!-- iOS에서는 position:fixed 버그가 있음, 적용하는 사이트에 맞게 position:absolute 등을 이용하여 top,left값 조정 필요 -->
<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
</div>

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script src="../js/address.js" type="text/javascript"></script>

<!-- //우편번호 검색 -->

<!-- footer -->
<? include("../footer.php") ?>
<!-- //footer -->

</body>
</div>
</html>




