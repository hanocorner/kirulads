<div class="table-responsive-sm">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Parent Category</th>
				<th scope="col">Sub Category</th>
				<th scope="col">Slug</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php if(!isset($results) || empty($results)): ?>
			<tr class="grid-tr">
				<td colspan="2">No Result(s)</td>
			</tr>
			<?php return false; ?>
			<?php endif; ?>

			<?php foreach($results as $result): ?>
			<tr class="grid-tr">
				<td style="width:2%;">
					<?php echo $result['catid']; ?>
				</td>
				<td style="width:20%;">
					<?php echo $result['category']; ?>
				</td>
				<td style="width:20%;">
					<?php echo $result['subcategory']; ?>
				</td>
				<td style="width:20%;">
					<?php echo $result['slug']; ?>
				</td>
				<td style="width:2%;">
					<a href="<?php echo base_url('admin/ads/view/'.$result['catid']); ?>" target="_blank" class="text-danger">
					<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
				</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<div class="my-4">
	<nav aria-label="Page navigation example">
		<?php if(!is_null($links)):  ?>
		<?php echo $links; ?>
		<?php endif; ?>
	</nav>
</div>
