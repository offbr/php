<?php 
class Item { 
    var $p_no;  //품번
    var $p_name;  //품명
    var $p_brand;  //브랜드
    var $p_price;  //가격
    var $p_size;  //사이즈
    var $p_image;  //이미지
    var $p_qty; // 주문아이템수
    var $m_email;  //품번
} 

class Cart { 
	var $item;

	function set($p_no, $p_name, $p_brand, $p_price, $p_size, $p_image, $p_qty, $m_email){ 
	//장바구니 넣기 (객체) -> 지시자 (객체 안에있는 무엇을 가리킨다)
		$this->item[$cart] = new Item; 
		$this->item[$cart]->p_no=$p_no;
		$this->item[$cart]->p_name=$p_name;
		$this->item[$cart]->p_brand=$p_brand;
		$this->item[$cart]->p_price=$p_price; 
		$this->item[$cart]->p_size=$p_size; 
		$this->item[$cart]->p_image=$p_image; 
		$this->item[$cart]->p_qty=$p_qty; 
		$this->item[$cart]->m_email=$m_email; 
	}

	function get($p_no){ //품목명으로 내용 읽어오기 
	     return $this->item[$cart]; 
	}

	function fetch(){ //품목내용을 하나씩 가져오기 
	     $temp=current($this->item); 
	     if (!$temp) reset($this->item); 
	     else {next($this->item);} 
	     return $temp; 
	}     
	     
	function remove($p_no){ //품목을 삭제하기 
	  unset($this->item[$cart]); 
	} 
} 
?>

