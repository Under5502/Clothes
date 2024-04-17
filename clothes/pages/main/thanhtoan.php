<?php

    session_start();
	include('../../admincp/config/config.php');
	//đường dẫn kết nối vs sql
	$id_khachhang = $_SESSION['id_khachhang'];
	//lấy từ id khách hàng trong sql
	$code_order = rand(0,9999); 
	$updata_time = date('Y-m-d H:i:s');
	//update ngày theo ngày mình đặt hàng
	$insert_cart = "INSERT INTO tbl_giohang(id_khachhang,code_cart,cart_status,stime)
	 VALUE('".$id_khachhang."','".$code_order."',1,'".$updata_time."')"; 
	 //thêm vào 1 hàng khi đặt hàng
	$cart_query = mysqli_query($mysqli,$insert_cart); 
	//truy vấn từ sql đến giỏ hàng
	if($cart_query){
	
		foreach($_SESSION['cart'] as $key => $value){   
			
			$id_sanpham = $value['id'];
			$soluong = $value['soluong'];
			//gọi id sản phẩm vs số lượng với các giá trị
			
				$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
				VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
				mysqli_query($mysqli,$insert_order_details);

				//khi thêm sản phẩm sẽ gọi từ bảng giỏ hàng đến code(trong sql)
		}
	}
	unset($_SESSION['cart']);
	header('Location:../../index.php?quanly=ketqua');
	//đường dẫn khi nhấn vào giỏ hàng
?>