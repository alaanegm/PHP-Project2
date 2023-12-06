<table border=1>
  <tr>
  <th>ID</th>
    <th>First Name</th>
    <th>last Name</th>
    <th>Gender</th>
    <th>User Name</th>
    <th>password</th>
    <th>image</th>
    
    
  </tr>
  <?php
  if(!isset($_COOKIE['username'])) {
    header("Location:login.php");
  }
  else{
    $username = "root";
    $password = "";
    
    try {
      require("db.php");
      $db=new db();
      $result=$db->get_AllData("student");
      // $conn = new PDO("mysql:host=localhost;dbname=test;port=3310", $username, $password);
      //  $data=$conn->query("select * from student ");
      //  $result=$data->fetchAll(PDO::FETCH_ASSOC);
       foreach($result as $value){
        echo "<tr>";
        foreach($value as $key=>$user){
           if($key=="img"){
            echo "<td><img src='images/".$user."' width=40></td>";
           }
            else{
              echo "<td>$user</td>";
            }
        }
         echo "<td><a href='view.php?id=$value[id]'>view</a></td>";
         echo "<td><a href='edit.php?id=$value[id]'>Edit</a></td>"; 
         echo "<td><a href='delete.php?id=$value[id]'>delete</a></td>"; 
        echo "</tr>";
       }
    
    
    
    
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
   }

?>
</table>

<a href='logout.php'>logout</a>


