<?php 
    if(isset($_POST['sua'])) {
        $tenkhachhang = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $dienthoai = $_POST['dienthoai'];
        $email = $_POST['email'];
        $matkhau = md5($_POST['matkhau']);
        //phương thức post Nói một cách đơn giản, phương pháp này chuyển tất cả 
        //thông tin liên quan của đầu vào biểu mẫu ngay lập tức sau khi yêu cầu tới URL được thực hiện.

        $sql_update = "UPDATE tbl_khackhang SET tenkhachhang='".$tenkhachhang."',diachi='".$diachi."',
        dienthoai='".$dienthoai."',email='".$email."',matkhau='".$matkhau."' WHERE id_khachhang='$_GET[id]'";
        //cập nhật dữ liệu khi sửa tài khoản lên mysql
        mysqli_query($mysqli,$sql_update);
        header('location:./index.php');
        //đường dẫn khi sửa xong nhấn vào update
    }

?>
<?php
    $sql_sua_cs = "SELECT * FROM tbl_khackhang WHERE tbl_khackhang.id_khachhang = '$_GET[id]'  LIMIT 1";
    //gọi id khách hàng từ bảng khách hàng khi sửa xong sẽ lên ô đầu tiên
    $query_sua_cs = mysqli_query($mysqli,$sql_sua_cs);
    while($row = mysqli_fetch_array($query_sua_cs)){
?>
<form action="#" method="POST" > 
    <div class="login-dkdn">
        <h2>Sửa thông tin tài khoản </h2>
        <input type="text" placeholder="<?php echo $row['tenkhachhang'] ?>" name="hoten" ><br>
        <input type="text" placeholder="<?php echo $row['diachi'] ?>" name="diachi" ><br>
        <input type="text" placeholder="<?php echo $row['dienthoai'] ?>" name="dienthoai"><br>
        <input type="text" placeholder="<?php echo $row['email'] ?>" name="email"><br>
        <input type="password" placeholder="<?php echo $row['matkhau'] ?>" name="matkhau"><br>
        <button name="sua" >Sửa</button>
        <div  ><a href="./index.php"><p > ←  Quay lại trang chủ</p> </a></div>
    </div>
</form>
<?php }
//các button vs các khung để có thể nhập dữ liệu vào
?>
