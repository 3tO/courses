<?php
	
        function number_to_text($a) {


		switch ($a) {
		case 1:
		    return first;
		    break;
		case 2:
		    return second;
		    break;
		case 3:
		    return third;
		    break;
		case 4:
		    return fourth;
		    break;
		case 5:
		    return fifth;
		    break;
		default:
		    return "<h1>error_of_number</h1>";
		}
	
}

$b = number_to_text(5);
print $b;


?>
