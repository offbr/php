<?php 

include("../../config/dbconfig.php");

?>

<?

$sql = "SELECT max(b_no) from board";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
 
$b_no = $row[0] + 1;
$b_name = $_POST['b_name'];
$b_pass = $_POST['b_pass'];
$b_email = $_POST['b_email'];
$b_tel= $_POST['b_tel'];
$b_title = $_POST['b_title'];
$b_content = $_POST['b_content'];

$b_date = date("ymdHis", time()); //날짜 시간; //now();

//쿼리 전송
$query = "INSERT INTO `board` (`b_no`, `b_name`, `b_pass`, `b_email`, `b_tel`, `b_title`, `b_content`, `b_date`, `b_state`)
				values('$b_no', '$b_name', '$b_pass', '$b_email', '$b_tel', '$b_title', '$b_content', '$b_date', '0')";
$result = mysqli_query($conn, $query);

if($result == true) {
	header("Location:../qnaList.php");
}
else {
?>
	<script>
	alert("등록 실패했습니다");
	history.back();
	</script>
<?
}
mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
mysqli_close($conn);

?>