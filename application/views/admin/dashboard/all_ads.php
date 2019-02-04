<!-- Grid -->
<div class="table-responsive-sm">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th scope="col">Title</th>
				<th scope="col">Date</th>
				<th scope="col">Price(Rs)</th>
                <th scope="col">Category</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
				<th scope="col"></th>
			</tr>
        </thead>
		<?php if(!isset($results) || empty($results)): ?>
		 <tr class="grid-tr"><td colspan="8">No Result(s)</td></tr>
		<?php return false; ?>
        <?php endif; ?>

		<?php foreach($results as $result): ?>
		<tr class="grid-tr" data-id="<?php echo $result['adid']; ?>">
			<td style="width:2%;">
				<?php echo $result['adid']; ?>
			</td>
			<td style="width:25%;">
				<?php echo $result['title']; ?>
			</td>
			<td style="width:10%;">
				<?php echo $result['date']; ?>
			</td>
			<td style="width:10%;">
				<?php echo $result['price']; ?>
            </td>
            <td style="width:10%;">
				<?php echo $result['category']; ?>
            </td>
            <td style="width:10%;">
				<?php echo $result['location']; ?>
			</td>
			<?php  $status = (int) $result['status']; ?>
			<?php if($status == 0): ?>
			<td style="width:10%;"><span class="badge badge-warning">Pending</span></td>
			<?php elseif($status == 1): ?>
			<td style="width:10%;"><span class="badge badge-success">Approved</span></td>
			<?php elseif($status == 2): ?>
			<td style="width:10%;"><span class="badge badge-danger">Problematic</span></td>
			<?php elseif($status == 3): ?>
			<td style="width:10%;"><span class="badge badge-primary">Sold on site</span></td>
			<?php endif;?>
			<td style="width:10%;">
				<div class="d-flex align-items-center justify-content-center">
					<a href="<?php echo base_url('admin/ads/view/'.$result['adid']); ?>" target="_blank" class="text-muted mx-2 add"><i
						 class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
					<a href="#" data-id="<?php echo $result['adid']; ?>" data-action="delete" class="text-muted mx-2 delete"><i class="fa fa-trash-o fa-lg"
						 aria-hidden="true"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>


	</table>
</div>

<!-- /. of grid  -->

<div class="my-4">
	<nav aria-label="Page navigation example">
		<?php if(!is_null($links)):  ?>
		<?php echo $links; ?>
		<?php endif; ?>
	</nav>
</div>
