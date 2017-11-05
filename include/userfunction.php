<?php
/////////////////////////////////////////////////// COUNT

//count all the posts written by user
function countUserPost($uid){
  $db = dbconnect();
  $push = array();
  $get = $db->prepare(" SELECT count(postID) as total FROM post where userId = '$uid'  ");
  $get->execute();
  $row = $get->fetch(PDO::FETCH_ASSOC);
  return $row['total'];
}

//count all the comment written by user
function countUserComments($uid){
  $db = dbconnect();
  $push = array();
  $get = $db->prepare(" SELECT count(postID) as total FROM comment where userID = '$uid'  ");
  $get->execute();
  $row = $get->fetch(PDO::FETCH_ASSOC);
  return $row['total'];
}

//count all the likes written by user
function  countUserLike($uid){
  $db = dbconnect();
  $push = array();
  $get = $db->prepare(" SELECT count(postID) as total FROM likes where userID = '$uid'  ");
  $get->execute();
  $row = $get->fetch(PDO::FETCH_ASSOC);
  return $row['total'];
}

/////////////////////////////////////////////////// GET
  //get user info
  function getProfile($uid){
    $get = $db->prepare(" SELECT * FROM user where userId = '$uid'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }

  // get all the posts written by user
  function getUserPost($uid){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT * FROM post where userId = '$uid' ORDER BY postID DESC  ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    return $push;
  }

  // get all the users admin
  function getUserAdmin(){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT * FROM user where typeID = '1  ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    return $push;
  }
  // get all the comment written by user
  function getUserComments(){}

  //sent email to admin
  function sendMessage($email,$message){
    /*$get = $db->prepare(" INSERT INTO message(messageText,fromUser) VALUES($email,$message)" );
    $get->execute();*/
    return true;
  }

  // get user details
  function getuser($uid){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT * FROM user where userId = '$uid'  ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    return $push;
  }

  /*function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}*/



?>
