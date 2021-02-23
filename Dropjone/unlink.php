<?php 
$dir = $_POST['dir'];
if(unlink($dir)){
	echo "success";
}
?>