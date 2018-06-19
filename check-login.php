<?php session_start();
	include("db.php");
	if(isset($_POST))
	{
		$email = $_POST['user'];
		$pass = md5($_POST['password']);
		$query = "SELECT * FROM admin WHERE username='$email' AND password='$pass'";
		$result = mysqli_query($link,$query);
			if(mysqli_num_rows($result)>0)
			{
				$row = mysqli_fetch_array($result);
				$_SESSION['para_username'] = $row['username'];
				echo "1";
			}
			else
			{
					echo "0";
			}
	}

?>
