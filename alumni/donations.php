<?php 
include 'admin/db_connect.php'; 
?>
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.gallery-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}
.gallery-img,.gallery-list .card-body {
    width: calc(50%)
}
.gallery-img img{
    border-radius: 5px;
    min-height: 50vh;
    max-width: calc(100%);
}
span.hightlight{
    background: yellow;
}
.carousel,.carousel-inner,.carousel-item{
   min-height: calc(100%)
}
header.masthead,header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }
.row-items{
    position: relative;
}
.masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

</style>
<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">Click Below to Donate</h3>
                <hr class="divider my-4" />
            <div class="row col-md-12 mb-2 justify-content-center">
                <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> 
                New Payment</button>
            </div>   
            </div>
        </div>
    </div>
</header>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight:300;">New Payment</h4>
            </div>
            <div class="modal-body">
                <form autocomplete="off" class="form-search" method="post" onsubmit="return confirm('Are you sure you want to save')" action="manage_donations.php">
                    <div class="form-group">
                        <label for="pay_type">PhonePe/GooglePay</label>
                        <input type="text" class="form-control" id="pay_type" name="pay_type" required>
                    </div>
                    <div class="form-group">
                        <label for="acc_no">Account Number</label>
                        <input type="text" class="form-control" id="acc_no" name="acc_no" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="typ_email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="ph_no">Phone Number</label>
                        <input type="number" class="form-control" name="ph_no" id="ph_no" required>
                    </div>
                    <div class="form-group">
                        <label for="typ_connect">Connected To</label>
                        <input type="text" class="form-control" name="typ_connect" id="typ_connect" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="credit_to">Credited To</label>
                        <input type="text" class="form-control" name="credit_to" id="credit_to" required>
                    </div>
                    <div class="form-group">
                        <label for="utr_no">UTR No</label>
                        <input type="text" class="form-control" name="utr_no" id="utr_no" required>
                    </div>
                    <div class="form-group">
                        <label for="donate_pur">Donation Purpose</label>
                        <input type="text" class="form-control" name="donate_pur" id="donate_pur" required>
                    </div>
                    <div class="form-group" style="margin-top: 10px;text-align:center;">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>&nbsp;
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Table Data -->
<div class="table-data" style="background-color: grey; color: black; min-height: 500px;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Upi</th>
                <th scope="col">Account Number</th>
                <th scope="col">Amount</th>
                <th scope="col">Connected to</th>
                <th scope="col">Credited To</th>
                <th scope="col">UTR No</th>
                <th scope="col">Donation Purpose</th>
                <th scope="col">Donated Time</th>
            </tr>
        </thead>
        <tbody>
            
                <?php
                    $sql = "SELECT * FROM donations where is_active = 1";
                    $res = mysqli_query($conn,$sql);
                    // $ress = mysqli_fetch_array($res);
                ?>
                <?php $i = 1; while($result = mysqli_fetch_array($res)) { ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result['username'] ?></td>
                <td><?php echo $result['email'] ?></td>
                <td><?php echo $result['phone_no'] ?></td>
                <td><?php echo $result['connected_to'] ?></td>
                <td><?php echo $result['amount'] ?></td>
                <td><?php echo $result['upi_pay'] ?></td>
                <td><?php echo $result['acc_no'] ?></td>
                <td><?php echo $result['credited_to'] ?></td>
                <td><?php echo $result['utr_no'] ?></td>
                <td style="text-align: center;"><?php echo $result['donate_desc'] ?></td>
                <td><?php echo $result['donated_at'] ?></td>
            </tr>
                <?php $i++; } ?>
        </tbody>
    </table>
</div>
