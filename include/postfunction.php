<?php
  //include_once 'dbfunction.php';

  function createPost($text, $pid, $uid){
    $db = dbconnect();
    $get = $db->prepare(" INSERT INTO comment(commentText, postID, userID) VALUES ('$text','$pid','$uid')  ");
    if($get->execute()){
      return true;
    }else {
      return false;
    }
  }

  function createComment($title, $text, $cid, $uid){
    $db = dbconnect();
    $get = $db->prepare(" INSERT INTO comment(postTitle, postText, categoryID, userID) VALUES ('$title','$text','$cid','$uid')  ");
    if($get->execute()){
      return true;
    }else {
      return false;
    }
  }
  ////////////////////////////////////////////////////////////////////////////////////
  function getCategories(){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT * FROM category ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    return $push;
  }
  // get all the posts
  function getPost(){
    $get = $db->prepare(" SELECT * FROM post ORDER BY postID DESC  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
  // get all post by categorie
  function getPostCat($catid){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT * FROM post where categoryID = '$catid' ORDER BY postID DESC ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    return $push;
  }

  // get specific post
  function getPostbyId($pid){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT * FROM post where postID = '$pid'  ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    return $push;
  }
  // get all the comment by specific post
  function getComments($pid){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT * FROM comment where postId = '$pid'  ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    return $push;
  }

  //Search in all the post
  function searchPost($text){
    $push = array();
    $get = $db->prepare(" SELECT * FROM post where postId = '$pid'  ");
    $get->execute();
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        $row = array_map('stripslashes', $row);
        $push[] = $row;
    }
    foreach ($push as  $p) {
      echo '<script> console.log("'.$p['categoryID'].'"); </script>';
    }
    return $push;
  }
  //Search in all the post by category
  function searchPostCat($text,$id){
    $get = $db->prepare(" SELECT * FROM post where postTitle like '$text'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
    // username of post or comment author
  function getauthor($uid){
    $db = dbconnect();
    $push = array();
    $get = $db->prepare(" SELECT username, about FROM user where userId = '$uid'  ");
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
  function getCategories(){}*/



?>
