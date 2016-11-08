<?php 

include("../config/dbconfig.php");

?>

<?

$b_no = $_POST['b_no'];
$b_pass = $_POST['b_pass'];
$pageNum = $_POST['pageNum'];
$pageList = $_POST['pageList'];

$sql = "SELECT * from board where b_no = '$b_no' and b_pass = '$b_pass'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); //mysqli_fetch_row($result) //row[0];

//비밀번호 틀릴 경우
if(is_null($row['b_pass'])){
?>
	<script>
	alert("비밀번호가 틀립니다");
	location.href = "qnaList.php?page=<?=$pageNum?>&list=<?=$pageList?>";
	</script>
<?
}
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
function qnaUpdate(){
	document.goFrm.action = "qnaUpdate.php";
	document.goFrm.submit();
}

function qnaDelete(){
	if(confirm("정말삭제하시겠습니까?")){
		document.goFrm.action = "boardmodel/qnaDeleteOk.php";
		document.goFrm.submit();
	}
}

</script>

</head>
<div class="container">
<body>
<!-- header -->
<? include("../header.php") ?>
<!-- //header -->
<br><br>


<!-- 게시판리스트 -->
<div class="container">
<div class="panel panel-default table-responsive">

  <!-- Table -->
 	<table class="table table-sm" border="1">
  		<tr>
    		<th style="width: 100px">SUBJECT</th><td colspan="3"><?= $row['b_title'] ?></td>
   		</tr>
   		<tr>
   			<th>NAME</th><td><?= $row['b_name'] ?></td> <th style="width: 100px">DATE</th><td><?= $row['b_date'] ?></td>
   		</tr>
   		<tr>
   			<th>Email</th><td><?= $row['b_email'] ?></td> <th style="width: 100px">Tel</th><td><?= $row['b_tel'] ?></td>
   		</tr>
   		<tr>
   			<th rowspan="4">CONTENT</th>
   			<td colspan="3" rowspan="4">
   			<textarea rows="10" style="width: 100%; border: none;" readonly="readonly"><?= $row['b_content'] ?></textarea></td>
   		</tr>
	</table>
  <!-- //table -->
  
</div>
</div>
<!-- //게시판리스트 -->

<form method="post" name="goFrm">
<div class="container text-center">
<div class="btn-group btn-group-sm" role="group" aria-label="...">
			<input type="hidden" name="b_no" value="<?= $b_no ?>">
        	<button type="button" onclick="javascript:history.back();" class="btn btn-default">Close</button>
        	<button type="button" onclick="javascript:qnaUpdate();" class="btn btn-default">Modify</button>
        	<button type="button" onclick="javascript:qnaDelete();" class="btn btn-default">Delete</button>
		</div>
</div>
</form>

<br><br>
<!-- footer -->
<? include("../footer.php") ?>
<!-- //footer -->
</body>
</div>
</html>