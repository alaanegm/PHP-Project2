<?php
$username = "root";
$password = "";

if(isset($_GET['id'])){
    try {
       require("db.php");
        $db=new db();
        // $conn = new PDO("mysql:host=localhost;dbname=test;port=3310", $username, $password);
        $id=$_GET['id'];
        $result=$db->delete("student","id=$id");
       // $data=$conn->query("delete from student where id=$id ");
        header("Location:list.php");
      
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
}
?>