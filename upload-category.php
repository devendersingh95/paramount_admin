<?php  include("db.php");
	if(isset($_POST))
	{
		$name = $_POST['cat_name'];
		$desc = $_POST['cat_desc'];
		$valid_extensions = array('jpg','jpeg','png'); // valid extensions
if(isset($_FILES['cat_image']))
{
 $image = $_FILES['cat_image']['name'];
 $tmp = $_FILES['cat_image']['tmp_name'];

 // get uploaded file's extension
 $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
 $path = 'images/';
 $final_image = "cat-image-".$image;

 $path = $path.strtolower($final_image);

 // check's valid format
 if(in_array($ext, $valid_extensions))
 {
		$query = "SELECT * FROM bags WHERE name='".$name."'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result)>0)
		{
			echo "<img src='images/error.png' width='100px'><br/> This Bag Category has already Been Added";
		}
		else
		{
			$query = "INSERT INTO bags (`name`, `image`, `about`, `status`) VALUES ('$name','$path','$desc',1)";
			if(move_uploaded_file($tmp,__DIR__ ."/".$path))
				{
					if(mysqli_query($link,$query))
					{
						echo "<img src='images/success.png' width='100px'><br/>New Bag Category has been added";
					}
					else
					{
						echo "<img src='images/error.png' width='100px'><br/>Some Error Occured with Database! Try Again <br/>".mysqli_error($link);
					}
				}
				else
				{
					echo "<img src='images/error.png' width='100px'><br/>Some Error Occured! Unable to Move File <br/>";
				}
		}
 }
 else
 {
  echo "<img src='images/error.png' width='100px'><br/>Invalid Image File ! Try Again";
 }
}
else echo "Image Not Set";
	}
?>
