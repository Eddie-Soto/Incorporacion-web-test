<?php
if (isset($_POST['file'])) {
    $file = $_POST['file'];
	
    if(file_exists($file))
		unlink($file);
}