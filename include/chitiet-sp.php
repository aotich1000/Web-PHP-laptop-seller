<?php  $id_sp = $_GET['sp'];
           $sql_chitietsp = "SELECT * FROM tbl_sanpham,tbl_phanloaisp WHERE tbl_sanpham.loaisp = tbl_phanloaisp.id_loaisp AND tbl_sanpham.id_sanpham = '$id_sp'";
           $query = mysqli_query($con,$sql_chitietsp);
           $data = mysqli_fetch_assoc($query);
           $soluong = $data['soluong'];
        //    var_dump($data);
?>
            <div class="chitiet-sp">
            <form action="cart.php" method="GET">
                <div class="sp-anh">
                    <img src="images/<?php echo $data['images']?>" alt="#">
                </div>        
                <div class="container-sp">
                    <div class="title-sp">
                        <h3><?php echo $data['ten_sanpham']?> </h3>
                    </div> 
                    <div class="content">
                        <div class="mota">
                            Mô tả sản phẩm:
                            <?php echo $data['mota']?>
                        </div>
                        <div class="loaisp">
                            <b>Loại sản phẩm:</b> 
                            <?php echo $data['ten_loaisp']?>
                        </div>
                        <div class="gia">
                            <b>Giá:</b>
                        <?php echo number_format($data['gia'])?>
                            đ
                        </div>
                        <div class="soluong">
                        <b> Tình trạng hàng: </b>
                        <?php if($data['trangthai']==1){
                            echo "Còn hàng";
                            }else if($data['trangthai']==0){
                                echo "Hết hàng";
                            }?>
                        </div>
                        <div class="soluong">
                        <b> Số lượng hàng còn lại: </b>
                            <?php echo $data['soluong']?>
                        </div>
                    </div>
                    <div class="add-about">
                        <form action="cast.php" method="GET">

                        <div>
                            <label for="soluong">Số lượng hàng muốn đặt:</label>
                            <input type="number" id ="soluong" name="soluong" value="1" onchange = "return checksoluong(value,<?php echo $data['soluong'];?>)">
                            <input type="hidden" name="id" value="<?php echo $data['id_sanpham']?>">
                            <input type="hidden" name="action" id="action" value="add">
                        </div>
                    </div>
                    <div class="add-cart">
                        <div>
                            
                            <button type="submit">+ Thêm vào giỏ hàng</button>

                        </div>
                    </div>
                    <div class="add-cart-now">
                    
                        <button type="submit" onclick = "return addnow()"> Mua ngay </button>
                    </div>
                </form>
                </div>
            </div>
            

            
