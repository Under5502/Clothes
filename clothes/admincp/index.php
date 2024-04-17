<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Under</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<?php
 session_start();

?>
<body>
        <?php
            include('./modules/header.php');
        ?>
    <div class="main">
        <div class="sidebar">
            <?php
                include('./modules/menu.php');
            ?>
        </div>
            <?php
                include('./config/config.php');
                include('./modules/main.php');
            ?> 
    </div>
    </div>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 <script>
		CKEDITOR.replace('thongtinlienhe');
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
    </script>
    <script type="text/javascript">
   	$(document).ready(function(){
   		thongke();
	    var char = new Morris.Area({
		
		  element: 'chart',
		
		  xkey: 'date',
		 
		  ykeys: ['date','donhang','doanhthu','gianhap','soluong','loinhuan'],
		
		  labels: ['time','Đơn hàng','doanh thu','Giá nhập','Số lượng đã bán','Lợi Nhuận']
		});

	
    </script>
    <?php
        include('./modules/footer.php');
    ?>  

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'tomtat' );
            CKEDITOR.replace( 'noidung' );
    </script>
</html>