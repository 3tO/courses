<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
    <title>Створення таблиці</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   	<link rel="stylesheet" href="styles5.css" type="text/css">
 </head>
 <body>
  <form class="container">
     <div class="jumbotron" >

<?php


        function print_fun() {
		
		print "<table class='table table-bordered' border='1'>";
		print "<tbody>";

		for ($x = 1; $x <= $_GET['number2']; $x++){
			print "<tr>";
			
		   for ($y = 1; $y <= $_GET['number1']; $y++) {
     			print "<td>" ;
			$s = "text" . strval($x) . strval($y);
			$g = strip_tags($_GET["{$s}"]);
			print "{$g}" ;
			print "</td> ";
			}
		  print "</tr>";}
		print "<tbody>";}

  print_fun();
 
?>

 <input class="btn btn-primary" type="button" onclick="javascript:history.back()" value="Назад">

     </div>
 
  </form>
 </body>
</html> 
