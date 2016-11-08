<?php 
class item { 
    var $p_no;  //품번
    var $p_name;  //품명
    var $p_brand;  //브랜드
    var $p_price;  //가격
    var $p_size;  //사이즈
    var $p_image;  //이미지
    var $p_qty; // 주문아이템수
    var $m_email;  //이메일
} 

class cart { 
	var $item;

	function set($p_no, $p_name, $p_brand, $p_price, $p_size, $p_image, $p_qty, $m_email){ 
	//장바구니 넣기 (객체) -> 지시자 (객체 안에있는 무엇을 가리킨다)
		$this->item[$p_no] = new Item; 
		$this->item[$p_no]->p_no=$p_no;
		$this->item[$p_no]->p_name=$p_name;
		$this->item[$p_no]->p_brand=$p_brand;
		$this->item[$p_no]->p_price=$p_price; 
		$this->item[$p_no]->p_size=$p_size; 
		$this->item[$p_no]->p_image=$p_image; 
		$this->item[$p_no]->p_qty=$p_qty; 
		$this->item[$p_no]->m_email=$m_email; 
	}

	function get($p_no){ //품목명으로 내용 읽어오기 
	     return $this->item[$p_no]; 
	}

	function fetch(){ //품목내용을 하나씩 가져오기 
	     $temp=current($this->item); 
	     if (!$temp) reset($this->item); 
	     else {next($this->item);} 
	     return $temp; 
	}     
	     
	function remove($p_no){ //품목을 삭제하기 
	  unset($this->item[$p_no]); 
	} 
} 
?>





