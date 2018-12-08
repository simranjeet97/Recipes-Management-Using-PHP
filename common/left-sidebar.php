<!--Simranjeet Singh : Instagram - @ItsExceptional-->

			<div class="col-md-3 left-sidebar">
				<div class="list-group">
					<?php
						$categories=get_all_category();
						if($categories['bool']==true){
							foreach($categories['allData'] as $category){
								// _t($category);
								?>
								<a href="category.php?title=<?php echo $category['title']; ?>&catid=<?php echo $category['category_id']; ?>" class="list-group-item"><?php echo $category['title']; ?></a>
								<?php
							}
						}
					?>
				</div>
			</div>