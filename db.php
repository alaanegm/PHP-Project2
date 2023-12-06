<?php
class db{ 
    private $username="root";
    private $password="";
    private $host="localhost";
    private $dbname="test";
    private $port="3310";
    private $conn;

    function __construct(){
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;port=$this->port", $this->username, $this->password);
    }
    function get_conn(){
        return $this->conn;
    }
    function get_AllData($table,$condition=1){
        $data=$this->conn->query("select * from $table where $condition ");
         $result=$data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function get_data($table,$condition,$array){
        $data=$this->conn->prepare("select * from $table where $condition ");
        $data->execute($array);
         $result=$data->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function delete($table,$condition){
        $data=$this->conn->query("delete from $table where $condition");
    }
    function add($table,$condition,$values,$array){
        $stm = $this->conn->prepare("INSERT INTO $table $condition VALUES $values");
        $stm->execute($array);
        //  return $stm;
    }
    function update($table,$condition,$values,$array){
        $stm = $this->conn->prepare("UPDATE $table SET $condition where $values ");
        $stm->execute($array);
        //  return $stm;
    } 
    

}
?>