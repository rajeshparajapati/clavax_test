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

<?php echo $this->session->flashdata('message') ?>
<div class="container" style="margin-top: 10%; border: 1px solid black;" >
	<div class="row" style="margin: 10px 0px">
		<div class="col-md-2">
			<lable class="btn btn-info">Inventory App</lable>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<div class="row">
				<div class="col-md-10">
					<div class="search-field">
						<input type="text" class="form-control" name="search_key" id="search_key" placeholder="Search by Product Name, company or category." />
					</div>
				</div>
				<div class="col-md-2">
					<div class="search-button">
						<button type="button" id="searchBtn" class="btn btn-info">Search</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<a href="<?php echo base_url('/products/add'); ?>"  class="btn btn-info" style="float: right;">New Product</a>
		</div>
	</div>

	<div class="row" style="margin-top:10px">
		<div class="col-md-12">
			<div id="ajaxContent" class="clearfix"></div>
		</div>
	</div>
</div>



<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>


<script>
	
	$(function() {
		
	
		ajaxlist(page_url=false);
		
		
		$(document).on('click', "#searchBtn", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});
		
	
		
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});
		
		
		function ajaxlist(page_url = false)
		{
			var search_key = $("#search_key").val();
			
			var dataString = 'search_key=' + search_key;
			var base_url = '<?php echo site_url('products/index_ajax/') ?>';
			
			if(page_url == false) {
				var page_url = base_url;
			}
			
			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
					console.log(response);
					$("#ajaxContent").html(response);
				}
			});
		}
	});


	$('body').on('click','.detail-product',function(e){
		e.preventDefault();
		var base_url = '<?php echo site_url('products/get_detail') ?>';
		var product_id = $(this).attr('product_id');
		$.ajax({
				type: "POST",
				url: base_url,
				data: {product_id:product_id},
				success: function(response) {
					
					$('.modal-body').html(response);
					$('#exampleModal').modal('show');
				}
			});
	})
	</script>

	</body>
</html>