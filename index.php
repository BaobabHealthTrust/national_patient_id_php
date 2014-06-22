<?php
 
 if (isset($_POST['check_national_id'])) {
  
  }

?>

<html>
<head>
<title>Verify National ID</title>
</head>
<body>
<form method="post" action="">
<p><label for="national_id">Enter National ID: </label><input type="text" id="national_id" name="national_id"></p>
<p><input type="submit" id="check_national_id" name="check_national_id" value="Validate National ID" /></p>
</form>
<pre>
<?php if (isset($_POST['check_national_id'])) {print_r($_POST);} ?>
</pre>
</body>
</html>
