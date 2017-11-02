<?php
  //get user info
  function getProfile($uid){
    $get = $db->prepare(" SELECT * FROM user where userId = '$uid'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }

  // get all the posts written by user
  function getUserPost($uid){
    $get = $db->prepare(" SELECT * FROM post where userId = '$uid'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
  // get all the comment written by user
  function getUserComments(){}

  //sent email to admin
  function sendMessage($email,$message){
    //$get = $db->prepare(" INSERT INTO message(messageText,fromUser) VALUES($email,$message)" );
    //$get->execute();
    return true;
  }

  /*function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}*/



?>
