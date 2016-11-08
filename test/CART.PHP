<?PHP
	  include( "./class.inc" );
	  include( "./products.inc" );
	  session_start();
	  if ( !session_is_registered( 'cart' ) )
      {
	    $cart = new Cart;
	    session_register( 'cart' );
 	  } 

 	  if ( $code=="insert" )
 	  {
 	    echo" $name, $amount ";
 	    $cart->add( $name, $amount );
	  }
 	  else if ( $code="delete" )
 	  {
 	    $cart->delete( $name );
 	  }
?>
 	<html>
 	<body>
 	<p><font size="6">장바구니</font></p>
 	<p><a href="./product_list.php">쇼핑계속</a></p>
 	<?PHP
 	  if ( $cart->get_count() )
 	  {
 	?>
 	<table width="380" border="1" cellspacing="1" cellpadding="0">
 	  <tr align="center">
 	    <td width="200">
 	      이름
 	    </td>
 	    <td width="80">
 	      수량
 	    </td>
 	    <td width="100">
 	      제거
 	    </td>
 	  </tr>
 	<?PHP
 	    $sum = 0;
 	    $contents = $cart->get_list();
 	    while( list( $name, $value ) = each( $contents ) )
 	    {
 	       $sum += $value[amount]*$fruit[$name];
 	?>
 	  <tr>
 	    <td width="200"><?=$name?></td>
 	    <td width="80"><?=$value[amount]?></td>
 	    <td width="100">
 	        <input type="button" name="delete" value="삭제"
 	          onClick="javascript:location='cart.php?code=delete&name=<?=$name?>'">
 	    </td>
 	  </tr>
 	<?PHP
 	    }
 	?>
 	  <tr>
 	    <td colspan="2" height="30"> 총합 </td>
 	    <td width="65" height="30" valign="middle"><?=$sum?></td>
 	  </tr>
 	</table>
 	<?PHP
 	  }
 	?>
 	</body>
	</html>
