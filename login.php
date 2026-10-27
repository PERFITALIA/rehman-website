<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if (!empty($_POST['email']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['email'] == 'rahman' && 
                  $_POST['password'] == '123456') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                 $newURL="investor-relations.php";
  				 header('Location: '.$newURL);
               }else {
		   $newURL="investor-relations.php?status=false";
                  header('Location: '.$newURL);
               }
            }

?>