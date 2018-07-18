<?php  include("header.php"); ?>
<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Images <small>Upload images for products.</small>
                        </h1>
                    </div>
                    <div class="col-lg-6">
        									<form role="form" id="select-product" action="" method="post">
                                                <div class="form-group">
                                                    <label>Select Bag Category </label>
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
                                                    <label>Select Product </label>
                                                    <select class="form-control" name="prod_id" id="prod_id">

                                                    </select>
                                                </div>

                                                <input type="submit" name="productbtn" value="Next" class="btn btn-primary">
                                            </form>
        							<br>
                          <div id="message">
        									</div>
        						</div>
			 </div>
<?php include("footer.php"); ?>
