<html>
<head>
<title>Verify National ID</title>
</head>
<body>

<form method="post" action="">
<h2>National Patient ID Validator</h2>
<?php
 error_reporting(E_ALL ^ E_NOTICE);

 if (isset($_POST['check_national_id'])) {
  if ($_POST['national_id']) {
   require_once('includes/national_patient_id.php');
   $national_id = $_POST['national_id'];
   $national_id_decimal = to_decimal($_POST['national_id']);
  
   if (is_valid($national_id_decimal)){
     
    echo "<p p style='color:green'>" . $national_id . " is a valid national id.</p>" ;

   }else{
   
     echo "<p p style='color:orange'>" . $national_id . " is not a valid national id.</p>";
    
    }
   }else{
     
     echo "<p style='color:red'>Please enter national id.</p>" ;
 
    }
  }
?>
<p><label for="national_id">Enter National ID: </label><input type="text" id="national_id" name="national_id"></p>
<p><input type="submit" id="check_national_id" name="check_national_id" value="Validate National ID" /></p>
</form>
</body>
</html>
