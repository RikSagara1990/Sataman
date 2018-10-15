<?php

  function connectDB () {
    global $mysqli;
    $mysqli = new mysqli ("localhost", "mysql", "password", "Sataman");
    $mysqli->query("SET NAMES 'utf-8'");

    if(!$mysqli)
    {
      exit(mysql_eror());
    }
  }

  function closeDB () {
    global $mysqli;
    $mysqli->close ();
  }

  function get_value($var){
    global $mysqli;
    connectDB();
    $array_for_value = $mysqli->query("SELECT * FROM `languages` WHERE `variable` = '$var'");
    closeDB();
    $dataarray = $array_for_value->fetch_assoc();
    return $dataarray;
   }

   function get_datafood($id){
    global $mysqli;
    connectDB();
    $array_for_value = $mysqli->query("SELECT * FROM `foods` WHERE `Id` = '$id'");
    closeDB();
    $dataarray = $array_for_value->fetch_assoc();
    return $dataarray;
   }



?>


