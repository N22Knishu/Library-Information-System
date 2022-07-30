<?php
    $current_file = basename($_SERVER['REQUEST_URI'], '.php');
    if(!isset($_SESSION['userrole']) && $current_file != 'index') {
        header('Location: ./index.php');
	  }
    if($_SESSION['userrole'] == 'admin' && $current_file != 'admin'){
		  header('Location: ./admin.php');
    }
	if(($_SESSION['userrole'] == 'student' || $_SESSION['userrole'] == 'teacher')  && $current_file != 'userhome'){
		  header('Location: ./userhome.php');
    }
?>