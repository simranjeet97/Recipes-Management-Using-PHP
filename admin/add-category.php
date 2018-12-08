<?php include('common/header.php');?>
			<!-- Right Content Start -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Add Category <span class="pull-right"><a href="category.php"><i class="fa fa-long-arrow-left"></i> All Categories</a></span></div>
					<div class="panel-body">
						<?php
							if(isset($_POST['addCat'])){
								$data=array();
								$data['title']=$_POST['title'];
								$data['description']=$_POST['description'];
								$image=$_FILES['catimage']['name'];
								$tmpimage=$_FILES['catimage']['tmp_name'];
								$rename=time().'_'.$_FILES['catimage']['name'];
								if(move_uploaded_file($tmpimage,'upload/'.$rename)){
									$data['catimage']=$rename;
									$addCat=add_category($data);
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
								<th>Category Title</th>
								<td><input type="text" name="title" class="form-control" /></td>
							</tr>
							<tr>
								<th>Description</th>
								<td><textarea class="form-control" name="description"></textarea></td>
							</tr>
							<tr>
								<th>Image</th>
								<td><input type="file" name="catimage" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" class="btn btn-danger" value="Add Category" name="addCat" />
								</td>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
			<!-- Right Content End -->
		</div>
	</div>
</body>
</html>