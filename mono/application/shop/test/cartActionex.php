<?

function set_cart($method,$goods_type=0,$goods_number=0,$quantity=0) { 
	/* define	$method : add, delete, reset, print 
	$goods_type : 01 = 서적 
	$goods_number : database id 
	$quantity 

	$return = method,status; 
	*/ 
	switch ($method) { 

	case 'add': 
		if(isset($_SESSION['item']) or is_array($_SESSION['item'])) { 
		//현재 구상 item[]=01,1024,2 
		//item이 이미 있을경우(array) item에 대한 추가 
			$count = sizeof($_SESSION['item']); 
			foreach($_SESSION['item'] as $i => $value) { 
			//unset 아이템 초기화 
				unset($item_cart_exp); 
				unset($item_tmp); 
				unset($item_cart_tmp); 
				$item_cart_exp	= explode(',',$value); 
				$item_cart_tmp	= $item_cart_exp[0].$item_cart_exp[1]; 
				$item_tmp = $goods_type.$goods_number; 
				
				if ($item_cart_tmp == $item_tmp) { 
				//동일 item이 존재할 경우 
					$item_cart_exp[2]	= $item_cart_exp[2] + $quantity; 
					$_SESSION['item'][$i]	= $item_cart_exp[0].','.$item_cart_exp[1].','.$item_cart_exp[2]; 
					$flag	= 1; 
				} 
			} 
				
			if ($flag != 1) { 
			//동일 item이 존재하지 안는 경우 
					$_SESSION['item'][$count] = $goods_type.','.$goods_number.','.$quantity; 
			} 
			unset($flag); 
			
		} else { 
			//$_SESSION['item']이 등록된적이 없는경우 
			$_SESSION['item'] = array(); 
			$_SESSION['item'][] = $goods_type.','.$goods_number.','.$quantity; 
		} 
		$return = 'add,ok'; 
	break; 


	case 'delete': 
		if(isset($_SESSION['item']) or is_array($_SESSION['item'])) { 
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
				$item_tmp = $goods_type.$goods_number; 
				if ($item_cart_tmp == $item_tmp) { 
					//동일 item이 존재할 경우 
					$item_cart_exp[2]	= $item_cart_exp[2] - $quantity; 

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
		if(isset($_SESSION['item']) or is_array($_SESSION['item'])) { 
			unset($_SESSION['item']); 
		} 
		$return = 'reset,ok'; 
	break; 

	case 'print': 
		if(isset($_SESSION['item']) or is_array($_SESSION['item'])) { 
			foreach($_SESSION['item'] as $key => $value) { 
			echo "$key : $value <br>"; 
			} 
		} 
		$return = 'print,ok'; 
	break; 
	} 

	return $return; 
} 

?>
















