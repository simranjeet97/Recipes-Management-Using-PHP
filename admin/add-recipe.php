<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php include('common/header.php');
		error_reporting(0);
?>
			<!-- Right Content Start -->
	
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Add Recipe <span class="pull-right"><a href="index.php"><i class="fa fa-long-arrow-left"></i> All Recipes</a></span></div>
					<div class="panel-body">
						<?php
							if(isset($_POST['addRec'])){
								$data=array();
								$data['category']=$_POST['category'];
								$data['title']=$_POST['title'];
								$data['small_desc']=$_POST['small_desc'];
								$data['description']=$_POST['description'];
								$data['videourl']=$_POST['videourl'];
								$image=$_FILES['image']['name'];
								$tmpimage=$_FILES['image']['tmp_name'];
								$rename=time().'_'.$_FILES['image']['name'];
								if(move_uploaded_file($tmpimage,'upload/'.$rename)){
									$data['image']=$rename;
									$addCat=add_recipe($data);
									if($addCat['bool']==true){
										_success('Data has been added');
									}
								}else{
									_error('File not uploaded');
								}
							}
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
													<option value="<?php echo $data['category_id']; ?>"><?php echo $data['title']; ?></option>
													<?php
												}
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<th>Recipe Title</th>
								<td><input type="text" name="title" class="form-control" /></td>
							</tr>
							<tr>
								<th>Small Description</th>
								<td><textarea class="form-control" name="small_desc"></textarea></td>
							</tr>
							<tr>
								<th>Description</th>
								<td><textarea class="form-control" name="description"></textarea></td>
							</tr>
							<tr>
								<th>Image</th>
								<td><input type="file" name="image" /></td>
							</tr>
							<tr>
								<th>Video Url</th>
								<td><input type="text" name="videourl" class="form-control" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" class="btn btn-danger" value="Add Recipe" name="addRec" />
								</td>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
			<!-- Right Content End -->
<?php include('common/footer.php'); ?>