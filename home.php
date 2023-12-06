<?php
if(!isset($_COOKIE['username'])) {
    header("Location:phpInfo.php");
}
else{
$name=$_COOKIE['username'];
$img=$_COOKIE['img'];
$imagePath="images/".$img;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <img src="<?php echo $imagePath; ?>" alt="Image" width=200>
        <h1><?php echo "hi: ".$name;?></h1>
      <h3> <a href='list.php'>List</a></h3>
    </div>
</body>
</html>