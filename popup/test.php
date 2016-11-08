<!DOCTYPE html>
<html>
<head>
	<title></title>

<script src="http://xn--mk1bra055rmhb.com/js/jquery-1.8.3.min.js"></script>	

<script type="text/javascript">
function com_view(){
	$("#com_view").toggle();
}
</script>

<style type="text/css">
#com_view{display:none;width:490px;position:absolute;left:43px;border-collapse:collapse;border-bottom:1px solid #dbdbdb;height:410px;background:#FFF;}
</style>

</head>
<body>

<button onclick="com_view();">com_view</button>

<div id="com_view">
        <table style="display: table;">
        <tbody>
				<tr>
            <th scope="row"><label for="wr_subject">제목<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_subject" value="" id="wr_subject" required class="input_style2"  maxlength="255">
                   
                </div>
            </td>
        </tr>
                <tr>
            <th scope="row"><label for="ca_name">지역<strong class="sound_only">필수</strong></label></th>
            <td>
                <select name="ca_name" id="ca_name" required  >
                    <option value="">지역선택</option>
                    <option value="서울">서울</option>
					<option value="경기">경기</option>
					<option value="인천">인천</option>
					<option value="강원">강원</option>
					<option value="부산">부산</option>
					<option value="대구">대구</option>
					<option value="대전">대전</option>
					<option value="울산">울산</option>
					<option value="강원">강원</option>
					<option value="충북">충북</option>
					<option value="충남">충남</option>
					<option value="전북">전북</option>
					<option value="전남">전남</option>
					<option value="광주">광주</option>
					<option value="경북">경북</option>
					<option value="경남">경남</option>
					<option value="제주">제주</option>
                </select>
            </td>
        </tr>
        		<tr>
			<th>직업</th>
			<td>
				<input type="radio" id="wr_1_1" name="wr_1" value="유" required/> <label for="wr_1_1">유</label> <input type="radio" id="wr_1_2" name="wr_1" value="무"  required/> <label for="wr_1_2" >무</label>
			</td>
		</tr>       
		<tr>
			<th><label for="wr_2">나이</label></th>
			<td>
				<input type="input" id="wr_2" name="wr_2" value="" required class="input_style"/> 세
			</td>
		</tr>
		<tr>
			<th><label for="wr_4">희망금액</label></th>
			<td>
				<input type="radio" onclick="want_money('1')"  required name="wr_5"   value="상담전 결정"/> <input type="input" id="wr_4" name="wr_4" readonly   value=""  class="input_style"/> 만원&nbsp;&nbsp;
				<input type="radio" onclick="want_money('2')"  id="wr_5" required name="wr_5" value="상담후 결정"/> <label for="wr_5">상담후 결정</label>
			</td>
		</tr>
		<tr>
			<th><label for="wr_7">대출분류</label></th>
			<td>
				<select id="wr_7" name="wr_7" required>
					<option value="">대출분류 선택</option>
					<option value="신용대출" >신용대출</option>
					<option value="담보대출" >담보대출</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><label for="wr_6">휴대폰</label></th>
			<td>
								<input type="input" id="wr_6_1"  value="" maxlength="3" required class="input_style"/> -
				<input type="input" id="wr_6_2"  value="" maxlength="4" required class="input_style"/> -
				<input type="input" id="wr_6_3"  value="" maxlength="4" required class="input_style"/>
				<input type="button" value="인증번호" src="http://xn--mk1bra055rmhb.com/skin/board/real/img/hp_confirm.png" id="certify_btn" class="btn_style2" />			</td>
		</tr>
				<tr>
			<th scope="row"><label for="hp_confirm">인증번호<strong class="sound_only">필수</strong></label></th>
			<td><input type="input" id="hp_confirm" class="input_style " maxlength="20"> <input type="button" id="certify_sub" value="확인" class="btn_style3"/> <span>휴대폰 번호는 공개되지 않습니다.</span></td>
		</tr>
		        <tr>
            <th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
            <td><input type="password" name="wr_password" id="wr_password" required class="input_style " maxlength="20"> <span>글삭제시 필요합니다.</span></td>
        </tr>
        <tr>
            <th scope="row"><label for="wr_content">문의내용<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">
               <textarea id="wr_content" name="wr_content" placeholder="카톡아이디, 연락처 등 기재시 운영밤침에 따라 삭제됩니다.
				자신의 상황등을 자세히 기재해 주시면
				나에게 맞는 대출업체와 빠르고 쉽게 상담을 받을 수 있습니다." ></textarea>
            </td>
        </tr>

       
                <tr>
            <th scope="row">스팸방지</th>
            <td>
                
<script>var g5_captcha_url  = "http://xn--mk1bra055rmhb.com/plugin/kcaptcha";</script>
<script src="http://xn--mk1bra055rmhb.com/plugin/kcaptcha/kcaptcha.js"></script>
<fieldset id="captcha" class="captcha">
<legend><label for="captcha_key">자동등록방지</label></legend>
<img src="javascript:void(0);" alt="" id="captcha_img">
<button type="button" id="captcha_mp3"><span></span>숫자음성듣기</button>
<button type="button" id="captcha_reload"><span></span>새로고침</button>
<input type="text" name="captcha_key" id="captcha_key" required class="captcha_box " size="6" maxlength="6">
<span id="captcha_info">자동등록방지 숫자를 순서대로 입력하세요.</span>
</fieldset>            </td>
        </tr>
    </div>
    
	<tr><td colspan="2">
	
	<div id="agreement_yn">
		<p class="agreement">&nbsp;<input type="checkbox" id="agreement" />&nbsp;&nbsp;
		<label for="agreement">개인정보 수집·이용에 동의합니다.</label></p>

		<textarea class="approve_con" readonly>
   ■ 수집하는 개인정보의 항목 - 휴대폰번호,비밀번호,지역,나이,직업(유.무),대출희망금액,대출상품종류(담보대출,신용대출),문의내용
   ■ 개인정보의 수집 및 이용목적 - 이용자 요청 자료에 대한 무료 대출상담 서비스에 응대
   ■ 책임사항 및 면책사항 - 작성이후 진행과정에서 정보제공자(고객)와 정보이용자(대출업체)간의 발생되는 문제는 고객의 동의에 의해 진행된 것으로 모든 
       민형사상의 분쟁에서 대출닷컴은 어떠한 일체의 책임이 없습니다. 자세한 사항은 이용약관을 의거 처리됩니다.
   ■ 개인정보의 보유 및 이용기간 - 원칙적으로 개인정보의 수집 및 이용목적이 달성되면 지체 없이 파기합니다. - 단, 상법/전자상거래 등에서의 소비자보호에 관한 
       법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 관계법령에서 정한 일정한 기간 동안 개인정보를 보관합니다. 
   ■ 개인정보의 제3자 제공 및 공개-대출닷컴은 개인정보보호정책 등에서 고지하거나 동의한 범위를 초과하여 일반고객의 개인정보를 이용하거나 
       제 3자에게 제공 또는 공개하지 않습니다. 다만, 법률의 규정에 의한 정보 제공의 경우나 정보 주체의 동의가 있을 경우 정보주체의 허용범위 내에서는 
   예외로 합니다. 
		</textarea>
		<p class="write_con_img"><img src="http://xn--mk1bra055rmhb.com/skin/board/real/img/write_con.png" /></p>
	</div>
    <div class="btn_confirm">
        <a href="./board.php?bo_table=real_time" class="btn_cancel">취소</a>
		<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
    </div>
    </form>
    
    </td></tr>
    
     </tbody>
    </table>


</body>
</body>
</html>












