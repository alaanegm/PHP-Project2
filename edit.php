<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
  require("db.php");
  $db=new db();
  $result=$db->get_data("student","id=?",[$id]);
  // var_dump($result);
}
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
    </style>
</head>
<body>

<form action="/projectdb/controller.php" method="post">
  <input type="hidden" value="<?=$id?>" name="id" >
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?=$result['fname']?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?=$result['lname']?>" ><br>
  <br>
  
  <input type="radio" id="male" name="gender" value="male" <?php echo ($result['gender']== 'male') ?  "checked" : "" ;  ?>/>
  <label for="male">male </label>
  <input type="radio" id="female" name="gender" value="female" <?php echo ($result['gender']== 'female') ?  "checked" : "" ;  ?>>
  <label for="female">female</label><br><br>
  <label for="fname">User Name:</label><br>
  <input type="text" id="username" name="username" value="<?=$result['username']?>"><br>
  <label for="lname">Password:</label><br>
  <input type="text" id="Password" name="Password" value="<?=$result['pass']?>"><br>
  <!-- <input type="file" name="image" id="image"><br><br> -->
  <input type="submit" value="update" name="update">
</form> 
   
</body>
</html>