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
$username = "root";
$password = "";

try {
  // $conn = new PDO("mysql:host=localhost;dbname=test;port=3310", $username, $password);
  require("db.php");
      $db=new db();
      $conn=$db->get_conn();
  $id=$_GET['id'];

  $data=$conn->query("select * from student where id=$id ");
   $result=$data->fetch(PDO::FETCH_ASSOC);
    echo "<tr>";
    foreach($result as $key=>$user){
      if($key=="img"){
        echo "<td><img src='images/".$user."' width=40></td>";
       }
        else{
          echo "<td>$user</td>";
        }
    }
    echo "</tr>";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
</table>
