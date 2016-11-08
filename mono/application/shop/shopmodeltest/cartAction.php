<?
class cart{
//function set_cart($method,$goods_type=0,$goods_number=0,$quantity=0) { 
function set_cart($method, $p_no=0, $p_name=0, $p_brand=0, $p_price=0, $p_size=0, $p_image=0, $m_email=0, $p_qty=0) { 
	/* define	$method : add, delete, reset, print 

	$return = method,status; 
	*/ 

	$flag = '';
	switch ($method) { 

	case 'add': 
		if(isset($_SESSION['item']) && is_array($_SESSION['item'])) { 
			//현재 구상 item[]=01,1024,2 
			//item이 이미 있을경우(array) item에 대한 추가 
			$count = sizeof($_SESSION['item']); 
			foreach($_SESSION['item'] as $i => $value) { 
				//unset 아이템 초기화 
				unset($item_cart_exp); 
				unset($item_tmp); 
				unset($item_cart_tmp); 
				$item_cart_exp	= explode(',',$value); 
				//echo " : ", $value, "/";
				$item_cart_tmp	= $item_cart_exp[0].$item_cart_exp[1].$item_cart_exp[2].$item_cart_exp[3].$item_cart_exp[4].$item_cart_exp[5].$item_cart_exp[6];
				$item_tmp = $p_no.$p_name.$p_brand.$p_price.$p_size.$p_image.$m_email; 

				if ($item_cart_tmp == $item_tmp) { 
					//동일 item이 존재할 경우 
					$item_cart_exp[7]	= $item_cart_exp[7] + $p_qty; 
					$_SESSION['item'][$i]	= $item_cart_exp[0].','.$item_cart_exp[1].','.$item_cart_exp[2].','.$item_cart_exp[3].','.$item_cart_exp[4].','.$item_cart_exp[5].','.$item_cart_exp[6].','.$item_cart_exp[7]; 
					$flag	= 1; 
				} 
			} 
				
			if ($flag != 1) { 
				//동일 item이 존재하지 안는 경우 
				$_SESSION['item'] = array();
				$_SESSION['item'][$count] = $p_no.','.$p_name.','.$p_brand.','.$p_price.','.$p_size.','.$p_image.','.$m_email.','.$p_qty; 
			} 
			unset($flag); 
			
		} else { 
			//$_SESSION['item']이 등록된적이 없는경우 
			$_SESSION['item'] = array(); 
			$_SESSION['item'][] = $p_no.','.$p_name.','.$p_brand.','.$p_price.','.$p_size.','.$p_image.','.$m_email.','.$p_qty;
		} 
		$return = 'add,ok'; 
	break; 


	case 'delete': 
		if(isset($_SESSION['item']) && is_array($_SESSION['item'])) { 
			//현재 구상 item[]=01,1024,2 
			//item이 이미 있을경우(array) item에 대한 삭제 
			$count = sizeof($_SESSION['item']); 
			foreach($_SESSION['item'] as $i => $value) { 
				//unset 아이템 초기화 
				unset($item_cart_exp); 
				unset($item_tmp); 
				unset($item_cart_tmp); 
				$item_cart_exp	= explode(',',$value); 
				$item_cart_tmp	= $item_cart_exp[0].$item_cart_exp[1]; 
				$item_tmp = $p_no.$p_name;
				if ($item_cart_tmp == $item_tmp) { 
					//동일 item이 존재할 경우 
					$item_cart_exp[2]	= $item_cart_exp[2] - $p_qty; 

					if ($item_cart_exp[2] < 1) { 
						// 물품갯수가 1이하인 경우 물건삭제 
						unset($_SESSION['item'][$i]); 
						$flag	= 1; 
					} else { 
						// 물품갯수가 1이상인 경우 
						$_SESSION['item'][$i]	= $item_cart_exp[0].','.$item_cart_exp[1].','.$item_cart_exp[2]; 
						$flag	= 1; 
					} 
				} 

			} 
			if ($flag != 1) { 
				//동일 item이 존재하지 안는 경우 error1 
				$return = 'delete,error1'; 
			} 
			unset($flag); 
		} else { 
			//$_SESSION['item']이 등록된적이 없는경우 
			$return = 'delete,error2'; 
		} 
	break; 

	case 'reset': 
		if(isset($_SESSION['item']) && is_array($_SESSION['item'])) { 
			unset($_SESSION['item']); 
		} 
		$return = 'reset,ok'; 
	break; 
	$str='';
	case 'print': 
		if(isset($_SESSION['item']) && is_array($_SESSION['item'])) { 
			foreach($_SESSION['item'] as $key => $value) { 
				echo "$value <br>"; 
				$str = explode(',', $value);
				echo "$str[0],$str[1],$str[2],$str[3],$str[4],$str[5],$str[6],$str[7]";

			}
		} 
		$return = 'print,ok'; 
	break; 
	} 

	return $return; 
} 
}
?>
















