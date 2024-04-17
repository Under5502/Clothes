<div>
<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang']; 
    }else{
        $page =1;    //page auto ở trang thứ nhất
    }if($page == '' || $page == 1){   // khi trang 1 hoặc ko có số trang thì begin = 0
        $begin = 0;                     
    }else{
        $begin = ($page*2)-2;   // khi số khác thì lấy số trang nhân với 2 và trừ đi 2 sản phẩn trang trước vd đang lấy là mỗi trang 10 sp
    }

  
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE km>0 ORDER BY km DESC LIMIT $begin,10";
    //lấy số sp trong trang = 10
    $query_pro = mysqli_query($mysqli,$sql_pro);
    //gọi sql 

?>

        <div class="headline">
                <h3>Khuyến Mãi</h3>
        </div>
        <div class="home-sort">
            <span class="filter-sort">Trang: <?php echo $page ?></span>
   
                
            </div>
        </div>
        <div class="maincontent">
             
            <?php
                $giaspkm=0;
                    while($row_pro = mysqli_fetch_array($query_pro)){
                        if ($row_pro['km']>0){$giaspkm=$row_pro['giasp']-($row_pro['giasp']*($row_pro['km']/100));};
                        //nếu giá km > 0 thì giá khuyến mãi được tính bằng cách lấy giá sản phẩm hiện tại trừ đi khoản giảm giá tương ứng
            ?>
                
                <ul>
                <div class="maincontent-item">
                        <div class="maincontent-top">

                            <?php 
                                if($row_pro['km']==0){

                                }else{
                            ?>
                                    <div class="khuyenmai"><?php echo number_format($row_pro['km']).'%' ?></div>
                            <?php  
                                }
                                //Đoạn mã trên kiểm tra xem sản phẩm hiện tại có áp dụng chương trình khuyến mãi hay không. 
                                //Nếu giá khuyến mãi (`km`) của sản phẩm này bằng 0, thì không có gì được hiển thị.
                                //còn nếu có thì sẽ hieenbr thị 
                            ?>
                            <div class="maiconten-top1">
                                
                                <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-img">
                                 <!--link hiển thị trên web sẽ là như thế này -->
                                    <img src="./admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">                                    
                                </a>
                                 <!-- chi tiết hình ảnh sản phẩm tải lên từ sql -->
                                <button type  ="submit" title = 'chi tiet' class="muangay"  name="chitiet">
                                     <!--các button cho các chức năng  -->
                                    <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>">Chi tiết</a></button>
                                     <!--xem chi tiết sản phẩm từ sql gọi lên từ id sản phẩm (button) -->
                                <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?>">
                                  <!--sử dụng pt post thêm vào giỏ hàng gọi từ id sản phẩm trong sql  -->
                                <button type  = "submit" title = 'thêm vào giỏ' name="themgiohang" class="giohang"><a >thêm vào giỏ</a></button>
                                  <!--các button cho các chức năng  -->
                                </form>
                            </div>
                        </div>
                        <div class="maincontent-info">
                            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" 
                            class="maincontent-name"><?php echo $row_pro['tensanpham'] ?></a>
                              <!--hiện các sản phẩm lấy từ id sản phẩm trong sql -->
                            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" 
                            class="maincontent-gia"><?php if($row_pro['km']>0){ echo number_format($giaspkm).'vnd'; 
                            }else {echo number_format($row_pro['giasp']).'vnd';} ?>
                               <!--hiện giá sản phẩm lấy từ id sản phẩm trong sql -->
                                            <span><?php if($row_pro['km']>0){
                                                    echo number_format($row_pro['giasp']).'vnd';
                                                    }else{

                                                    }
                                              
                                                    ?>                                                                                                                                                                                                        
                                            </span></a>
                        </div>
                    </div>
                </ul>
            <?php
                }
            ?>
            
        </div>
        <div class="content-paging">
            <?php   
                $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE km>0"); 
                 // lấy tất cả dữ liệu sản phẩm từ tbl sản phẩm điêu kiện có id danh mục  trùng với id danh mục trong tbl sản phẩm
                $row_count = mysqli_num_rows($sql_trang);
                $trang = ceil($row_count/2);
                //chia cho 2 này là lấy ví dụ mỗi trang có 10 sản phẩm
                // echo $trang;
            ?>
            <div class="filter-page">
               
                <?php
                    for($i=1;$i<=$trang;$i++){
                        //só trang tự dộng tăng
                ?>
                <a <?php if($i==$page){echo 'style="color: red;background-color: #ccc;"';}else{'';} ?> href="index.php?quanly=sale&trang=<?php echo $i ?>" class="filter-page-number"><?php echo $i ?></a>
                 <!-- kia là điều kiện nếu bấm vào trang nào thì trang đó có css như kia còn không là rỗng còn kia là đường link điều kiện -->
                <?php
                    }
                ?>
               
            </div>
        </div>