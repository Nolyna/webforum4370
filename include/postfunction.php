<?php

  function getCategories(){
    $get = $db->prepare(" SELECT * FROM category ");
    $get->execute();
    $rows = $get->fetch(PDO::FETCH_ASSOC);
    return $rows;
  }
  // get all the posts
  function getPost(){
    $get = $db->prepare(" SELECT * FROM post  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
  // get all post by categorie
  function getPostCat($catid){
    $get = $db->prepare(" SELECT * FROM post where categoryID = '$catid'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
  // get all the comment by specific post
  function getComments($pid){
    $get = $db->prepare(" SELECT * FROM comment where postId = '$pid'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }

  //Search in all the post
  function searchPost($text){
    $get = $db->prepare(" SELECT * FROM post where postId = '$pid'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
  //Search in all the post by category
  function searchPost($text,$id){
    $get = $db->prepare(" SELECT * FROM post where postTitle like '$text'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
    // username of post or comment author
  function getauthor($uid){
    $get = $db->prepare(" SELECT username FROM user where userId = '$uid'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
  }
  /*function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}
  function getCategories(){}*/



?>
