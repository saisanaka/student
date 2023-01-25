<?php include('db_connect.php');?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<b>Donations</b>
					</div>
					<div class="card-body">
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                    <tr class="table table-dark" style="color: black;">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>UPI</th>
                                        <th>Account Number</th>
                                        <th>Amount</th>
                                        <th>Connected To</th>
                                        <th>Credited To</th>
                                        <th>UTR No</th>
                                        <th>Donation Purpose</th>
                                        <th>Donated At</th>
                                        <th>Donated By</th>
                                        <th>Action</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    $Forum =  $conn->query("SELECT d.*,u.name from donations as d inner join users u on u.id = d.donated_by order by 
                                    d.donate_id desc");
                                    while($row = $Forum->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone_no'] ?></td>
                                        <td><?php echo $row['connected_to'] ?></td>
                                        <td><?php echo $row['amount'] ?></td>
                                        <td><?php echo $row['upi_pay'] ?></td>
                                        <td><?php echo $row['acc_no'] ?></td>
                                        <td><?php echo $row['credited_to'] ?></td>
                                        <td><?php echo $row['utr_no'] ?></td>
                                        <td><?php echo $row['donate_desc'] ?></td>
                                        <td><?php echo $row['donated_at'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td class="text-center">
                                            <!-- <button class="btn btn-sm btn-outline-primary edit_forum" type="button" 
                                            data-id="<?php echo $row['donate_id'] ?>" >Edit</button> -->
                                            <button class="btn btn-sm btn-outline-primary view_status" type="button" 
                                            data-id="<?php echo $row['donate_id'] ?>" >View</button>
                                            <?php //echo '<a href="update_donations.php?id='.$row['donate_id'].'">Edit</a>' ?>
                                            <button class="btn btn-sm btn-outline-danger delete_forum" type="button" 
                                            data-id="<?php echo $row['donate_id'] ?>">Delete</button>
                                        </td>
                                        <td class="text-center">
										<?php if($row['is_active'] == 1): ?>
											<span class="badge badge-primary">Accepted</span>
										<?php else: ?>
											<span class="badge badge-secondary">Rejected</span>
										<?php endif; ?>
									</td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<script>
    // $('.edit_forum').click(function(){
	// 	udt_donations("Manage Job Post","update_donations.php?id="+$(this).attr('data-id'),'mid-large')
	// })
    $('.view_status').click(function(){
		udt_donations("View Status","view_donations.php?id="+$(this).attr('data-id'),'mid-large')
	})
    $('.delete_forum').click(function(){
		_conf("Are you sure to delete this topic?","delete_forum",[$(this).attr('data-id')],'mid-large')
	})

    function delete_forum($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_entry',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

