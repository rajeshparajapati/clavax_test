 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

 <div class="container-fluid" style="margin-top: 10px;">

 <?php echo $this->session->flashdata('message') ?>
 	<div class="row">
 		<div class="col-md-2"></div>
 		<div class="col-md-8">

 			<form method="post" action="<?php echo base_url('products/add'); ?>" enctype="multipart/form-data">
 			
 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="<?php echo set_value('product_name'); ?>">
 					</div>
 					<?php echo form_error('product_name'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" value="<?php echo set_value('company_name'); ?>">
 					</div>
 					<?php echo form_error('company_name'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<select name="product_category" class="form-control" required="">
 							<option value="">Select..</option>
 							<option value="House Hold">House Hold</option>
 							<option value="Beauty">Beauty</option>
 							<option value="Food">Food</option>
 						</select>
 					</div>
 					<?php echo form_error('product_category'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" placeholder="Enter SKU" name="sku_no" value="<?php echo set_value('sku_no'); ?>">
 					</div>
 					<?php echo form_error('sku_no'); ?>
 				</div>


 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" placeholder="Enter Batch No" name="batch_no" value="<?php echo set_value('batch_no'); ?>">
 					</div>
 					<?php echo form_error('batch_no'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<select name="size" class="form-control" required="">
 							<option value="">Select..</option>
 							<option value="Small">Small</option>
 							<option value="Medium">Medium</option>
 							<option value="Large">Large</option>
 						</select>
 					</div>
 					<?php echo form_error('size'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<input type="number" class="form-control" placeholder="Enter Quantity" name="qty" value="<?php echo set_value('qty'); ?>">
 					</div>
 					<?php echo form_error('qty'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<input type="number" class="form-control" step="any" placeholder="Enter Price" name="price" value="<?php echo set_value('price'); ?>">
 					</div>
 					<?php echo form_error('price'); ?>
 				</div>

 					<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3"> </label>
 					<div class="col-sm-4">
 						<select name="stock_status" class="form-control" required="">
 							<option value="">Select..</option>
 							<option value="In Stock">In Stock</option>
 							<option value="Out of Stock">Out of Stock</option>
 							
 						</select>
 					</div>
 					<?php echo form_error('size'); ?>
 				</div>			
				 
				 <div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="name"> Image </label>
 					<div class="col-sm-4">
 						<input type="file" class="form-control"  name="image" required="">
 					</div> 
 				</div>

 		


 				<div class="form-group row">
 					<div class="col-sm-4"> </div>
 					<div class="col-sm-4">
						 <button type="submit" class="btn btn-primary">Submit</button>
						 <button class="btn btn-danger"><a href="<?php echo base_url();?>" class="textCls">Back</a> </button> 
 					</div>
 				</div>

 			</form>
 		</div>
 	</div>
 </div>
</body>
</html>