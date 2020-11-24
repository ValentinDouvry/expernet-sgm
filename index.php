<?php 
   session_start();
   
   if(isset($_SESSION['userId'])) {
       header('Location: views/profile.php');
   }

   else {
       header('Location: views/log_in.php');
   }
