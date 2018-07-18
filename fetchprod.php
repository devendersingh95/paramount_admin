<?php
  include("db.php");
  if(isset($_POST))
  {
    $cat = $_POST['category'];
    $q = "select id from images where cat_id=".$cat;
    $res = mysqli_query($link,$q);
    echo "<option value=''>--Choose Product--</option>";
    while(mysqli_fetch_array($res))
    {
      echo "<option value='".$row['id']."'>".$row['']
    }
  }
?>
