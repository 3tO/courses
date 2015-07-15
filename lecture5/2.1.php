<?php
	print "<meta charset='utf-8'>";
	try {
		$file = "textfolder/" . $_POST['filename'];
		$text = $_POST['text'];
		$fp = fopen("{$file}", "w+");
		fwrite($fp, $text);
	} catch (Exception $e) {
    	print 'помилка: ' . "$e->getMessage()";
	} finally {
    	print "записано\n";
    	fclose($fp);
	}

?>
