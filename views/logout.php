<?php
	session_start();
	//destroi a sessão e manda pro index.php
	session_destroy();
	header('location:../home.php');



?>
