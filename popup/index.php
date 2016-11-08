<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript">
function modalPop(url){ 
var popOptions = "dialogWidth: 500px; dialogHeight: 30px; center: yes; resizable: yes; status: no; scroll: no;"; 
alert(url);
var vReturn = window.open(url, window,  popOptions); 

if (vReturn == 'ok'){
// (모달창에서 버튼 이벤트 실행 또는 닫기 후)모달창이 닫혔을 때 부모창에서 실행 할 함수
	location.reload(); 
	return;
}else{
	return;
}
	return vReturn;
} 
</script> 

</head> 
<body> 
	<a href="javascript:modalPop('test.php');">모달팝업 띄우기</a> 
</body> 
</html>