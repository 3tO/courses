<html>
<body>
<?php

switch ($_GET['operator']) {

        case 'x2':

                print pow($_GET['number'], 2);

                break;

        case 'sqrt':

                print sqrt ($_GET['number']);

                break;

}


?>
<br>

 <a href="javascript:history.back()">Back!</a>  

</body>
</html> 
