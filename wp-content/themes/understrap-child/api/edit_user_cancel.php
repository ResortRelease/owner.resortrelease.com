<?php
require 'mt.php';
if(isset($_POST)){
  $ten = $_POST['ten'];
  $og = $_POST['og'];
  $new = $og - ($og*0.2);
  $new = round($new, 2);
  $com = "Over Ten Years: $".$ten." | Original Quote: $".$og." | New Quote: $". $new;
  echo $com;
  $data = array(
    'comments'     => $com
  );
  $theId = "test@yourtestiness.gov";
  $response = $contactApi->get($theId);
  $searchUser = $contactApi->getList($theId);
  $counter = 0;
  foreach($searchUser['contacts'] as $user){
      $userArray = $user['fields']['all'];
      $userId = $user['id'];
  }
  $createIfNotFound = false;
  $contact = $contactApi->edit($userId, $data, $createIfNotFound);
}
?>