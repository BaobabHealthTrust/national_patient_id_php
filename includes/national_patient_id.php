<?php

  function check_digit($number){
    settype($number, 'string');
		$sumTable = array(array(0,1,2,3,4,5,6,7,8,9),array(0,2,4,6,8,1,3,5,7,9));
		$sum = 0;
		$flip = 0;
		for ($i = strlen($number) - 1; $i >= 0; $i--) {
				$sum += $sumTable[$flip++ & 0x1][$number[$i]];
		}

		return $sum % 10 === 0;
  
  }

  function to_decimal($num, $from_base=30){		        
			 $reverse_map = array('0' => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,
						             '6' => 6,'7' => 7,'8' => 8,'9' => 9,
						             'A' => 10,'C' => 11,'D' => 12,'E' => 13,'F' => 14,'G' => 15,
						             'H' => 16,'J' => 17,'K' => 18,'L' => 19,'M' => 20,'N' => 21,
						             'P' => 22,'R' => 23,'T' => 24,'U' => 25,'V' => 26,'W' => 27,
						             'X' => 28,'Y' => 29);

			 $number = array_reverse(str_split(str_replace('-','',$num)));
			 $number2;
				
			 foreach ($number as $key => $value){
			 		$number2 +=  $reverse_map[$value] * (pow($from_base,$key));
				}

			 return $number2;
  }

  # Checks if <tt>num<tt> has a correct check digit
  function is_valid($num){
    $core_id = $num / 10;
    $check_digit = $num % 10; # last digit

    if ($check_digit == check_digit($core_id)){
       return 1;  
    }
    else
    { 
      return 0;
    }
  }

?>
