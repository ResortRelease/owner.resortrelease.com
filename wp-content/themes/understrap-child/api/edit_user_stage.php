<?php 
  require 'mt.php';
  $userEmail = $_GET['userEmail'];
  $crmStage = $_GET['crmStage'];
  $searchUser = $contactApi->getList($userEmail);
  foreach($searchUser['contacts'] as $user){
    $userId = $user['id'];
  };
  echo "File Found. What Next?<hr>
    <br><br>
    Email = ".$userEmail."
    CRM Stage = ".$crmStage."
    <br><br>";
    echo "Find Contact By Email, output ID<br>
    User ID= ".$userId."<br><br>";
  switch($crmStage){
    case "Welcome":
      echo "Welcome Stage";
      $stageId = 1;
      break;
    case "Documents":
      echo "Documents Received";
      $stageId = 2;
      break;
    case "Progress":
      echo "In Progress";
      $stageId = 3;
      break;
  }
  $response = $stageApi->addContact($stageId, $userId);
  if (!isset($response['success'])) {
    print_r($response);
  }
?>