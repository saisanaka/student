<?php include 'db_connect.php' ?>
<?php
$test = $_GET['id'];
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT d.*, u.name FROM donations as d inner join users as u on d.donated_by = u.id where 
    donate_id=".$_GET['id'])->fetch_array();
}
?>
<div class="container-fluid">
	<form action="" id="manage-donation">
				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id']:'' ?>" class="form-control">
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $qry['username'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $qry['email'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Mobile Number</label>
                <input type="number" name="phone_no" class="form-control" value="<?php echo $qry['phone_no'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">UPI Payments</label>
                <input type="text" name="upi_pay" class="form-control" value="<?php echo $qry['upi_pay'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Account Number</label>
                <input type="text" name="acc_no" class="form-control" value="<?php echo $qry['acc_no'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Amount</label>
                <input type="number" name="amount" class="form-control" value="<?php echo $qry['amount'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Connected To</label>
                <input type="text" name="connected_to" class="form-control" value="<?php echo $qry['connected_to'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Credited To</label>
                <input type="text" name="credited_to" class="form-control" value="<?php echo $qry['credited_to'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">UTR No</label>
                <input type="text" name="utr_no" class="form-control" value="<?php echo $qry['utr_no'] ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Donate Purpose</label>
                <input type="text" name="donate_desc" class="form-control" value="<?php echo $qry['donate_desc'] ?>">
			</div>
		</div>
	</form>
</div>

<script>
	$('.text-jqte').jqte();
	$('#manage-donation').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_donation',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>