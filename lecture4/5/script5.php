<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
    <title>Створення таблиці</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   	<link rel="stylesheet" href="styles5.css" type="text/css">
 </head>
 <body>
  <form class="container" action="http://localhost:8000/script5.1.php" method="GET">
     <div class="jumbotron" >

<?php


        function print_fun() {

		if ($_GET['number1'] <=0 or $_GET['number2'] <= 0){

			print "<h2> Не вірно введені данні! </h2>";

			}
			else {

			print "<table class='table table-bordered' border='1'>";
			print "<tbody>";

			for ($x = 1; $x <= $_GET['number2']; $x++){
				print "<tr>";
			
			   for ($y = 1; $y <= $_GET['number1']; $y++) {
				$s = "text" . strval($x) . strval($y);
	     			print "<td> <input  type='text' name=";
				print "text{$x}{$y}";
				print "></td> ";
				}
			  print "</tr>";}
			print "<tbody>";}}

  print_fun();
  
  print "<input  type='hidden' name='number1' value=" . $_GET['number1'] . ">";
  print "<input type='hidden' name='number2' value=" . $_GET['number2'] . ">";
?>


<input class="btn btn-primary" type="button" onclick="javascript:history.back()" value="Назад!">
<span>  </span>
<input class="btn btn-primary" type="submit" value="Відправити">



     </div>
 
  </form>
 </body>
</html> 
