<?php 
  // if($_SERVER['HTTP_REFERER'] !== 'gooddomain.com'){
  //   die('Unauthorized access');
  // }else {
    
  // }
  $http_origin = $_SERVER['HTTP_ORIGIN'];

  $allowed_domains = array(
    'https://www.resortrelease.com',
    'https://www.resortreleasecrm.com',
    'https://e.resortrelease.com'
  );

  if (in_array($http_origin, $allowed_domains))
  {  
      header("Access-Control-Allow-Origin: $http_origin");
  }
  require 'mt.php';
  $userEmail = $_GET['email'];
  $crmStage = $_GET['stage'];
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $_POST['email'];
    $crmStage = $_POST['stage'];
  }
  $searchUser = $contactApi->getList($userEmail);
  foreach($searchUser['contacts'] as $user){
    $userID = $user['id'];
  };
  $contactApi->addDnc($userID);
  echo "User: ".$userEmail." Set to <span style='color:red'>DNC</span>"; 
?>