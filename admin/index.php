<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php include('common/header.php');?>			
<!-- Right Content Start -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<?php
						$totalRecipe=count_recipe();
					?>
					<div class="panel-heading">All Recipes <span class="badge"><?php echo $totalRecipe['total']; ?></span> <span class="pull-right"><a href="add-recipe.php">Add Recipe <i class="fa fa-long-arrow-right"></i></a></span></div>
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
									<th>Category</th>
									<th>Title</th>
									<th>Description</th>
									<th>Image</th>
									<th>Video Url</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$recipe=get_all_recipe();
								if($recipe['bool']==true){
									foreach($recipe['allData'] as $recipe){
										$categoryDetail=get_category_by_id($recipe['category_id']);
										// _t($categoryDetail);
									?>
									<tr>
										<td><?php echo $categoryDetail['allData']['title']; ?></td>
										<td><?php echo $recipe['title']; ?></td>
										<td><?php echo $recipe['small_desc']; ?></td>
										<td><img src="<?php echo $path['siteUrl'].'/admin/upload/'.$recipe['img']; ?>" width="100" /></td>
										<td><?php echo $recipe['video_url']; ?></td>
										<td>
											<a href="edit-recipe.php?recid=<?php echo $recipe['recipe_id']; ?>" title="Edit" class="text-blue"><i class="fa fa-pencil"></i></a>&nbsp;
											<a onclick="return confirm('Are you sure to delete this?')" href="delete-recipe.php?recid=<?php echo $recipe['recipe_id']; ?>" title="Delete" class="text-red"><i class="fa fa-times"></i></a>
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
									<th>Category</th>
									<th>Title</th>
									<th>Description</th>
									<th>Image</th>
									<th>Video Url</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<!-- Right Content End -->
			<?php include('common/footer.php'); ?>