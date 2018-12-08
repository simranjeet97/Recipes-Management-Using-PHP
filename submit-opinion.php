<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php require('common/header.php'); ?>	
		<div class="row content margin-top40 margin-bottom30">
		<?php include('common/left-sidebar.php'); ?>
			<!-- #Left Sidebar End -->
			<div class="col-md-6">
				<?php
					if(isset($_POST['addOp'])){
						$data=array();
						$data['name']=$_POST['name'];
						$data['email']=$_POST['email'];
						$data['phone']=$_POST['phone'];
						$data['msg']=$_POST['msg'];
						$addOp=add_opinion($data);
						if($addOp['bool']==true){
							echo _success('Your Opinion has been send to Admin');
						}else{
							echo _error('Opinion has not been added');
						}
					}
				?>
				<form action="" method="post">
					<table class="table table-bordered">
						<tr>
							<th>Name</th>
							<td><input type="text" class="form-control" name="name" placeholder="Name" /></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><input type="text" class="form-control" name="email" placeholder="Email" /></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><input type="text" class="form-control" name="phone" placeholder="Phone" /></td>
						</tr>
						<tr>
							<th>Message</th>
							<td><textarea placeholder="Message" name="msg" class="form-control"></textarea></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="addOp" class="btn btn-danger" value="Send Message" /></td>
						</tr>
					</table>
				</form>
			</div>
			<!-- #Middle Content End -->
			<?php include('common/right-sidebar.php'); ?>
		</div><!-- Row End -->
		<!-- #Content End -->
	</div><!-- Container End -->
<?php include('common/footer.php'); ?>