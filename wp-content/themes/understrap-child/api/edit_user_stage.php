<?php 
  require 'mt.php';
  $userEmail = $_GET['email'];
  $crmStage = $_GET['stage'];
  $searchUser = $contactApi->getList($userEmail);
  foreach($searchUser['contacts'] as $user){
    $userId = $user['id'];
  };
  switch($crmStage){
    case "Welcome":
      $stageId = 1;
      break;
    case "Estoppel":
      $stageId = 2;
      break;
    case "Inventory":
      $stageId = 3;
      break;
    case "ROFR":
      $stageId = 4;
      break;
    case "Deed Prep":
      $stageId = 5;
      break;
    case "Doc Prep":
      $stageId = 6;
      break;
    case "Execution":
      $stageId = 7;
      break;
    case "Execution Received - Deeded":
      $stageId = 8;
      break;
    case "Execution Received - Non- Deeded":
      $stageId = 9;
      break;
    case "Finalization":
      $stageId = 10;
      break;
    case "Closed":
      $stageId = 11;
      break;
  }
  $response = $stageApi->addContact($stageId, $userId);
  if (!isset($response['success'])) {
    print_r($response);
  }else{
    echo $userEmail.' -> Moved to Stage -> '.$stageId;
  }
?>