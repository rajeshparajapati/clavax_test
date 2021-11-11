
<div class="box-body">
	<div class="table-responsive">
		<table class="table" style="border: 1px solid black;">
			<thead>
				<tr>
					<th>SNo</th>
					<th>Product Name</th>
					<th>Company</th>
					<th>Category</th>					
				</tr>
			</thead>
			<tbody>
			<?php if( ! empty($products)) { ?>
			<?php foreach($products as $i=>$product){ ?>
				<tr>
					<td><?php echo ++$row_numbers; ?></a></td>
					<td><a href="javascript:void(0)" class="detail-product" product_id="<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></a></td>
					<td><?php echo $product->company_name;  ?></td>
					<td><?php echo $product->product_category;  ?></td>					
				</tr>
			<?php } ?>
			<?php } else { ?>
			<tr><td colspan="8" class="no-records">No records</td></tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="box-footer">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<ul class="pagination">
		<?php echo $pagelinks ?>
	</ul>
		</div>
	
	<div class="col-sm-4"></div>
	</div>
</div>
