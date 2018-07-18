<?php include("header.php");
	include("db.php");
 ?>
<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                             Upload Images<small> You can also drag and drop images here</small>
                        </h1>
                    </div>
					<div class="col-lg-12 col-md-12">
								<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
									<input name="category" type="hidden" value="<?php echo base64_decode($_GET['cat_id']); ?>"/>
									<div id="drop">
										Drop Here

										<a>Browse</a>
										<input type="file" name="upl" multiple />
									</div>

									<ul>
										<!-- The file uploads will be shown here -->
									</ul>

								</form>
							</div>
			 </div>
<?php include("footer.php"); ?>
