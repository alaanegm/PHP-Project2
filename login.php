
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
input[type=submit] ,input[type=reset],button,a{
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
<label for="fname">User Name:</label><br>
  <input type="text" id="username" name="username" value=""><br>
  <label for="lname">Password:</label><br>
  <input type="text" id="Password" name="Password" value=""><br>
  <input type="submit" value="login" name="login"><br>
  <button><a href='phpInfo.php'>Register</a></button><br><br>
  <?php
//   $error=$_GET['error'];
  if(isset($_GET['error'])){
    echo "username or password not valid";
  }
?>
</form>
</body>
</html>