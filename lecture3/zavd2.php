<?php
	
        function print_fun($a) {

		print "<table border='1'>";
		print "<tbody>";
              
		print "<th>0</th> ";
		for ($x = 1; $x <= $a; $x++){
		print "<th>{$x}</th> ";}

		for ($x = 1; $x <= $a; $x++){
			print "<tr>";
			print "<th>{$x}</th> ";
		   for ($y = 1; $y <= $a; $y++) {
			
			$z=$x*$y;
						
     			print "<td>{$z}</td> ";
			}
		  print "</tr>";}
		print "<tbody>";
}

print_fun(11);


?>
