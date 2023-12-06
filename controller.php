<?php
$username = "root";
$password = "";

try {
  //$conn = new PDO("mysql:host=localhost;dbname=test;port=3310", $username, $password);
  require("db.php");
      $db=new db();
      $conn=$db->get_conn();
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
if(isset($_POST['add'])){
  var_dump($_FILES);
  $img=$_FILES["image"];
  move_uploaded_file($img["tmp_name"],"images/".$img["name"]);


  $fname=validate($_POST['fname']);
  $lname=validate($_POST['lname']);
  $username=validate($_POST['username']);
  $password=validate($_POST['Password']);
  $fname=ucfirst(strtolower($fname));
  $lname=ucfirst(strtolower($lname));
  $arr=[];
  if(strlen($fname)<3){
    $arr['fname']="first name length min 3 char";
  }
   if(strlen($lname)<3){
    $arr['lname']="last name length min 3 char";
  }
  if($username==""){
    $arr['username']="username required";
  }
  if($password==""){
    $arr['password']="password required";
  }
  if($username){
    
    $stm=$conn->prepare("select * from student where username=?");
    $stm->execute([$_POST['username']]);
    $result=$stm->fetch(PDO::FETCH_ASSOC);
    if($result){
      // header("Location:phpInfo.php");
      $arr['username']="username exist";
      echo "username exist";
    }  
  }
  
  if(count($arr)>0){
    session_start();
    $_SESSION["lname"] =$arr['lname'];
    $_SESSION["fname"] =$arr['fname'];
     $_SESSION["username"] =$arr['username'];
     $_SESSION["password"] =$arr['password'];
    header("Location:phpInfo.php");
  }
   else{
     session_start();
    $db->add("student","(fname, lname, gender,username,pass,img)"," (?, ?, ? ,? ,?,?)",[$fname,$lname,$_POST['gender'],$_POST['username'],$_POST['Password'],$img["name"]]);
    // $stm = $conn->prepare("INSERT INTO student (fname, lname, gender,username,pass,img) VALUES (?, ?, ? ,? ,?,?)");
    // $stm->execute([$fname,$lname,$_POST['gender'],$_POST['username'],$_POST['Password'],$img["name"]]);
    header("Location:list.php");
    session_destroy();
   }
}
else if(isset($_POST['update'])){
  $array=[$_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['username'],$_POST['Password'],$_POST['id']];
  $db->update("student","fname=?, lname=?, gender=?,username=?,pass=?","id=?",$array);
    // $stm = $conn->prepare("UPDATE student SET fname=?, lname=?, gender=?,username=?,pass=? where id=?");
    // $stm->execute([$_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['username'],$_POST['Password'],$_POST['id']]);
     header("Location:list.php");
}
else if(isset($_POST['login'])){
  $result=$db->get_data("student","username=? and pass=?",[$_POST['username'],$_POST['Password']]);
 // $stm=$conn->prepare("select * from student where username=? and pass=?");
 // $stm->execute([$_POST['username'],$_POST['Password']]);
  // $result=$stm->fetch(PDO::FETCH_ASSOC);
   if($result){
    setcookie("img",$result['img']);
    setcookie("username",$result['username']);
    header("Location:home.php");
   }
 else{
  header("Location:login.php?error=1");
 }
}
}
function validate($data){
  $data=trim($data);
  $data=stripcslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}

?>