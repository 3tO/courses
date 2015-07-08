<html>
 <head>
  <meta charset="utf-8">
    <title>Створення таблиці</title>

 </head>
<body>
<form>
<div>
<?php


        function print_fun() {

		print "<table border='1'>";
		print "<tbody>";

		for ($x = 1; $x <= $_GET['number2']; $x++){
			print "<tr>";
			
		   for ($y = 1; $y <= $_GET['number1']; $y++) {
     			print "<td>" . rand(0, 100) . "</td> ";
			}
		  print "</tr>";}
		print "<tbody>";}

print_fun();
?>

 <a href="javascript:history.back()">Back!</a>  

</div>
</form>
</body>
</html> 
