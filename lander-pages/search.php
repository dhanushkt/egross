<?php
    include './../access/connection.php';  
    $key=$_GET['key'];
    $array = array();
    $query=mysqli_query($con,"SELECT * FROM itemmaster WHERE iname LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['iname'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
