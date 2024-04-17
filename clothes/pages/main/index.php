
                <div class="main-slider">
                        <?php
                            $sql_anhtrangbia = "SELECT * FROM tbl_anhtrangbia WHERE tinhtrang=1";
                            //ảnh trabg bìa tình trạng 1 là hoạt động nếu chọn 2 là ẩn
                            $query_anhtrangbia = mysqli_query($mysqli,$sql_anhtrangbia);
                            //lấy ảnh trang bìa từ sql
                            while($row_anhtrangbia = mysqli_fetch_array($query_anhtrangbia)){
                        ?>  
                        <a href="#"><img class="mySlider" src="./admincp/modules/anhtrangbia/uploads/<?php echo $row_anhtrangbia['hinhanh'] ?>" 
                        height = auto width = 100%></a>
                         <!--đường dẫn lấy ảnh -->
              
                        <?php } ?>
                    </div>
                    <script>
                        var myIndex = 0;
                        carousel();
                        //Cho `myIndex` bằng 0, 
                        //biến này được sử dụng để chỉ định hiển thị slide hiện tại. Hàm `carousel()` 
                        //được định nghĩa để chuyển đổi giữa các slide
                        function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlider");
                        for (i = 0; i < x.length; i++) {
                          x[i].style.display = "none";  
                        }
                        //Trong hàm `carousel()`, biến `x` lưu trữ các đối tượng có class là "mySlider".
                        // Sau đó, vòng lặp for được sử dụng để thiết lập tất cả các phần tử "mySlider" để hiển thị ẩn đi.
                        myIndex++;
                        //Sau đó, trong khi biến `myIndex` tăng dần đến khi nó vượt quá số lượng slide, 
                        //nó sẽ được thiết lập trở lại bằng 1 và chỉ định hiển thị slide đầu tiên.
                        if (myIndex > x.length) {myIndex = 1}    
                        x[myIndex-1].style.display = "block";  
                        setTimeout(carousel, 2000); 
                        //sau 2 giây sẽ chuyển slide
                        }
                    </script>
                    <div class="main-content">
                    
                        <div class="content-section">
                            <h2 class="phuonganhheader">Quần Áo Mới</h2>
                            <a href="index.php?quanly=shopall"  class="section-sub-heading">Xem Thêm</a>
                           
                            <div class="maincontent">
                                <?php
                                    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tinhtrang=1 LIMIT 12 ";
                                    //truy vấn từ bảng sản phẩm nếu như tinh trang = 1(còn sản phẩm)
                                    $query_pro = mysqli_query($mysqli,$sql_pro);
                                    //lấy dữ liệu sql
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
                                            
                                            <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>"
                                             class="maincontent-img">
                                                <img src="./admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                                            </a>
                                            <!-- upload hình ảnh vào foder upload từ sql--->
                                            <button type  ="submit" title = 'chi tiet' class="muangay" 
                                             name="chitiet"><a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] 
                                             ?>">Chi tiết</a></button>
                                               
                                            <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php 
                                            echo $row_pro['id_sanpham'] ?>">
                                            <button type  = "submit" title = 'thêm vào giỏ' name="themgiohang" class="giohang">
                                                <a >thêm vào giỏ</a></button>
                                                  <!-- lấy chi tiết sp từ hàm id sản phẩm--->
                                            </form>
                                        </div>
                                    </div>
                                    <div class="maincontent-info">
                                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-name"><?php echo $row_pro['tensanpham'] ?></a>
                                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-gia"><?php if($row_pro['km']>0){ echo number_format($giaspkm).'vnd'; }else {echo number_format($row_pro['giasp']).'vnd';} ?>
                                                        <span><?php if($row_pro['km']>0){
                                                                echo number_format($row_pro['giasp']).'vnd';
                                                                //giá sp = vnd
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
                           
                        </div>
                    </div>
                  