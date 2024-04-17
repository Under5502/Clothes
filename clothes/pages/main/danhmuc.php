
<div>


<?php
    if(isset($_GET['trang'])){ 
        $page = $_GET['trang']; //page auto ở trang thứ nhất
    }else{
        $page =1;    
    }if($page == '' || $page == 1){     
        $begin = 0; // khi trang 1 hoặc ko có số trang thì begin = 0
    }else{
        $begin = ($page*2)-2;   // khi số khác thì lấy số trang nhân với 2 và trừ đi 2 sản phẩn trang trước vd đang lấy là mỗi trang 15 sp

    }
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' AND tinhtrang=1
     ORDER BY id_sanpham DESC LIMIT $begin,15"; 
      //gọi sql từ danh mục lấy từ table sản phẩm lấy số sp trong trang = 10
    $query_pro = mysqli_query($mysqli,$sql_pro);
    //get ten danh muc
    $sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1"; 
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
    
?>

        <div class="headline">
                <h3><?php echo $row_title['tendanhmuc'] ?></h3>
                <!--lấy tên danh mục từ sql -->
        </div>
        <div class="home-sort">
            <span class="filter-sort">Trang: <?php echo $page ?></span>
                <!--số trang -->
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
                              //Đoạn mã trên kiểm tra xem sản phẩm hiện tại có áp dụng chương trình khuyến mãi hay không. 
                                //Nếu giá khuyến mãi (`km`) của sản phẩm này bằng 0, thì không có gì được hiển thị.
                                //còn nếu có thì sẽ hieenbr thị 
                                }
                            ?>
                            <div class="maiconten-top1">
                                
                                <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-img">
                                    <img src="./admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                                </a>
                                <button type  ="submit" title = 'chi tiet' class="muangay"  name="chitiet">
                                    <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>">Chi tiết</a></button>
                                          <!-- chi tiết hình ảnh sản phẩm tải lên từ sql -->
                                <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?>">
                                <button type  = "submit" title = 'thêm vào giỏ' name="themgiohang" class="giohang"><a >thêm vào giỏ</a></button>
                                </form>
                                      <!--giỏ hàng lấy từ id sản phẩm  -->
                            </div>
                        </div>
                        <div class="maincontent-info">
                            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" 
                            class="maincontent-name"><?php echo $row_pro['tensanpham'] ?></a>

                            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-gia"><?php if($row_pro['km']>0){ echo number_format($giaspkm).'vnd'; }else {echo number_format($row_pro['giasp']).'vnd';} ?>
                                            <span><?php if($row_pro['km']>0){
                                                    echo number_format($row_pro['giasp']).'vnd';
                                                    }else{
                                                            
                                                    }
                                                    
                                                    ?>              
                                                        <!--hiện giá sản phẩm lấy từ id sản phẩm trong sql -->                                                                                                                                                                                          
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
                $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]'");
                      //đoạn này dùng để phân trang cho danh mục lấy từ get id
                $row_count = mysqli_num_rows($sql_trang);
                      //lấy tổng số lượng sp
                $trang = ceil($row_count/2);
                //chia tổng số lượng sản phẩm được hiển thị trên mỗi trang
            ?>
            <div class="filter-page">
                
                <?php
                    for($i=1;$i<=$trang;$i++){
                ?>
                <a <?php if($i==$page){echo 'style="color: red;background-color: #ccc;"';}else{'';} ?> 
                href="index.php?quanly=danhmuc&id=<?php echo $_GET['id']?>&trang=<?php echo $i ?>"
                class="filter-page-number"><?php echo $i ?></a>
                
                <?php
                    }
                ?>
             
            </div>
        </div>