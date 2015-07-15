
<!DOCTYPE html>
<html>

 <head>
  <meta charset="utf-8">
    <title>login</title>
 </head>
 
 <body>
 	<form >
 		<?php 
     	if ($_GET['i'] == w)  {
     		print "Wrong username or password <br>";
     	}
     	
       	?>

 	</form>
 	<form class="container" action="1.1.php" method="POST">

     <div class="jumbotron">

     	
		<span> login: </span>
		<br>	
		<input  type="text" name="login" required>
		
		<br>
		<span> password: </span>
		<br>	
		<input type="password" name="password" required>
		<br>
	    	<br>
	        <input class="btn btn-primary" type="submit" value="Відправити">
     </div>
  </form>
 		  
 </body>
</html>