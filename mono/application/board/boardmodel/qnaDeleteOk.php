<?php 

include("../../config/dbconfig.php");

?>


<? 
$b_no = $_POST['b_no'];

$sql = "DELETE from board where b_no=$b_no";
$result = mysqli_query($conn, $sql);
if($result == true) {
	header("Location:../qnaList.php");
}
else {
?>
	<script>
	alert("삭제 실패했습니다");
	history.back();
	</script>
<?
}
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);
?>
