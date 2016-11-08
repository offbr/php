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

<style>
th {
	font-weight: bold;	
}
td {
	font-family: 'Abel', sans-serif;
}

</style>

<script>
function checkFrm(){
	var f = document.qnaWriteFrm;
	if (f.b_title.value == "") {
		alert("제목을 입력하세요.");
		f.b_title.focus();
		return;
	}
	if (f.b_content.value == "") {
		alert("내용을 입력하세요.");
		f.b_content.focus();
		return;
	}
	if (f.b_pass.value == "") {
		alert("해당 게시글의 비밀번호를 등록하세요.");
		f.b_pass.focus();
		return;
	}
	f.submit();
}

</script>

</head>
<div class="container">
<body>
<!-- header -->
<? include("../header.php") ?>
<!-- //header -->
<br><br>


<!-- 글쓰기 -->
  <form action="boardmodel/qnaWriteOk.php" method="post" name="qnaWriteFrm">
  
<div class="container">
<div class="panel panel-default table-responsive">

  	<input type="hidden" value="<?= $row['m_name'] ?>" name="b_name">
  	<input type="hidden" value="<?= $row['m_email'] ?>" name="b_email">
  	<input type="hidden" value="<?= $row['m_tel'] ?>" name="b_tel">
  	
  <!-- Table -->
 	<table class="table" border="1">
  		<tr>
    		<th style="width: 100px">SUBJECT</th>
        <td colspan="3"><input type="text" style="width: 100%;" name="b_title"></td>
   		</tr>
   		<tr>
   			<th>NAME</th>
        <td colspan="3"><?= $row['m_name'] ?></td>
   		</tr>
   		<tr>
   			<th>Email</th><td><?= $row['m_email'] ?></td> <th style="width: 100px">Tel</th><td><?= $row['m_tel'] ?></td>
   		</tr>
   		<tr>
   			<th>CONTENT</th>
   			<td colspan="4"><textarea rows="10" style="width: 100%;" name="b_content"></textarea></td>
   		</tr>
   		<tr>
   			<th>Password</th>
   			<td colspan="4"><input type="password" style="width: 100%;" maxlength="8" name="b_pass"></td>
   		</tr> 		
	</table>
  <!-- //table -->
  
</div>
</div>

  </form>
<!-- //글쓰기 -->

<div class="container text-center">
<div class="btn-group btn-group-sm" role="group" aria-label="...">
        	<button type="button" onclick="javascript:history.back();" class="btn btn-default">Close</button>
        	<button type="button" onclick="javascript:checkFrm();" class="btn btn-default">OK</button>
		</div>
</div>


<br><br>
<!-- footer -->
<? include("../footer.php") ?>
<!-- //footer -->
</body>
</div>
</html>