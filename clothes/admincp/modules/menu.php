<div class="sidebar1">
    <div class="sanpham">
                
</div>
    <div class="sanpham">
                    <a >Quản lý sản phẩm</a>
                    <div class="sanpham1">
                        <a href="index.php?action=quanlymenu&query=them">Thêm menu</a>
                        <a href="index.php?action=quanlysp&query=them">Thêm sản phẩm</a>
                        <a href="index.php?action=quanlysp&query=lieke">Danh sách sản phẩm</a>
                    </div>
                </div>
    <a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
    <?php
        if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
            unset($_SESSION['dangnhap']);
            header('Location:../index.php');
        }
    ?>
    <?php


 ?>
   
    <div class="sanpham">
        <a >Quản lý chính sách</a>
        <div class="sanpham1">
            <a href="index.php?action=quanlytenchinhsach&query=them">Quản lý tên chính sách</a>
            <a href="index.php?action=quanlychinhsach&query=them">Thêm chính sách</a>
            <a href="index.php?action=quanlychinhsach&query=lietke">Danh sách chính sách</a>
        </div>
    </div>
    <div class="sanpham">
        <a >Quản lý trang chủ</a>
        <div class="sanpham1">
            <a href="index.php?action=quanlylienhe&query=them">Thêm liên hệ</a>
            <a href="index.php?action=quanlychinhanh&query=them">Thêm chi nhánh</a>
            <a href="index.php?action=anhtrangbia&query=them">Ảnh trang bìa</a>
        </div>
    </div>
        
    <div class="sanpham">
            <a  href="index.php?action=quanlythanhvien&query=lietke">Quản lý thành viên</a>
    </div>
    <?php 

?>


    <div class="sanpham">
        <a >Quản lý trang chủ</a>
        <div class="sanpham1">
            <a href="index.php?action=quanlylienhe&query=them">Thêm liên hệ</a>
            <a href="index.php?action=quanlychinhanh&query=them">Thêm chi nhánh</a>
            <a href="index.php?action=anhtrangbia&query=them">Ảnh trang bìa</a>
        </div>
    </div>
 
    <?php 


?>



    <p><a href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
		echo $_SESSION['dangnhap'];

	} ?></a></p>
</div>
