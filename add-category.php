<?php include("header.php"); ?>
<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Bag Categories <small>Add Bag Categories to Your Website.</small>
                        </h1>
                    </div>
					<div class="col-lg-6">
                                    <form role="form"  id="add-category" enctype="multipart/form-data">
                                        <div class="form-group" id="namediv">
                                            <label>Title</label>
                                            <input name="cat_name" id="cat_name" class="form-control" placeholder="Enter a Category Title">
                                        </div>
										<div class="form-group" id="descdiv">
                                            <label>Description</label>
                                            <textarea name="cat_desc" id="cat_desc" class="form-control" rows="3" placeholder="Enter Category Description"></textarea>
                                        </div>
										<div class="form-group" id="imgdiv">
                                            <label>Featured Image</label>
                                            <input type="file" name="cat_image"  id="cat_image" class="form-control" >
                                        </div>
                                        <input type="submit"  id="upload-cat" value="Add Category" class="btn btn-primary">
                                        <button type="reset" id="reset" class="btn btn-danger">Reset</button>
                                    </form>
                     </div>
					 <div class="col-md-6" id="cat-details">

					 </div>
			 </div>
<br/>
<?php include("footer.php"); ?>
