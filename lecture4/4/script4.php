<html>
 <head>
  <meta charset="utf-8">
    <title>Створення таблиці</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   	<link rel="stylesheet" href="styles4.css" type="text/css">
 </head>
 <body>
  <form class="container">
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
	     			print "<td>" . rand(0, 100) . "</td> ";
				}
			  print "</tr>";}
			print "<tbody>";}}

  print_fun();
?>

 
<a href="javascript:history.back()" class="btn btn-primary btn-lg active">Back!</a> 

     </div>
 
  </form>
 </body>
</html> 
