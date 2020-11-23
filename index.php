<?php 
   session_start();
   
   if(isset($_SESSION['userConnected'])) {
       header('Location: /views/list_group');
   }

   else {
       header('Location: /views/log_in');
   }
   