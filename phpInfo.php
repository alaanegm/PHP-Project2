
<?php
ini_set('display_errors', 0);
// if($_SERVER['REQUEST_METHOD'] === 'POST'){
  session_start();
if (isset($_SESSION)) {
 $fnameErr= $_SESSION["fname"] ;
//  $_SESSION["fname"]="";
 $lnameErr= $_SESSION["lname"] ;
  $username= $_SESSION["username"] ;
  $password= $_SESSION["password"] ;
//  echo $lnameErr;
}
else{
  // echo "not exist";
}
// }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            background-color: #cccccc3b;
            width:50%;
            border-radius: 4px;
            padding:15px;
        }
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
/* #vehicle3{
    margin-right:10px
} */
input[type=submit] ,input[type=reset]{
  width: 50%;
  background-color: #423d3d;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.error{
  color:red;
}
    </style>
</head>
<body>

<form action="/projectdb/controller.php" method="post" enctype="multipart/form-data">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <span class="error"> <?php if(isset($fnameErr)){echo $fnameErr;}?></span><br><br>

  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br>
  <span class="error"> <?php if(isset($lnameErr)){echo $lnameErr;}?></span><br><br>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">female</label><br><br>
  <label for="fname">User Name:</label><br>
  <input type="text" id="username" name="username" value=""><br>
  <span class="error"> <?php if(isset($username)){echo $username;}?></span><br><br>
  <label for="lname">Password:</label><br>
  <input type="text" id="Password" name="Password" value=""><br>
  <span class="error"> <?php if(isset($password)){echo $password;}?></span><br><br>
  <input type="file" name="image" id="image"><br><br>
  <!-- <input type="submit" value="Upload"> -->
  <input type="submit" value="submit" name="add">
  <input type="reset" value="Reset">
</form> 
   
   
</body>
</html>
