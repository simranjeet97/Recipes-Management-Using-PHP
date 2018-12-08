<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php include('common/header.php');?>
			<!-- Right Content Start -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Recipe <span class="pull-right"><a href="index.php"><i class="fa fa-long-arrow-left"></i> All Recipes</a></span></div>
					<div class="panel-body">
						<?php
							$recId=(int)$_GET['recid'];
							if(isset($_POST['updateRec'])){
								$data=array();
								$data['category']=$_POST['category'];
								$data['title']=$_POST['title'];
								$data['small_desc']=$_POST['small_desc'];
								$data['description']=$_POST['description'];
								$data['videourl']=$_POST['videourl'];
								$image=$_FILES['image']['name'];
								$tmpimage=$_FILES['image']['tmp_name'];
								$rename=time().'_'.$_FILES['image']['name'];
								if(empty($_FILES['image']['name'])){
									$rename=$_POST['image'];
									$data['image']=$rename;
									$updateRec=update_recipe($data,$recId);
									if($updateRec['bool']==true){
										_success('Data has been updated');
									}else{
										_warning('Nothing Changed');
									}
								}else{
									if(move_uploaded_file($tmpimage,'upload/'.$rename)){
										$data['image']=$rename;
										$updateRec=update_recipe($data,$recId);
										if($updateRec['bool']==true){
											_success('Data has been updated');
										}else{
											_error('Data has not been updated');
										}
									}else{
										_error('File not uploaded');
									}
								}
								
							}
							$recipeDetail=get_recipe_by_id($recId);
							if($recipeDetail['bool']==true){
						?>
						<form action="" method="post" enctype="multipart/form-data">
						<table class="table table-bordered">
							<tr>
								<th>Select Category</th>
								<td>
									<select class="form-control" name="category">
										<option value="">--- Select Category ---</option>
										<?php
											$categories=get_all_category();
											if($categories['bool']==true){
												foreach($categories['allData'] as $data){
													?>
													<option <?php if($data['category_id']==$recipeDetail['allData']['category_id']){echo 'selected';} ?> value="<?php echo $data['category_id']; ?>"><?php echo $data['title']; ?></option>
													<?php
												}
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<th>Recipe Title</th>
								<td><input type="text" value="<?php echo $recipeDetail['allData']['title']; ?>" name="title" class="form-control" /></td>
							</tr>
							<tr>
								<th>Small Description</th>
								<td><textarea class="form-control" name="small_desc"><?php echo $recipeDetail['allData']['small_desc']; ?></textarea></td>
							</tr>
							<tr>
								<th>Description</th>
								<td><textarea class="form-control" name="description"><?php echo $recipeDetail['allData']['description']; ?></textarea></td>
							</tr>
							<tr>
								<th>Image</th>
								<td>
									<img src="<?php echo $path['siteUrl']; ?>/admin/upload/<?php echo $recipeDetail['allData']['img']; ?>" width="100" />
									<input type="file" name="image" />
									<input type="hidden" name="image" value="<?php echo $recipeDetail['allData']['img']; ?>" />
								</td>
							</tr>
							<tr>
								<th>Video Url</th>
								<td><input value="<?php echo $recipeDetail['allData']['video_url']; ?>" type="text" name="videourl" class="form-control" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" class="btn btn-danger" value="Update Recipe" name="updateRec" />
								</td>
							</tr>
						</table>
						</form>
						<?php }else{_error('Recipe is not valid');} ?>
					</div>
				</div>
			</div>
			<!-- Right Content End -->
<?php include('common/footer.php'); ?>