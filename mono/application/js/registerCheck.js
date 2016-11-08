/**
 * 
 */

$(document).ready(function() {
	
	var reg_email = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var reg_pass = /[A-Za-z0-9]{2,12}$/; // 영문/숫자 2~12글자
	var reg_tel = /^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/; //연락처  
	var reg_name = /[가-힇]{2,10}$/;	//이름 한글 2~10글자

	//var reg_id = /[A-Za-z0-9]{2,12}$/; // 영문/숫자 2~12글자
	//var reg_pass = /^.*(?=.{10,20})(?=.*[0-9])(?=.*[a-zA-Z]).*$/;	//영문숫자 혼합 10~20글자 이하
	
	//var reg_name = /^[가-힣]{2,4}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}$/;  
	//[가-힣]{2,4} 는 한글 검색 [a-zA-Z]{2,10}\s[a-zA-Z]{2,10} 는 영문 검색이다
	//이 중간에 들어가 있는  | (파이프기호)는 자바 스크립트의 || 와 같은 의미
	
	//email check
	$("#emailCheck").on("click", function(){
		if(register.inputEmail.value == ""){
			alert("Email를 입력하세요");
			return;
		}else if(!reg_email.test(register.inputEmail.value)){
			alert("정확한 Email을 입력하세요")
		}else{
			register.inputEmailOk.value = 1;
			url = "mypagemodel/emailCheck.php?email=" + register.inputEmail.value;
			window.open(url, "email", "toolbar = no, width = 400, height = 300, top = 200, left = 300");
		}
	});
	
	$("#btnJoin").on("click", function(){
		if(!reg_email.test(register.inputEmail.value)){
			alert("정확한 이메일을 입력하세요");
			$("#inputEmail").focus();
			return false;
		}else if(!reg_name.test(register.inputName.value)){
			alert("이름은 한글 2~10글자만 허용합니다");
			$("#inputName").focus();
			return false;
		}else if(!reg_pass.test(register.inputPassword.value)){
			alert("비밀번호는 영문/숫자 2~20글자 이하");
			$("#inputPassword").focus();
			return false;
		}else if(register.inputPassword.value != register.inputPasswordOk.value){
			alert("비밀번호가 일치하지않습니다.");
			$("#inputPassword").focus();
			return false;
		}else if(!reg_tel.test(register.inputTel.value)){
			alert("정확한 연락처를 입력해주세요");
			$("#inputTel").focus();
			return false;
		}else if(!register.inputEmailOk.value == 1){
			alert("이메일 체크버튼을 눌러주세요");
			$("#inputEmail").focus();
			return false;
		}
		register.submit();
	});
});