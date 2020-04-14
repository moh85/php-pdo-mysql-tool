<?php
/* simple PDO CRUD MySQL tool */
class dbtool {
var $connection = null;

/* global connection method */
function connect($HOST, $DBNAME, $USER, $PASS){
try {
    $conn = new PDO("mysql:host=".$HOST.";dbname=".$DBNAME, $USER, $PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->connection = $conn;
   }
catch(PDOException $e){
   exit("Connection failed: " . $e->getMessage());
   }
}

/* insert method */
function insert($query, $array = [], $opt = false){
try {
$action = $this->connection->prepare("INSERT " . $query);
foreach($array as $key => $value) { $action->bindParam(':' . $key, $value); }
$action->execute();
if($opt) return $this->connection->lastInsertId(); else true;
  }
catch(PDOException $e){
exit($e->getMessage());
  }
}

/* update method */
function update($query, $array = []){
try {
$action = $this->connection->prepare("UPDATE " . $query);
foreach($array as $key => $value) { $action->bindParam(':' . $key, $value); }
$action->execute();
return true;
  }
catch(PDOException $e){
exit($e->getMessage());
  }
}

/* delete method */
function delete($query, $array = []){
try {
$action = $this->connection->prepare("DELETE " . $query);
foreach($array as $key => $value) { $action->bindParam(':' . $key, $value); }
$action->execute();
return true;
  }
catch(PDOException $e){
exit($e->getMessage());
  }
}

/* select method */
function select($query, $array = []){
try {
$action = $this->connection->prepare("SELECT " . $query);
foreach($array as $key => $value) { $action->bindParam(':' . $key, $value); }
$action->execute();
$action->setFetchMode(PDO::FETCH_ASSOC);
return $action->fetchAll();
    }
catch(PDOException $e){
exit($e->getMessage());
    }
  }

}
