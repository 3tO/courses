<?php

        function print_fun($a, $b = 0) {
              
		if ($b == 0) {$i = 0;

			while ($i <= $a) {

        		print "{$i} ";

			$i++;}

			}
			else {$i = $a;

			while ($i >= 0) {

        		print "{$i} ";

			$i--;}
			}

		}

print_fun(10);
print "<br></br>";
print_fun(10, -1);


?>
