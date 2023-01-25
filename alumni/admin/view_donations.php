<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT a.*,b.name FROM donations as a inner join users as b where a.donate_id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<style type="text/css">
	
	.avatar {
	    display: flex;
	    border-radius: 100%;
	    width: 100px;
	    height: 100px;
	    align-items: center;
	    justify-content: center;
	    border: 3px solid;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: calc(100%);
	    border-radius: 100%;
	}
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: block
	}
</style>
<div class="container-field">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-6">
				<p>Name: <b><?php echo $name ?></b></p>
			</div>
            <div class="col-md-6">
                <p>Email: <b><?php echo $email ?></b></p>
            </div>
            <div class="col-md-6">
                <p>Mobile Number: <b><?php echo $phone_no ?></b></p>
            </div>
            <div class="col-md-6">
                <p>amount: <b><?php echo $amount ?></b></p>
            </div>
			<div class="col-md-6">
				<p>Account Status: <b><?php echo $is_active == 1 ? '<span class="badge badge-primary">Accepted</span>' : '<span class="badge badge-secondary">Rejected</span>' ?></b></p>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-lg-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
			<?php if($is_active == 1): ?>
			<button class="btn float-right btn-primary update mr-2" data-status = '0' type="button" data-dismiss="modal">Reject</button>
			<?php else: ?>
				<button class="btn float-right btn-primary update mr-2" data-status = '1' type="button" data-dismiss="modal">Accept</button>
			<?php endif; ?>
		</div>
	</div>
</div>
<script>
	$('.update').click(function(){
		start_load()
		$.ajax({
			url:'ajax.php?action=update_donation_sts',
			method:"POST",
			data:{id:<?php echo $donate_id ?>,status:$(this).attr('data-status')},
			success:function(resp){
				if(resp == 1){
					alert_toast("Payment Status Changed.")
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>
