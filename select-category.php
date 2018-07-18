<?php include("db.php");
	if(isset($_POST['select-category']))
	{
		$cat = $_POST['cat_id'];
		$title = $_POST['title'];
		$desc = $_POST['about'];
		$err = "";
		if(!empty($cat) && !empty($title) && !empty($desc))
		{
			$check = mysqli_query($link,"SELECT * from product WHERE cat_id=$cat AND title='$title'");
			if(mysqli_num_rows($check))
			{
				$err = "Product Already added please add images";
			}
			else{
				$q = "INSERT into product (cat_id,title,about) VALUES($cat,'$title','$desc')";
				if(mysqli_query($link,$q))
				{
					$err = "Product Added Successfully!";
				}
				else {
					$err = "Some error occured!";
				}
			}
		}
	}
 include("header.php");
 ?>
<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Upload Images <small>Choose Category .</small>
                        </h1>
						<div class="col-lg-6">
									<form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Select Category </label>
                                            <select name="cat_id" id="cat_type" class="form-control">
                                                <option value="">--Select Category--</option>
												<?php
												$query = "SELECT * FROM bags";
												$res = mysqli_query($link,$query);
												if(mysqli_num_rows($res))
												{
													while($row = mysqli_fetch_array($res))
													{
													?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
													<?php
													}
												}
												?>
                                            </select>
                                        </div>
														<div class="form-group">
															<label for="title">Enter Product Title</label>
															<input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
														</div>
															<div class="form-group">
																<label>Enter Desciption</label>
																<textarea class="form-control" name="about" rows=5 cols=65 placeholder="Enter this product's description"></textarea>
															</div>
                                        <input type="submit" name="select-category" value="Add Product" class="btn btn-primary">
                                    </form>
							<br>

						<?php if(isset($err) && $err!="")  echo '<div class="alert alert-danger">
									'.$err.' </div>'; ?>
						</div>
                    </div>
			 </div>
<?php include("footer.php"); ?>
