<?php 

include("../../config/dbconfig.php");

?>


<? 
$b_no = $_POST['b_no'];
$b_pass = $_POST['b_pass'];
$b_title = $_POST['b_title'];
$b_content = $_POST['b_content'];

$sql = "UPDATE board set b_pass='$b_pass', b_title='$b_title', b_content='$b_content', b_date=now() where b_no=$b_no";
$result = mysqli_query($conn, $sql);
if($result == true) {
	header("Location:../qnaList.php");
}
else {
?>
	<script>
	alert("수정 실패했습니다");
	history.back();
	</script>
<?
}
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);
?>


