<?php
session_start();
$user_id = $_SESSION['login_id'];

include 'admin/db_connect.php'; 
    $upi_type     = $_POST['pay_type'];
    $acc_no       = $_POST['acc_no'];
    $username     = $_POST['username'];
    $email        = $_POST['typ_email'];
    $ph_number    = $_POST['ph_no'];
    $connect_type = $_POST['typ_connect'];
    $amount       = $_POST['amount'];
    $credit_to    = $_POST['credit_to'];
    $utrno        = $_POST['utr_no'];
    $donate_pur   = $_POST['donate_pur'];
    $donated_by   = $user_id;
     if($upi_type != '')
     {
        $insert = "INSERT INTO donations (username, email, phone_no, connected_to, amount, upi_pay, acc_no, credited_to, utr_no, donate_desc, donated_by) values 
        ('".$username."', '".$email."', ".$ph_number.", '".$connect_type."', ".$amount.", '".$upi_type."', '".$acc_no."', '".$credit_to."', 
        '".$utrno."', '".$donate_pur."', ".$donated_by.")";
        $query = mysqli_query($conn, $insert);
      //   if($query == TRUE){
      //        $to = $email;
      //        $subject = "Notification";
      //        $txt = "Your donation has recieved to us. Thanks for your support'<br>'
      //        http://localhost/alumni/index.php?page=donations";
      //        mail($to,$subject,$txt);
      //   }
        header('location: index.php?page=donations');
     }
?>


