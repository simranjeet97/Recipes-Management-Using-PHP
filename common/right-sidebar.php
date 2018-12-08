<!--Simranjeet Singh : Instagram - @ItsExceptional-->

			<div class="col-md-3 left-sidebar">
				<div class="panel panel-info">
					<div class="panel-heading">Social</div>
					<div class="panel-body social-icons">
						<span><a href="#"><i class="fa fa-facebook-square fa-2x"></i></a></span>
						<span><a href="#"><i class="fa fa-twitter fa-2x"></i></a></span>
						<span><a href="#"><i class="fa fa-instagram fa-2x"></i></a></span>
						<span><a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a></span>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Recently Added</div>
					<div class="panel-body">
						<?php
						$recipes=get_latest5_recipes();
						if($recipes['bool']==true){
							foreach($recipes['allData'] as $recipe){
								?>
								<p class="margin-bottom5 bold"><a class="text-green" href="recipe-detail.php?recid=<?php echo $recipe['recipe_id']; ?>&title=<?php echo $recipe['title']; ?>"><?php echo $recipe['title']; ?></a></p>
								<?php
							}
						}
						?>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Popular Recipes</div>
					<div class="panel-body">
						<?php
							$popularRecipes=get_popular_recipes();
							if($popularRecipes['bool']==true){
								foreach($popularRecipes['allData'] as $popularRecipe){
									?>
									<p class="margin-bottom5 bold"><a class="text-green" href="recipe-detail.php?recid=<?php echo $popularRecipe['recipe_id']; ?>&title=<?php echo $popularRecipe['title']; ?>"><?php echo $popularRecipe['title']; ?></a></p>
									<?php
								}
							}
						?>
					</div>
				</div>
			</div>
			<!-- #Right Sidebar End -->