<?php
session_start(); 					//memulai session
unset($_SESSION['userid']);       //Unset the variables stored in session
unset($_SESSION['password']); 
unset($_SESSION['level']);
              //mengakhiri session
echo "<script>window.location='../index.php'</script>";
?>