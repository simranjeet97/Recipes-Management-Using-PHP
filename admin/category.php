<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php include('common/header.php');?>			
<!-- Right Content Start -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<?php
						$totalCategory=count_category();
					?>
					<div class="panel-heading">All Categories <span class="badge"><?php echo $totalCategory['total']; ?></span> <span class="pull-right"><a href="add-category.php">Add Category <i class="fa fa-long-arrow-right"></i></a></span></div>
					<div class="panel-body">
						<?php
							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							}
						?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Category Title</th>
									<th>Description</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$categories=get_all_category();
								if($categories['bool']==true){
									foreach($categories['allData'] as $category){
									?>
									<tr>
										<td><?php echo $category['title']; ?></td>
										<td><?php echo $category['description']; ?></td>
										<td><img src="<?php echo $path['siteUrl'].'/admin/upload/'.$category['image']; ?>" width="70" /></td>
										<td>
											<a href="edit-category.php?catid=<?php echo $category['category_id']; ?>" title="Edit" class="text-blue"><i class="fa fa-pencil"></i></a>&nbsp;
											<a onclick="return confirm('Are you sure to delete this?')" href="delete-category.php?catid=<?php echo $category['category_id']; ?>" title="Delete" class="text-red"><i class="fa fa-times"></i></a>
										</td>
									</tr>
									<?php
									}
								}else{
									?>
									<tr>
										<td colspan="4"><p class="alert alert-warning">No Data Found</p></td>
									</tr>
									<?php
								}
							?>
							</tbody>
							<tfoot>
								<tr>
									<th>Category Title</th>
									<th>Description</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<!-- Right Content End -->
			<?php include('common/footer.php'); ?>