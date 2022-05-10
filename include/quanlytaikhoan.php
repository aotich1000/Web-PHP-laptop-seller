<div class="flex-container">
<div class="left-menu">
    <ul>
        
        <li>
            <img src="images/icon-user.png" alt="icon"> <?php echo $_SESSION['user']['hoten'] ?>
        </li>
        <li>
            <button>
            <a href="index.php?id=quanlytaikhoan&action=showtttk">
            Thông tin tài khoản
                </a></button>
        </li>
        <li>
            <button>
        <a href="index.php?id=quanlytaikhoan&action=showhoadon">
            Hóa đơn đã mua
        </a></button>
        </li>
    </ul>
</div>

<?php 
        if(isset($_GET['trangthai'])){
            $trangthai = $_GET['trangthai'];
            if($trangthai == 'suatk'){
                ?> <script type="text/javascript">
                alert("Thao tác thành công!");

                // location.href = 'signin.php';
                </script> <?php 
                $idus = $_SESSION['user']['id_user'];
                $sql = mysqli_query($con,"SELECT * FROM tbl_user Where id_user = $idus");
                $data = mysqli_fetch_assoc($sql); 
                
                $_SESSION['user'] = $data;

            }
            if($trangthai == 'saipass'){
                ?> 
                <script type="text/javascript"> 
                    alert("Sai mật khẩu cũ! Mời thao tác lại");
                    location.href = 'index.php?id=quanlytaikhoan&action=repass';
                </script>
                <?php
            }if($trangthai =='sairepass'){
                ?> 
                <script type="text/javascript"> 
                    alert("Mật khẩu nhập lại sai! Mời thao tác lại");
                    location.href = 'index.php?id=quanlytaikhoan&action=repass';
                </script>
                <?php
            }if($trangthai == 'huythanhcong'){
                ?>
                <script type="text/javascript"> 
                    alert("Bạn đã hủy đơn hàng thành công!");
                    location.href = 'index.php?id=quanlytaikhoan&action=showhoadon';
                </script>
                <?php 
            }
        }
        $actionql = (isset($_GET['action'])) ? $_GET['action'] : 'showtttk';
        if($actionql == 'showtttk'){
?>


<div class="thong-tin-tk">
    <div class="title-user"><h3>Thông tin tài khoản</h3></div>
    <div>
    <ul>
        <li><label for="#">Họ và tên:  <?php echo $_SESSION['user']['hoten']?></label></li>
        <li><label for="#">Tên tài khoản:  <?php echo $_SESSION['user']['user_name']?></label></li>
        <li><label for="#">Email:  <?php echo $_SESSION['user']['email']?></label></li>
        <li><label for="#">SDT:  <?php echo $_SESSION['user']['sdt']?></label>
        </li>
    </ul>
        <button><a href="index.php?id=quanlytaikhoan&action=suatttk">Chỉnh sửa thông tin</a></button>
        <button><a href="index.php?id=quanlytaikhoan&action=repass">Đặt lại mật khẩu</a></button>
    </div>    
</div>

<?php } ?>

<?php 
if($actionql =='suatttk'){
                        ?>
                    <div class="thong-tin-tk">
                    <h3>Sửa thông tin tài khoản</h3>
                    <form action="xuli-user.php?action=suattk&id-user=<?php echo $_SESSION['user']['id_user']?>" method="POST">
                            <label for="hoten">Họ và tên:</label><br>
                            <input type="text" name="hoten" id="hoten" value="<?php echo $_SESSION['user']['hoten']?>"> <br>
                            <label for="email">Email:</label><br>
                            <input type="text" name="email" id="email" value="<?php echo $_SESSION['user']['email']?>"><br>
                            <label for="sdt"> SDT:</label><br>
                            <input type="text" name="sdt" id="sdt" value="<?php echo $_SESSION['user']['sdt']?>"><br>
                            
                            <div class="flex-button">
                            <button type="submit">Thực hiện</button>
                    </form>
                        <button type="button"> <a href="index.php?id=quanlytaikhoan"> Trở lại </a></button>
                   </div> 
                   
                   
                </div>
                    <?php }

                    if ($actionql == 'repass'){ ?>
                    <div class="thong-tin-tk">
                    <h3>Đặt lại mật khẩu</h3>
                    <form action="xuli-user.php?action=repass&id-user=<?php echo $_SESSION['user']['id_user']?>" method="POST">
                            <label for="oldlpassword">Mật khẩu cũ:</label> <br>
                            <input type="password" name="oldlpassword" id="oldlpassword"><br>
                            <label for="newpassword">Mật khẩu mới</label><br>
                            <input type="password" name="newpassword" id="newpassword"><br>
                            <label for="renewpasswor">Nhập lại mật khẩu</label><br>
                            <input type="password" name="renewpassword" id="renewpassword"><br>
                            <div class="flex-button">
                            <button type="submit" >Thực hiện</button>
                    </form>
                    <button type="button" ><a href="index.php?id=quanlytaikhoan"> Trở lại </a></button>
                    </div>
                    </div>
                </div>
                <?php }?>

