<?php session_start();
include("db.php");
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
	$path = 'images/'.$_FILES['upl']['name'];
	$cat_id  = $_POST['category'];
	$desc = $_POST['about']
	if(move_uploaded_file($_FILES['upl']['tmp_name'],__DIR__ ."/".$path)){
		$check = "SELECT * FROM images WHERE img_path='".$path."' AND cat_id=".$cat_id;
		if(mysqli_num_rows(mysqli_query($link,$check))==0)
		{
			$query = "INSERT INTO images (cat_id,img_path,status) VALUES ('$cat_id','$path',1)";
				if(mysqli_query($link,$query))
				{
					echo '{"status":"success"}';
					exit;
				}
		}
		else
		{
			echo '{"status":"error"}';
			exit;
		}
	}
}
else
{
echo '{"status":"error"}';
exit;
}
