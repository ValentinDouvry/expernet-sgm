<?php 
   session_start();
   
   if(isset($_SESSION['userConnected'])) {
<<<<<<< Updated upstream
       header('Location: views/list_group.php');
   }

   else {
       header('Location: views/log_in.php');
=======
       header('Location: /expernet-sgm/views/list_group');
   }

   else {
       header('Location: /expernet-sgm/views/log_in.php');
>>>>>>> Stashed changes
   }
   
?>