<?php 
	include("../config/dbconfig.php");
?>
<?
if(isset($_GET['stype'])){
	$stype = $_GET['stype'];
}
if(isset($_GET['sword'])){
	$sword = $_GET['sword'];
}
// 페이지로직
//전체 글수;
$sql = '';
if(isset($sword) == null){
	$sql = "SELECT count(b_no) FROM board";
}else{
	$sql = "SELECT count(b_no) FROM board where $stype like concat('%', $sword, '%')";
}
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$total_count = $row[0];

mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;

$pageNum = isset($_GET['page']) ? $_GET['page'] : 1;   //pageNum값이 비어있을 때 1
$list = isset($_GET['list']) ? $_GET['list'] : 10;  //1페이지에 10개 글

$b_pageNum_list = 10; // 1블럭에 10개 페이지;

$block = ceil($pageNum/$b_pageNum_list); //총 블럭수 구하기;
$total_page = ceil( $total_count / $list ); //총 게시글 페이지수;
$total_block = ceil($total_page/$b_pageNum_list); //총 블럭수;

$b_start_page = ( ($block - 1) * $b_pageNum_list ) + 1;  //현재 블럭에서 시작페이지;
$b_end_page = $b_start_page + $b_pageNum_list - 1;  //현재 블럭에서 마지막 페이지;


if ($b_end_page > $total_page) $b_end_page = $total_page; // 블럭의 마지막페이지가 총페이지보다 많을때 같게 해준다.

$limit = ($pageNum - 1) * $list; //db 로직 db는 0부터 시작한다;
// /페이지로직
?>

<?

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<!-- 메인 메뉴바 가운데 정렬 -->
<style>
table {
	font-family: 'Abel', sans-serif;
}
.example .pagination>li>a,
.example .pagination>li>span {
  	color: black;
}
.pagination>li.active>a {
	border-color: #ddd;
  	background: #949494;
  	color: black;
}
</style>

<script type="text/javascript">
function getPassword(b_no) {
	var f = document.qnaPwdFrm;
	f.b_no.value = b_no;
	$('#b_pass').focus();
	$('#myModal').modal('show');	
}

function checkPwdFrm() {
	var f = document.qnaPwdFrm;
	if (f.b_pass.value == "") {
		alert("비밀번호를 입력해 주세요.");
		f.b_pass.focus();
		return;
	}
	f.submit();
}

function closePwd() {
	$('#myModal').modal('hide');
}

function serach(){
	if(document.searchFrm.sword.value == ""){
		document.searchFrm.sword.focus();
		alert("검색어를 입력하세요!");
		return;
	}
	document.searchFrm.submit();
}
</script>

</head>

<div class="container">
<body>

<!-- header -->
<?php include("../header.php") ?>
<!-- //header -->
<br>

<!-- 검색창 -->
<div class="container text-right">

<form action="qnaList.php" name="searchFrm" method="get" class="form-inline">
	<div class="form-group">
	<select name="stype" class="form-control input-sm">
		<option value="b_title" selected="selected">글제목</option>
		<option value="b_name">글작성자</option>
	</select>
	<input type="text" name="sword" placeholder="검색어를 입력하세요" class="form-control input-sm">
	<a href="javascript:serach();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>&nbsp;&nbsp;
	<a href="qnaWrite.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>  
	</div>
</form>

</div>
<!-- //검색창 -->

<br>

<!-- 게시판리스트 -->
<div class="container">
<div class="panel panel-default">

  <!-- Table -->
 	<table class="table" border="1">
  		<tr style="font-weight: bold;">
    		<th style="width: 100px">NO</th><th>SUBJECT</th><th style="width: 150px">NAME</th><th style="width: 150px">DATE</th>
   		</tr>
   
   	<?php
   	//게시글자료
   	if(isset($sword) == null){
		$sql = "SELECT * FROM board order by b_no desc limit $limit, $list";
	}else{
		$sql = "select * from board where $stype like concat('%', $sword, '%') order by b_no desc limit $limit, $list";
	}

	$result = mysqli_query($conn, $sql);

	  while ($row = mysqli_fetch_assoc($result)){
	?>
	
		<tr style="color: #949494;"">
			<td><?= $row['b_no'] ?></td>
			<td>
			<a href="javascript:getPassword(<? echo $row['b_no'] ?>)"> <?= $row['b_title'] ?>
			<img src="../images/icon_lock.gif" alt="Q">
			<? if($row['b_state'] == 1) { ?>
			<img src="../images/icon-angle-down.png" alt="A">
			<? } ?>
			</a></td>
			<td><?= $row['b_name'] ?></td>
			<td><?= $row['b_date'] ?></td>
		</tr>
	
	<?php
	  }
	mysqli_free_result($result); //쿼리 결과값을 메모리에서 해제;
	mysqli_close($conn);
	?>

	</table>
  <!-- //table -->
  
</div>
</div>
<!-- //게시판리스트 -->


