<?PHP
	  class Cart
	  {
	    var $contents;
	    function add( $name, $amount )
	    {
	      $this->contents[$name] = $amount;
	    }

 	    function delete( $name )
 	    {
 	      if ( count($this->contents) > 0 )
 	      {
 	        while ( list( $key, $value ) = each($this->contents) )
 	        {
 	          if ( $key != $name )
 	            $new_cart[$key] = $value;
 	        }
 	        $this->contents =  $new_cart;
 	      }
 	    }

 	    function get_list()
 	    {
 	      return $this->contents;
 	    }

 	    function get_count()
 	    {
 	      return count( $this->contents );
 	    }
 	  }
?>
