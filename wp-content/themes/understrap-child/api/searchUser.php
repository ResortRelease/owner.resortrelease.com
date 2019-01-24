<?php 
require 'mt.php';
  $theId = $_POST["index"];
  $response = $contactApi->get($theId);
  $searchUser = $contactApi->getList($theId);
  echo "<table class='table table-striped table-hover table-bordered margin-top-20'>
  <thead><tr><th>#</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Stage</th><th>Edit</th></tr>
  <tbody>";
  $counter = 0;
  foreach($searchUser['contacts'] as $user){
      $userArray = $user['fields']['all'];
      $userId = $user['id'];
      $fullname = $userArray['fullname'];
      $email = $userArray['email'];
      $phone = $userArray['phone'];
      $stage = $user['stage']['name'];
      $counter ++;
      if($counter == 1){
        // $userInfoArray = array("id"=>$userId,"fullname"=> $fullname, "email"=>$email, "phone"=>$phone, "stage"=>$stage);
        // print_r($userInfoArray);
        echo "<tr>
        <td>".$counter."</td>
        <td>".$fullname."</td>
        <td>".$email."</td>
        <td>".$phone."</td>
        <td>".$stage."</td>
        <td>
          <i class='fa fa-edit edit' onclick='editUser(".json_encode($userArray).",".json_encode($user).");'></i>
        </td>
        </tr>";
      }
  }
  echo "</tbody></table>";
?>