<? php
class NationalPatientId {

  private static $base_map = ['0','1','2','3','4','5','6','7','8','9','A','C','D','E','F','G',
                'H','J','K','L','M','N','P','R','T','U','V','W','X','Y'];
              
  private static $reverse_map = {'0' => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,
                   '6' => 6,'7' => 7,'8' => 8,'9' => 9,
                   'A' => 10,'C' => 11,'D' => 12,'E' => 13,'F' => 14,'G' => 15,
                   'H' => 16,'J' => 17,'K' => 18,'L' => 19,'M' => 20,'N' => 21,
                   'P' => 22,'R' => 23,'T' => 24,'U' => 25,'V' => 26,'W' => 27,
                   'X' => 28,'Y' => 29};

  private $base;
  private $value;

  //Create a National Patient ID
  //
  // <tt>num</tt> is the decimal equivalent of the Base <tt>base</tt> Id to be
  // created without the check digit
  function init($num, $src_base = 10, $base = 30){
    if (num && src_base == 10){
      $num = $num.to_i;
      $num = $num * 10 + self::check_digit($num);
    end
    $decimal_id = self::to_decimal($num, $src_base);
    this->$base = $base;
    this->$value = self::convert(@decimal_id).rjust(6,'0');
  }

  
  public static function check_digit($number) {
    $number = $number.to_s;
    $number = $number.split(//).collect { |digit| digit.to_i };
    $parity = $number.length % 2;

    $sum = 0;
    $number.each_with_index do |digit,index|
      digit = digit * 2 if index%2==parity
      digit = digit - 9 if digit > 9
      sum = sum + digit
    end

    $checkdigit = 0;
    $checkdigit = $checkdigit +1 while (($sum+($checkdigit))%10)!=0
    $checkdigit
  }

  # Convert a Base 10 <tt>number</tt> to the specified <tt>base</tt>
  function convert($num){
    $results = '';
    $quotient = $num.to_i;
      
    while quotient {
      $results = $base_map[$quotient % $base] + $results;
      $quotient = ($quotient / $base);
    }
    return $results;
  }

   When converting to string, print a hyphen after the third character
  function to_s() {
    //"#{@value.slice(0,3)}#{@@separator}#{@value.slice(3,@value.length)}"
  }

 
  // Convert given <tt>num</tt> in from the specified <tt>from_base</tt> to
  // decimal (base 10)
  def self.to_decimal(num, from_base=30){
    $decimal = 0
    //num.to_s.gsub(@@separator, '').split('').reverse.each_with_index do |n, i|
    //  decimal += @@reverse_map[n] * (from_base ** i)
    //end
    $decimal
  }

  //Checks if <tt>num<tt> has a correct check digit
  public static function valid($num) {
    $core_id = num / 10
    $check_digit = $num % 10 # last digit

    check_digit == NationalPatientId.check_digit(core_id)
  }

}
?>
