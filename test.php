<?php
/* include class file */
include_once(__DIR__ . '/pdo-tool.php');

/* connection */
$dbtool = new dbtool;
$db = $dbtool->connect('localhost', 'root', 'my_password', 'test_db');

/* insert */
//$db->insert("into my_table (title) values (:title)", ['title' -> 'Hello world!']); // return true
//$db->insert("into my_table (title) values (:title)", ['title' -> 'Hello my world!'], true); // return new record id

/* update */
//$db->update("my_table set title = :title", ['title' -> 'Hello new world!']); // return true

/* delete */
//$db->delete("from my_table where id = :id", ['id' -> 57]); // return true

/* select */
//$data = $db->select("id, title, about from my_table where status = :status", ['status' -> 2]); // return data array
/*
foreach($data as $row){
echo $row['title'] . '<br>';
}
*/

