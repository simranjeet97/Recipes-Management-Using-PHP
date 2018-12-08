<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php include('common/header.php');?>
			<!-- Right Content Start -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Category <span class="pull-right"><a href="category.php"><i class="fa fa-long-arrow-left"></i> All Categories</a></span></div>
					<div class="panel-body">
						<?php
							$catId=(int)$_GET['catid'];
							if(isset($_POST['updateCat'])){
								$data=array();
								$data['title']=$_POST['title'];
								$data['description']=$_POST['description'];
								$image=$_FILES['catimage']['name'];
								$tmpimage=$_FILES['catimage']['tmp_name'];
								$rename=time().'_'.$_FILES['catimage']['name'];
								if(empty($_FILES['catimage']['name'])){
									$rename=$_POST['catimage'];
									$data['catimage']=$rename;
									$updateCat=update_category($data,$catId);
									if($updateCat['bool']==true){
										_success('Data has been updated');
									}else{
										_warning('Nothing Changed');
									}
								}else{
									if(move_uploaded_file($tmpimage,'upload/'.$rename)){
										$data['catimage']=$rename;
										$updateCat=update_category($data,$catId);
										if($updateCat['bool']==true){
											_success('Data has been updated');
										}else{
											_error('Data has not been updated');
										}
									}else{
										_error('File not uploaded');
									}
								}
								
							}
							$categoryDetail=get_category_by_id($catId);
							if($categoryDetail['bool']==true){
						?>
						<form action="" method="post" enctype="multipart/form-data">
						<table class="table table-bordered">
							<tr>
								<th>Category Title</th>
								<td><input type="text" name="title" class="form-control" value="<?php echo $categoryDetail['allData']['title']; ?>" /></td>
							</tr>
							
							<tr>
								<th>Description</th>
								<td><textarea class="form-control" name="description"><?php echo $categoryDetail['allData']['description']; ?></textarea></td>
							</tr>
							<tr>
								<th>Image</th>
								<td>
									<img src="<?php echo $path['siteUrl'].'/admin/upload/'.$categoryDetail['allData']['image']; ?>" width="100" />
									<input type="file" name="catimage" />
									<input type="hidden" name="catimage" value="<?php echo $categoryDetail['allData']['image']; ?>" />
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" class="btn btn-danger" value="Update Category" name="updateCat" />
								</td>
							</tr>
						</table>
						</form>
						<?php }else{_error('Category is not valid');} ?>
					</div>
				</div>
			</div>
			<!-- Right Content End -->
		</div>
	</div>
</body>
</html>