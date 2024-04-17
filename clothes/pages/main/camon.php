<?php
include('admincp/config/config.php'); 


    if(isset($_GET['vnp_Amount'])){
        $vnp_Amount = $_GET['vnp_Amount']; 
        $vnp_BankCode = $_GET['vnp_BankCode']; 
        $vnp_BankTranNo = $_GET['vnp_BankTranNo']; 
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $code_cart = $_SESSION['vnp_code_art'];
//insert database vnpay
$insert_vnpay ="INSERT INTO tbl_vnpay (vnp_amount, code_cart, vnp_bankcode, vnp_banktranno, vnp_cardtype, vnp_orderinfo, vnp_paydate, vnp_tmncode,vnp_transaction_no) VALUE('".$vnp_Amount."','".$code_cart."','".$vnp_BankCode."','".$vnp_BankTranNo."','".$vnp_CardType."','".$vnp_OrderInfo."','".$vnp_PayDate."','".$vnp_TmnCode."','".$vnp_TransactionNo."')";


        $cart_query = mysqli_query($mysqli, $insert_vnpay);
            if($cart_query) {
        //insert gio hàng
                echo '<h3>Giao dịch thanh toán bằng VNPAY thành công</h3>';
                echo '<p>Vui lòng vào trang <a target="_blank" href="#">lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn</p>';
            }else{
                echo 'Giao dịch thất bại';
                }
        }
?>
<p>Cám ơn bạn đã mua hàng,chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất</p>
