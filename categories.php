<?php include("header.php");
include("db.php");
	if(isset($_GET['delete_id']))
	{
		$success="";
		$del_id  = base64_decode($_GET['delete_id']);
			$get = "SELECT * FROM bags WHERE id=".$del_id;
			$fetch = mysqli_fetch_array(mysqli_query($link,$get));
			$cat_name = $fetch['name'];
			$del_query = "DELETE FROM bags WHERE id=".$del_id;
			$image = $fetch['image'];

			if(unlink($image))
			{
					if(mysqli_query($link,$del_query))
						$success = "Bag Category - ".$cat_name." Deleted Successfully!";
					else
						$success = "Some Error Occured While Deleting Category! Please Contact Developer";
			}
			else
			{
				$success = "Error Occured! File Not Deleted";
			}



	}
?>
<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            All Bag Categories <small>You can Modify or Delete Categories Here.</small>
                        </h1>
                    </div>
					<div class="col-lg-12">
						<?php
							if(isset($success) && $success!="")
							{
						?>
							<div class="alert alert-success">
									<strong>Done! </strong> <?php echo $success; ?>
								</div>
							<?php }?>

								<?php
											$query = "SELECT * FROM bags ORDER BY id ASC";
											$res = mysqli_query($link,$query);
											if(mysqli_num_rows($res))
											{

											?>
											<div class="panel-body">
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Description</th>
															<th>Featured Image</th>
															<th>Options</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$i=1;
															while($row=mysqli_fetch_array($res))
															{
														?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $row['name']; ?></td>
																<td><?php echo $row['about']; ?></td>
																<td><img src="<?php echo $row['image']; ?>" width="200px"/></td>
																<td><a href="#" disabled class="btn btn-primary">Modify</a>&nbsp;&nbsp;<a href="categories.php?delete_id=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger">Delete</a></td>
															</tr>
														<?php $i++; }?>
													</tbody>
												</table>
											</div>
											</div>
										<?php
											}
											else
											{
												echo "<h4>No Bag Categories Found. You can Add Categories <a href='add-category.php' class='btn btn-danger'>HERE</a></h4>";
											}
										?>

					 </div>
			 </div>
<?php include("footer.php"); ?>
