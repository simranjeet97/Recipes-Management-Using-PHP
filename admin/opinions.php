<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php include('common/header.php');?>			
<!-- Right Content Start -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<?php
						$totalOpinion=count_opinion();
					?>
					<div class="panel-heading">All Opinions <span class="badge"><?php echo $totalOpinion['total']; ?></span></div>
					<div class="panel-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Message</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$opinions=get_all_opinions();
								if($opinions['bool']==true){
									foreach($opinions['allData'] as $opinion){
									?>
									<tr>
										<td><?php echo $opinion['name']; ?></td>
										<td><?php echo $opinion['email']; ?></td>
										<td><?php echo $opinion['phone']; ?></td>
										<td><?php echo $opinion['message']; ?></td>
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
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Message</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<!-- Right Content End -->
			<?php include('common/footer.php'); ?>