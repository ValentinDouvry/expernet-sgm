<?php
require_once("../secret/connect_db.php");
require_once("../classes/User.php");
require_once("../classes/Group.php");

session_start();

$userId = $_SESSION["userId"];
if (!isset($userId)) {
  header('Location:log_in.php');
  exit;
}

$query = $db->prepare("SELECT * FROM users WHERE id = :userId");
$query->bindParam(":userId", $userId);
$query->execute();
$user = $query->fetchObject("User");

if (!$user->getIsAdmin()) {
  header('Location: ../index.php');
  exit;
}


if (isset($_POST["inputIdGroupDelete"])) {
  $groupId = $_POST["inputIdGroupDelete"];
  $query = $db->prepare("SELECT COUNT(*) FROM users WHERE groupId = :groupId");
  $query->bindParam(":groupId", $groupId, PDO::PARAM_INT);
  $query->execute();
  $nbUser = $query->fetchColumn();
  if ($nbUser != 0) {
    // AFFICHER ALERTE/MODAL ?
    echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Impossible de supprimer un groupe contenant des utilisateurs</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>';

  } else {
    $query = $db->prepare("DELETE FROM `groups` WHERE `id`= :groupId");
    $query->bindParam(":groupId", $groupId, PDO::PARAM_STR);
    $query->execute();
  }
}

if (isset($_POST["inputGroupId"]) && isset($_POST["inputGroupName"]) && isset($_POST["inputGroupChannel"])) {
  $groupName = $_POST["inputGroupName"];
  $groupChannel = $_POST["inputGroupChannel"];
  $groupId = $_POST["inputGroupId"];


  $query = $db->prepare("UPDATE `groups` SET `name` = :groupName, `channel` = :groupChannel WHERE `id` = :groupId");

  $query->bindParam(":groupName", $groupName, PDO::PARAM_STR);
  $query->bindParam(":groupChannel", $groupChannel, PDO::PARAM_STR);
  $query->bindParam(":groupId", $groupId, PDO::PARAM_INT);
  $query->execute();
}


$query = $db->prepare("SELECT * FROM `groups`");
$query->execute();
$listGroups = $query->fetchAll(PDO::FETCH_CLASS, "Group");
?>

<!doctype html>
<html lang="fr">
  <head>
    <title>Expernet-sgm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <?php 
      require_once('components/navbar.php');
    ?>

    <div class="container-fluid ml-3">
      <a class="btn btn-outline-primary" role="button" href="form_add_group.php">Créer un groupe</a>
      <h2>Liste des groupes</h2>

      <div class="container-fluid row">
        <div class="col-lg-6">
          <?php
            foreach($listGroups as $group)
            {
              $groupId = $group->getId();
              $query = $db->prepare("SELECT COUNT(*) FROM users WHERE groupId = :groupId");
              $query->bindParam(":groupId",$groupId, PDO::PARAM_STR);
              $query->execute();
              $nbUser = $query->fetchColumn();

              echo '  
                <div class="card mb-3" style="max-width: 30rem;">
                  <div class="row no-gutters">
                    <div class="col-sm-12">
                      <div class="card-body">
                        <div>
                          <a class="card-link text-dark" href="group.php?groupId='.$group->getId().'">
                            <h5 class="card-title">'.$group->getName().'</h5>
                          </a>
                        </div>                       
                        <div class="row">
                          <div class="col-sm-9">
                            <p class="card-text">'.$nbUser.' Utilisateurs</p>
                          </div>
                          <div class="col-sm-3">
                            <p class="card-text">'.$group->getCode().'</p>
                          </div>
                          <div class="col-sm-10 pt-2">
                            <button type="button" class="btn btn-outline-warning mr-2" onclick="showForm('.$group->getId().','.'\''.$group->getName().'\''.','.'\''.$group->getChannel().'\''.')">Modifier</button>
                            <button type="button" class="btn btn-outline-danger" onclick="submitDeleteForm('.$group->getId().')">Supprimer</button>                           
                            <form action="list_group.php" method="POST" id="form-delete-group-'.$group->getId().'">                                                              
                              <input id="inputIdGroupDelete" name="inputIdGroupDelete" type="hidden" value="'.$group->getId().'">                                              
                            </form>
                          </div>
                        </div>
                      </div>                  
                    </div>
                  </div>
                </div>
              ';
            } 
          ?>
        </div>
        <div class="col-lg-3">
          <div id="container-form-modify-group" style="display: none;">
            <form id="form-modify-group" method="POST" action="list_group.php">
              <div class="form-group">
                <label for="inputGroupName">Nom du groupe</label>
                <input type="text" class="form-control" id="inputGroupName" name="inputGroupName">
              </div>
              <div class="form-group">
                <label for="inputGroupChannel">Channel du groupe</label>
                <input type="text" class="form-control" id="inputGroupChannel" name="inputGroupChannel">
              </div>
              <input type="hidden" id="inputGroupId" name="inputGroupId" value="">
              <button type="submit" class="btn btn-outline-primary mr-2">Modifier</button>
              <button class="btn btn-outline-secondary" onclick="hideForm()">Cacher</button>
            </form>        
          </div>
        </div>
      </div>


      


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/form_modify_group.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>