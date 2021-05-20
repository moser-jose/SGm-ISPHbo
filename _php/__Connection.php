<?    
   function CONNECT() { 
      $cnn = mysqli_connect("localhost", "root", "", "sgm", 3306) or die('No pudo conectarse: ' . pg_last_error()); 
	   //recuperar datos en utf 8
	   mysqli_set_charset($cnn, "utf8");
      return $cnn;
   } 
  
  function DISCONNECT($cnn){ mysqli_close($cnn); }  
  
  
?>