<!-- 페이지네이션 -->
<div class="container text-center">
<div class="example">
<nav>
	<ul class="pagination pagination-sm">
	
		<!-- 첫페이지로 가기 -->
		<? if($pageNum <= 1) {
		?>
		<li class="disabled"><a href="#">First</a></li>
		<? 
		}else{ // 1보다 크면 클릭o
			if(isset($sword) == null){
			?>
			<li><a href="qnaList.php?page=1&list=<?=$list?>">First</a></li>
			<?				
			}else{
			?>
			<li><a href="qnaList.php?stype=<?=$stype?>&sword=<?=$sword?>&page=1&list=<?=$list?>">First</a></li>
			<?				
			}
		}?>
		<!-- //첫페이지로 가기 -->
		
		<!-- 이전 10개 -->	
		<?
		if($block <= 1){ // 블럭이 1보다 작거나 같다면 클릭x
		?>
		<li class="disabled"><a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a></li>
		<?
		}else{ //  1보다 크면 클릭o
			if(isset($sword) == null){
			?>
			<li><a href="qnaList.php?page=<?=$b_start_page-1?>&list=<?=$list?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a></li>
			<?				
			}else{
			?>
			<li><a href="qnaList.php?stype=<?=$stype?>&sword=<?=$sword?>&page=<?=$b_start_page-1?>&list=<?=$list?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a></li>
			<?				
			}
		}?>
		<!-- //이전 10개 -->
		
		<!-- 페이지 리스트 -->
		<?
		for($i = $b_start_page; $i <= $b_end_page; $i++){ //시작페이지부터 마지막페이지까지 반복문
			if($pageNum == $i){ // 현재페이지와 i가 같으면 클릭 x
				?>
				<li class="active"><a href="#"><?=$i?></a></li>
				<?
			}else{
				if(isset($sword) == null){
				?>
				<li><a href="qnaList.php?page=<?=$i?>&list=<?=$list?>"><?=$i?></a></li>
				<?				
				}else{
				?>
				<li><a href="qnaList.php?stype=<?=$stype?>&sword=<?=$sword?>&page=<?=$i?>&list=<?=$list?>"><?=$i?></a></li>
				<?				
				}
			}
		}
		?>		
		<!-- //페이지 리스트 -->
		
		<!-- 다음 10개 -->
		<?
		if($block >= $total_block){ //현재 블럭과 총 블럭갯수가 같으면 클릭x
		?>
		<li class="disabled"><a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span></a></li>
		<? 
		}else{ 
			if(isset($sword) == null){
			?>
			<li><a href="qnaList.php?page=<?=$b_end_page+1?>&list=<?=$list?>" aria-label="Next"> <span aria-hidden="true">&raquo;</span></a></li>
			<?				
			}else{
			?>
			<li><a href="qnaList.php?stype=<?=$stype?>&sword=<?=$sword?>&page=<?=$b_end_page+1?>&list=<?=$list?>" aria-label="Next"> <span aria-hidden="true">&raquo;</span></a></li>
			<?				
			}
		}?>
		<!-- //다음 10개 -->
		
		<!-- 마지막페이지 -->
		<?
		if($pageNum >= $total_page){ //현재페이지의 수와 총페이지수가 같다면 클릭x
		?>
		<li class="disabled"><a href="#">Last</a></li>
		<?	
		}else{
			if(isset($sword) == null){
			?>
			<li><a href="qnaList.php?page=<?=$total_page?>&list=<?=$list?>">Last</a></li>
			<?				
			}else{
			?>
			<li><a href="qnaList.php?stype=<?=$stype?>&sword=<?=$sword?>&page=<?=$total_page?>&list=<?=$list?>">Last</a></li>
			<?				
			}
		}?>
		<!-- //마지막페이지 -->
	</ul>

</nav>
</div>
</div>
<!-- //페이지네이션 -->

<!-- 비밀번호 폼 -->
<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

<div class="form-group text-center">
<form name="qnaPwdFrm" id="qnaPwdFrm" method="post" action="qnaView.php" class="form-inline">
	<input type="hidden" name="b_no" value="<?= $b_no ?>" /> 
	<input type="hidden" name="pageNum" value="<?= $pageNum ?>" /> 
	<input type="hidden" name="pageList" value="<?= $list ?>" />
	<input type="hidden" name="b_state" value="<?= $b_state ?>" />
	<div class="modal-body">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="gridSystemModalLabel">비밀번호</h4>
		<label for="recipient-name" class="control-label">해당 게시글의 비밀번호를 입력해주세요</label>
            <input type="password" maxlength="20" name="b_pass" id="b_pass" class="form-control input-sm" id="recipient-name">
        <div class="btn-group btn-group-sm" role="group" aria-label="...">
        	<button type="button" onclick="javascript:closePwd();" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="button" onclick="javascript:checkPwdFrm();" class="btn btn-default">OK</button>
		</div>
	</div>
</form>
</div>

   </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- //비밀번호 폼 -->


<br><br>
<!-- footer -->
<?php include("../footer.php") ?>
<!-- //footer -->

</body>
</div>
</html>






