<?php

  function connectDB () {
    global $mysqli;
    $mysqli = new mysqli ("localhost", "userread", "password", "Sataman");
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

   function get_value($language){
    global $mysqli;
    connectDB();
    $array_for_value = $mysqli->query("SELECT `variable`, `$language` FROM `languages`");
    closeDB();
    $dataarray = array();
    while(($row = $array_for_value->fetch_assoc()) != false)
    $dataarray[$row["variable"]] = $row["$language"];
    return $dataarray;
   }

   function get_datamenu($language){
    global $mysqli;
    connectDB();
    $array_for_datamenu = $mysqli->query("SELECT `id`, `img`, `name$language`, `description$language`, `cost`  FROM `foods` ORDER BY `id`");
    closeDB();
    $dataarray = array ();
    while(($row = $array_for_datamenu->fetch_assoc()) != false)
    $dataarray[$row["id"]] = $row;
    return $dataarray;
   }
?>
