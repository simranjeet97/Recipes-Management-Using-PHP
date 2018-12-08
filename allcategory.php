<!--Simranjeet Singh : Instagram - @ItsExceptional-->
<?php require('common/header.php'); ?>	
		<div class="row content margin-top40 margin-bottom30">
			<?php
				// Get All Category
				$limit=8;
				if(!isset($_GET['page']) || $_GET['page']==1){
					$start=0;
				}else{
					$start=($_GET['page']*$limit)-$limit;
				}
				$categories=get_all_category_front($start,$limit);
				if($categories['bool']==true){
					foreach($categories['allData'] as $category){
						?>
						<div class="col-md-3">
							<div class="panel panel-primary">
								<div class="panel-heading"><?php echo $category['title']; ?></div>
								<div class="panel-body">
									<img alt="<?php echo $category['title']; ?>" src="<?php echo $path['siteUrl']; ?>/admin/upload/<?php echo $category['image']; ?>" class="img-responsive" />
								</div>
								<div class="panel-footer">
									<p><a href="category.php?catid=<?php echo $category['category_id']; ?>&title=<?php echo $category['title']; ?>" class="text-blue">See Recipes</a></p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					<div class="clearfix"></div>
					<div class="pagination-container">
						<ul class="pagination">
							<?php
								$totalRecipes=count_category_front();
								$totalRecipes=$totalRecipes['total'];
								$links=ceil($totalRecipes/$limit);
								for($i=1; $i<=$links; $i++){
									if(isset($_GET['page']) && $_GET['page']==$i){
										$class='active';
									}else{
										if($i==1){
											$class='active';
										}else{
											$class='';
										}
										$class='';
									}
									?>
									<li class="<?php echo $class; ?>"><a href="allcategory.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php
								}
							?>
						</ul>
					</div>
					<?php
				}else{
					echo _warning('No Data Found');
				}
			?>
		</div>
		<!-- Row End -->

		<!-- #Content End -->
	</div><!-- Container End -->
<?php include('common/footer.php'); ?>