<?php 
    if($actionql == 'showhoadon'){
        $idkh = $_SESSION['user']['id_user'];
        $sql_hd_o = "SELECT * FROM tbl_hoadon WHERE id_user = $idkh ORDER BY id_hoadon DESC";
        $queryhd_o = mysqli_query($con,$sql_hd_o);
        $i = 1;
        $limit_pg = 20;
        $row = mysqli_num_rows($queryhd_o);
        $page = ceil($row / $limit_pg);
        if(isset($_GET['page'])){
            $pg = $_GET['page'];
            }else{
        $pg = 1;
        }
            $start = ($pg - 1)*$limit_pg;
        $sql_hd = "SELECT * FROM tbl_hoadon WHERE id_user = $idkh ORDER BY id_hoadon DESC LIMIT $start,$limit_pg";
        $queryhd = mysqli_query($con,$sql_hd);
        
        ?>

            <div class="thong-tin-tk">
                <div class="tittle-user">
                    <h3>Hóa đơn đã mua</h3>
                </div>
                <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Hóa đơn ngày</th>
                            <th scope="col">Sản phẩm mua</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_GET['page'])){
                            $pg = $_GET['page'];
                            if($pg == 1){ $i = 1;}
                            if($pg >= 2){$i =  ($pg+20)*1+1;}
                             
                        }else $i = 1;
                        while($data3 = mysqli_fetch_assoc($queryhd)){  ?>
                        <tr>
                        <th scope="row"><?php echo $i; $i++;?></th>
                        <td><?php echo date_format(date_create($data3['time']),"d/m/Y H:i:s") ?></td>
                        <td><?php 
                            $idhd3 = $data3['id_hoadon'];
                             $sql_cthd = "SELECT * FROM tbl_chitiethoadon,tbl_sanpham WHERE tbl_chitiethoadon.id_sanpham = tbl_sanpham.id_sanpham AND tbl_chitiethoadon.id_hoadon = $idhd3";
                             $querycthd = mysqli_query($con,$sql_cthd);
                             while($data4 = mysqli_fetch_assoc($querycthd)){
                                 echo $data4['ten_sanpham']; ?> <br> <?php
                             }
                        
                        ?></td>
                        <td><?php echo number_format($data3['tong_tien']) ?> đ</td>
                        <td><?php echo $data3['trangthai']?></td>
                        <td>
                            <button><a href="index.php?id=quanlytaikhoan&action=chitiethoadon&&idhd=<?php echo $data3['id_hoadon'] ?>"> Chi tiết </a></button> 
                            <?php if($data3['trangthai'] == 'Chưa xử lí'){
                                if($data3['trangthai'] != "Đã hủy"){?>       
                             <button><a href="" id="xoahd" onclick="XoaHD(<?php echo $data3['id_hoadon']?>)">Hủy đơn hàng</a></button>
                            <?php }}?>

                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>


            </div>
            </div>
         <div class="pagi">
        <ul class="pagination justify-content-center">
        <?php
        for ($i=1; $i <= $page; $i++) { if($pg == $i){
                ?>
                 <li class="page-item active"><a href="index.php?id=quanlytaikhoan&action=showhoadon&page=<?php echo $i?>" class="page-link"> <?php echo $i ?></a></li>
            <?php }else{
                ?>
                <li class="page-item"><a href="index.php?id=quanlytaikhoan&action=showhoadon&page=<?php echo $i?>" class="page-link"> <?php echo $i ?></a></li>
                <?php
            }}
            ?>
        </ul>
         </div>
    <?php }?>

<?php 
if($actionql == 'chitiethoadon'){?>
<?php 
    $idhd = $_GET['idhd'];
    $sql_hd = "SELECT * FROM tbl_hoadon WHERE id_hoadon = $idhd";
    $queryhd = mysqli_query($con,$sql_hd);
?>
<div class="thong-tin-tk">
    <div class="title"><h3>Hóa đơn đã mua</h3></div>
    <?php while($hd = mysqli_fetch_assoc($queryhd)){  ?>
    <div class="Hoa-don">
        <h4>Thông tin hóa đơn ngày <?php echo $hd['date']?></h4>
        <ul>
            <li>Địa chỉ: <?php echo $hd['diachi']?></li>
            <li>Số điện thoại: <?php echo $hd['sdt']?></li>
            <li>Phương thức thanh toán: <?php echo $hd['pptt']?></li>
            <li>Trạng thái: <?php echo $hd['trangthai']?></li>
            <li>Tổng hóa đơn: <?php echo number_format($hd['tong_tien'])?>đ</li>
            <?php if($hd['trangthai'] == 'Chưa xử lí'){
                if($hd['trangthai'] != "Đã hủy"){?>       
                <li> <button> <a href="" id="xoahd" onclick="XoaHD(<?php echo $hd['id_hoadon']?>)">Hủy đơn hàng</a></button>
                     <button> <a href="index.php?id=quanlytaikhoan&action=showhoadon"> Trở lại</a></button>   
            </li>
        <?php }}?>
            
        </ul>
        <?php   
                // $idhd = $hd['id_hoadon'];
                $sql_chd = "SELECT * FROM tbl_chitiethoadon,tbl_sanpham WHERE tbl_chitiethoadon.id_sanpham = tbl_sanpham.id_sanpham AND tbl_chitiethoadon.id_hoadon = $idhd";
                $querychd = mysqli_query($con,$sql_chd);
        ?>
        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Thanh Tiền</th>
                </tr>
                </thead>
                <?php 
                $i = 1;
                 while($abc = mysqli_fetch_assoc($querychd)){ 
                ?>
                    <tr>
                        <th><?php echo $i?></th>
                    <th><img src="./images/<?php echo $abc['images']?>" alt=""></th>
                    <th><?php echo $abc['ten_sanpham']?></th>
                    <form action="cart.php" method="GET">
                    <th><?php echo $abc['soluongsp']?>
                    </th>
                    <th><?php echo number_format($abc['gia'])?> đ</th>
                    <th><?php echo number_format($bill = $abc['gia'] * $abc['soluongsp']);?> đ</th>
                </tr>
                <?php $i++;}?>
            </table>
</div>
</div>
</div>
<?php }}
?>

