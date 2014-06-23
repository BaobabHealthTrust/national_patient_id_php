<?php

  function check_digit($num_param){
    $num = strval($num_param);
    $number = str_split($num);
    $numbers = array_map('intval',$number);
        
    $parity = count($numbers) % 2;

    $sum = 0;
   
    foreach ($numbers as $key => $value){
      if ($key%2==$parity) {
      $value = $value * 2 ;
      }
      if ($value > 9){
      $value = $value - 9;
      }
 
      $sum = $sum + $value;
    }

    $checkdigit = 0;
    while ((($sum+($checkdigit))%10)!=0) {
       $checkdigit = $checkdigit +1; 
    }
    return $checkdigit;
  
  }

  function to_decimal($num, $from_base=30){		        
			 $reverse_map = array('0' => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,
						             '6' => 6,'7' => 7,'8' => 8,'9' => 9,
						             'A' => 10,'C' => 11,'D' => 12,'E' => 13,'F' => 14,'G' => 15,
						             'H' => 16,'J' => 17,'K' => 18,'L' => 19,'M' => 20,'N' => 21,
						             'P' => 22,'R' => 23,'T' => 24,'U' => 25,'V' => 26,'W' => 27,
						             'X' => 28,'Y' => 29);

			 $number = array_reverse(str_split(str_replace('-','',$num)));
			 $number2 = 0;
				
			 foreach ($number as $key => $value){
			 		$number2 +=  $reverse_map[$value] * (pow($from_base,$key));
				}

			 return $number2;
  }

  # Checks if <tt>num<tt> has a correct check digit
  function is_valid($num){
    $core_id = (int)($num / 10);
    $check_digit = $num % 10; # last digit
    return ($check_digit == check_digit($core_id));
  }

?>
