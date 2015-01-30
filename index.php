<html>
<head>
<title>Verify National ID</title>
</head>
<body>

<form id="myform" method="post" action="">
<h2>National Patient ID Validator</h2>
<?php
 error_reporting(E_ALL ^ E_NOTICE);
 
  $national_id = str_replace('-','',$_POST['national_id']);
  
 if (isset($_POST['check_national_id']) && strlen($national_id) == 6){
  if ($_POST['national_id']) {
   require_once('includes/national_patient_id.php');
   $national_id_decimal = to_decimal($national_id);
   
   if (is_valid($national_id_decimal)){
     
    echo "<p style='color:green'>" . $national_id . " is a valid national id.</p>" ;

   }else{
   
     echo "<p style='color:orange'>" . $national_id . " is not a valid national id.</p>";
    
    }
   }
  
  }
?>
<p><label for="national_id">Enter National ID: </label><input type="text" id="national_id" name="national_id"></p>
<p><input type="submit" id="check_national_id" name="check_national_id" onclick="validateLength()" value="Validate National ID" /></p>

</form>
<script type="text/javascript">
function validateLength() {
  
   var national_id = document.getElementById("national_id");
   var national_id_stripped = national_id.value.replace('-','');
   if (national_id_stripped.length != 6){
    alert("The National ID can only be six characters long");
   }
  
}

</script>
</body>
</html>
