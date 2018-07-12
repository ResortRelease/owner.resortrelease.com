<?php 
require 'mt.php';
  $userEmail = $_POST["findByEmail"];
  $response = $contactApi->get($userEmail);
  $searchUser = $contactApi->getList($userEmail);
  echo '<hr>
  <div class="container">
  <div class="text-center"><h1>STATUS</h1></div>
  </div>
  ';
  $counter = 0;
  foreach($searchUser['contacts'] as $user){
      $userArray = $user['fields']['all'];
      $userId = $user['id'];
      $fullname = $userArray['fullname'];
      $email = $userArray['email'];
      $phone = $userArray['phone'];
      $stage = $user['stage']['name'];
      $stageId = $user['stage']['id'];
      //Determine the % of status by stage id.
      switch ($stageId) {
        case "1":
            $progress = 20;
            break;
        case "2":
            $progress = 40;
            break;
        case "3":
            $progress = 60;
            break;
        default:
            echo "error";
      }
      echo '
      <div class="progress" id="userStatusBar">
        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="'.$progress.'"
          aria-valuemin="0" aria-valuemax="100" style="width:'.$progress.'%;">
          '.$progress.'%
        </div>
      </div>
      <h2 class="text-center">'.$stage.'</h2>
      <h3 class="text-center">Name: '.$fullname.'</h3>
      ';
  };
?>