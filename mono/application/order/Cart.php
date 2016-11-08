<?php  
if(!isset($_SESSION)) session_start(); 
class Cart {
    protected $cart_contents = array();
    
    public function __construct(){
        // get the shopping cart array from the session
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL;
		if ($this->cart_contents === NULL){
			// set some base values
			$this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
		}
    }
    
    /**
	 * Cart Contents: Returns the entire cart array
	 * @param	bool
	 * @return	array
	 */
	public function contents(){
		// rearrange the newest first
		$cart = array_reverse($this->cart_contents);

		// remove these so they don't create a problem when showing the cart table
		unset($cart['total_items']);
		unset($cart['cart_total']);

		return $cart;
	}
    
    /**
	 * Get cart item: Returns a specific cart item details
	 * @param	string	$row_id
	 * @return	array
	 */
	public function get_item($row_p_no){
		return (in_array($row_p_no, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_p_no]))
			? FALSE
			: $this->cart_contents[$row_p_no];
	}
    
    /**
	 * Total Items: Returns the total item count
	 * @return	int
	 */
	public function total_items(){
		return $this->cart_contents['total_items'];
	}
    
    /**
	 * Cart Total: Returns the total price
	 * @return	int
	 */
	public function total(){
		return $this->cart_contents['cart_total'];
	}
    
    /**
	 * Insert items into the cart and save it to the session
	 * @param	array
	 * @return	bool
	 */
	public function insert($item = array()){
		if(!is_array($item) OR count($item) === 0){
			return FALSE;
		}else{
            if(!isset($item['p_no'], $item['p_name'], $item['p_brand'], $item['p_price'], $item['p_size'], $item['p_stock'], $item['p_image'], $item['p_detailimage'], $item['p_qty'])){
                return FALSE;
            }else{
                /*
                 * Insert Item
                 */
                // prep the quantity
                $item['p_qty'] = (float) $item['p_qty'];
                if($item['p_qty'] == 0){
                    return FALSE;
                }
                // prep the price
                $item['p_price'] = (float) $item['p_price'];
                // create a unique identifier for the item being inserted into the cart
                $row_p_no = md5($item['p_no']);
                // get quantity if it's already there and add it on
                $old_qty = isset($this->cart_contents[$row_p_no]['p_qty']) ? (int) $this->cart_contents[$row_p_no]['p_qty'] : 0;
                // re-create the entry with unique identifier and updated quantity
                $item['row_p_no'] = $row_p_no;
                $item['p_qty'] += $old_qty;
                $this->cart_contents[$row_p_no] = $item;
                
                // save Cart Item
                if($this->save_cart()){
                    return isset($row_p_no) ? $row_p_no : TRUE;
                }else{
                    return FALSE;
                }
            }
        }
	}
    
    /**
	 * Update the cart
	 * @param	array
	 * @return	bool
	 */
	public function update($item = array()){
		if (!is_array($item) OR count($item) === 0){
			return FALSE;
		}else{
			if (!isset($item['row_p_no'], $this->cart_contents[$item['row_p_no']])){
				return FALSE;
			}else{
				// prep the quantity
				if(isset($item['p_qty'])){
					$item['p_qty'] = (float) $item['p_qty'];
					// remove the item from the cart, if quantity is zero
					if ($item['p_qty'] == 0){
						unset($this->cart_contents[$item['row_p_no']]);
						return TRUE;
					}
				}
				
				// find updatable keys
				$keys = array_intersect(array_keys($this->cart_contents[$item['row_p_no']]), array_keys($item));
				// prep the price
				if(isset($item['p_price'])){
					$item['p_price'] = (float) $item['p_price'];
				}
				// product id & name shouldn't be changed
				foreach(array_diff($keys, array('p_no', 'p_name')) as $key){
					$this->cart_contents[$item['row_p_no']][$key] = $item[$key];
				}
				
				// save cart data
				$this->save_cart();
				return TRUE;
			}
		}
	}
    
    /**
	 * Save the cart array to the session
	 * @return	bool
	 */
	protected function save_cart(){
		$this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
		foreach ($this->cart_contents as $key => $val){
			// make sure the array contains the proper indexes
			if(!is_array($val) OR !isset($val['p_price'], $val['p_qty'])){
				continue;
			}
	 
			$this->cart_contents['cart_total'] += ($val['p_price'] * $val['p_qty']);
			$this->cart_contents['total_items'] += $val['p_qty'];
			$this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['p_price'] * $this->cart_contents[$key]['p_qty']);
		}
		
		// if cart empty, delete it from the session
		if(count($this->cart_contents) <= 2){
			unset($_SESSION['cart_contents']);
			return FALSE;
		}else{
			$_SESSION['cart_contents'] = $this->cart_contents;
			return TRUE;
		}
    }
    
    /**
	 * Remove Item: Removes an item from the cart
	 * @param	int
	 * @return	bool
	 */
	 public function remove($row_p_no){
		// unset & save
		unset($this->cart_contents[$row_p_no]);
		$this->save_cart();
		return TRUE;
	 }
     
    /**
	 * Destroy the cart: Empties the cart and destroy the session
	 * @return	void
	 */
	public function destroy(){
		$this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
		unset($_SESSION['cart_contents']);
	}
}