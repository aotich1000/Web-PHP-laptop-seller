<?php
if (!isset($_SESSION['num'])) {
    $_SESSION['num'] = 0;
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'show';
}
$limit_pg = 12;
if (isset($_GET["datefrom"]) && isset($_GET["dateto"])) {
    $datefrom = $_GET["datefrom"];
    $dateto = $_GET["dateto"];
    $sql = "SELECT * FROM tbl_phieunhap AND tbl_phieunhap.ngaynhap BETWEEN '" . $datefrom . "' AND '" . $dateto . "' ORDER BY tbl_phieunhap.ngaynhap DESC";
} else if (isset($_POST["datefrom"]) && isset($_POST["dateto"])) {
    $datefrom = $_POST["datefrom"];
    $dateto = $_POST["dateto"];
    $sql = "SELECT * FROM tbl_phieunhap AND tbl_phieunhap.ngaynhap BETWEEN '" . $datefrom . "' AND '" . $dateto . "' ORDER BY tbl_phieunhap.ngaynhap DESC";
} else {
    $sql = "SELECT * FROM tbl_phieunhap ORDER BY tbl_phieunhap.ngaynhap DESC";
}
if ($action == 'show') {
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    $page = ceil($row / $limit_pg);
    if (isset($_GET['page'])) {
        $pg = $_GET['page'];
    } else {
        $pg = 1;
    }
    $start = ($pg - 1) * $limit_pg;
    $sql = $sql . " LIMIT $start,$limit_pg";
    $query = mysqli_query($con, $sql);
}
if ($action == 'xemchitiet') {
    if (isset($_GET['idnhaphang'])) {
        $idnhaphang = $_GET['idnhaphang'];
        $sql="SELECT * FROM tbl_chitietphieunhap WHERE id_phieunhap = 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_num_rows($query);
        $page = ceil($row / $limit_pg);
        if (isset($_GET['page'])) {
            $pg = $_GET['page'];
        } else {
            $pg = 1;
        }
        $start = ($pg - 1) * $limit_pg;
        $sql = $sql . " LIMIT $start,$limit_pg";
        $query = mysqli_query($con, $sql);
    } else {
        header("location:index.php?id=quanlynhaphang");
    }
}
if ($action == 'xoa') {
    $id = $_GET['idnhaphang'];
    $sql = "DELETE FROM `tbl_chitietphieunhap` WHERE id_phieunhap = " . $id;
    $query = mysqli_query($con, $sql);
    $sql = "DELETE FROM `tbl_phieunhap` WHERE id_phieunhap = " . $id;
    $query = mysqli_query($con, $sql);
    $_SESSION['num']--;
?>
    <script>
        alert("Thao tác thành công");
        location.href = "index.php?id=quanlynhaphang";
    </script>
    <?php
}
if ($action == 'thempn') {
    $sql_id = "SELECT id_phieunhap FROM tbl_phieunhap ORDER BY id_phieunhap DESC LIMIT 1";
    $query = mysqli_query($con, $sql_id);
    $new_id = mysqli_fetch_assoc($query)["id_phieunhap"] + 1;
    $sql_ncc = "SELECT * FROM tbl_nhacungcap";
    $query = mysqli_query($con, $sql_ncc);
    while ($row = mysqli_fetch_array($query)) {
        $id_nhacungcap[] = $row["id_nhacungcap"];
        $ten_ncc[] = $row["tenncc"];
    }
    $sql_sp = "SELECT id_sanpham, ten_sanpham, gia FROM `tbl_sanpham`";
    $query = mysqli_query($con, $sql_sp);
    while ($row = mysqli_fetch_array($query)) {
        $id_sanpham[] = $row["id_sanpham"];
        $ten_sanpham[] = $row["ten_sanpham"];
        $sanpham[] = $row["id_sanpham"] . ". " . $row["ten_sanpham"];
        $gia[] = $row["gia"];
    }
}

if (isset($_GET['trangthai'])) {
    $trangthai = $_GET['trangthai'];
    if ($trangthai == 'thanhcong') {
    ?>
        <script>
            alert("Thao tác thành công");
            location.href = "index.php?id=quanlynhaphang";
        </script>
    <?php
    } ?>
    <?php
    if ($trangthai == 'thempnthatbai') {
    ?>
        <script>
            //alert("Thêm thất bại");
            location.href = "index.php?id=quanlynhaphang&action=thempn";
        </script>
    <?php
    }
    if ($trangthai == 'thempnthanhcong') {
    ?>
        <script>
            //alert("Thao tác thành công");
            location.href = "index.php?id=quanlynhaphang&action=thempn";
        </script>
<?php
    }
}
if (isset($_GET['xoa'])) {
    unset($_SESSION['phieunhap'][$_GET['xoa']]);
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Quản lý nhập hàng</h1>
    <?php if ($action == 'show') { ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Xem hóa đơn trong khoảng:
                <form action="index.php?" class="form" method="POST">
                    <input type="input" hidden="true" class="form-control" name="id" value="quanlynhaphang">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="datefrom">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="datefrom" value=<?php if (isset($_POST["datefrom"]) || isset($_GET["datefrom"])) echo $datefrom; ?>>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="dateto">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="dateto" value=<?php if (isset($_POST["dateto"]) || isset($_GET["dateto"])) echo $dateto; ?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID hóa đơn</th>
                                <th>Ngày nhập</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_phieunhap'] ?></td>
                                    <td><?php echo $data['ngaynhap'] ?></td>
                                    <td><?php echo $data['soluong'] ?></td>
                                    <td><?php echo number_format($data['tongtien']) ?>đ</td>
                                    <td><?php echo $data['trangthai'] ?></td>
                                    <td>
                                        <?php
                                        echo '<a href="index.php?id=quanlynhaphang&action=xemchitiet&&idnhaphang=' . $data["id_phieunhap"] . '" class="btn btn-success" style="margin-right:5px"> Xem chi tiết</a>';
                                        for ($i = 0; $i < count($quyenquanlyhoadon); $i++) {
                                            if ($quyenquanlyhoadon[$i] == 'xuli') {
                                                switch ($data["trangthai"]) {
                                                    case 'Chưa nhận hàng. Chưa thanh toán':
                                                        echo '<a href="index.php?id=quanlynhaphang&action=xuli&&idnhaphang=' . $data["id_phieunhap"] . '" class="btn btn-warning" style="margin-right:5px"> Xử lí</a>';
                                                        echo '<a href="index.php?id=quanlynhaphang&action=xoa&&idnhaphang=' . $data["id_phieunhap"] . '" class="btn btn-danger" style="margin-right:5px"> Xóa</a>';
                                                        break;
                                                    case 'Đã nhận hàng. Đã thanh toán':
                                                        break;
                                                    default:
                                                        echo '<a href="index.php?id=quanlynhaphang&action=xuli&&idnhaphang=' . $data["id_phieunhap"] . ' " class="btn btn-warning" style="margin-right:5px"> Xử lí</a>';
                                                        break;
                                                }
                                            }
                                        } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $page; $i++) {
                                    if ($i == $pg) {
                                        $active = "active";
                                ?>
                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else {
                                    ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php?id=quanlynhaphang&action=thempn" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Thêm phiếu nhập mới</span>
        </a>
    <?php } ?>
    <?php if ($action == 'xemchitiet') { ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Xem hóa đơn số <?php echo $idnhaphang;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID sản phẩm</th>
                                <th>ID Nhà cung cấp</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_sanpham'] ?></td>
                                    <td><?php echo $data['id_ncc'] ?></td>
                                    <td><?php echo $data['soluong'] ?></td>
                                    <td><?php echo number_format($data['dongia']) ?>đ</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $page; $i++) {
                                    if ($i == $pg) {
                                        $active = "active";
                                ?>
                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else {
                                    ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php?id=quanlynhaphang" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Trở về</span>
        </a>
    <?php } ?>

    <?php
    if ($action == 'xuli') {
        $id_pn = $_GET['idnhaphang'];
        $sql_sua = "SELECT * FROM tbl_phieunhap WHERE id_phieunhap = $id_pn";
        $query_sua = mysqli_query($con, $sql_sua);
        $phieunhap = mysqli_fetch_assoc($query_sua);
        $tt = explode('.', $phieunhap['trangthai']);
    ?>
        <div class="col">
            <h3 class="row">Xử lí phiếu nhập</h3>
            <h4 class="row">Thông tin phiếu nhập ngày <?php echo $phieunhap['ngaynhap'] ?></h4>
            <div class="row">
                <ul class="list-group col-7">
                    <li class="list-group-item">ID phiếu nhập: <?php echo $phieunhap['id_phieunhap'] ?></li>
                    <li class="list-group-item">Ngày nhập: <?php echo $phieunhap['ngaynhap'] ?></li>
                    <li class="list-group-item">Trạng thái phiếu nhập: <?php echo $phieunhap['trangthai'] ?></li>
                    <li class="list-group-item">Tổng hóa đơn: <?php echo number_format($phieunhap['tongtien']) ?>đ</li>
                </ul>
            </div>
            <div class="row" style="margin-top: 10px;">
                <form class="form" action="xuli-nhaphang.php" method="POST" name="tdtrangthai" id="tdtrangthai">
                    <input type="hidden" value="<?php echo $phieunhap['id_phieunhap'] ?>" name="idphieunhap" id="idphieunhap">
                    <div class="form-group row">
                        <div class="col">

                            <select class="form-control" name="nhanhang" id="nhanhang">
                                <option value="Chưa nhận hàng" id="cnh" <?php if ($tt[0] == "Đã nhận hàng") echo "disabled";
                                                                        else echo "selected"; ?>>Chưa nhận hàng</option>
                                <option value="Đã nhận hàng" id="dnh" <?php if ($tt[0] == "Đã nhận hàng") echo "selected" ?>>Đã nhận hàng</option>
                            </select>
                        </div>
                        <div class="col">

                            <select class="form-control" name="thanhtoan" id="thanhtoan">
                                <option value="Chưa thanh toán" id="ctt" <?php if ($tt[1] == "Chưa thanh toán") echo "selected" ?>>Chưa thanh toán</option>
                                <option value="Đã thanh toán" id="dtt" <?php if ($tt[1] == "Đã thanh toán") echo "selected" ?>>Đã thanh toán</option>
                            </select>
                        </div>
                    </div>
                    <button class="form-group btn btn-success" name="tdtrangthai" type="submit">Xác nhận thay đổi</button>
                </form>
            </div>
            <button class="btn btn-primary" type="submit" onclick="window.history.back(-1)">Trở lại</button>
        </div>
    <?php } ?>
    <?php if ($action == 'thempn') { ?>
        <div class="row">
            <div class="col-6" style="display: flex;width: 600px;padding: 30px;margin: auto;border: solid 1px black;border-radius: 20px;">
                <form class="form" action="xuli-nhaphang.php" method="GET" name="themphieunhap" id="themphieunhap">
                    <legend> Form nhập hàng</legend>
                    <div class="form-group">
                        <label for="sanpham" class="form-label">Sản phẩm</label>
                        <input class="form-control" list="listsanpham" name="idsanpham" id="sanpham" placeholder="Tìm kiếm sản phẩm">
                        <datalist id="listsanpham" multiple="multiple">
                            <?php for ($i = 0; $i < sizeof($id_sanpham); $i++) {
                                echo '<option value="' . $sanpham[$i] . '" label="' . $i . '">';
                            } ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Nhacuncap">Nhà cung cấp</label>
                        <select class="form-control" name="id_ncc" aria-label="Nhacungcap">
                            <?php for ($i = 0; $i < sizeof($id_nhacungcap); $i++) {
                                echo '<option value="' . $id_nhacungcap[$i] . '">' . $ten_ncc[$i] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="soluong">Số lượng</label>
                        <input type="number" class="form-control" name="soluong" aria-label="soluong" value="0">
                        </input>
                    </div>
                    <button class="form-group btn btn-success" name="thempn" value="<?php echo $new_id; ?>" type="submit">Thêm</button>
                </form>
            </div>

            <div class="col-6">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['phieunhap'])) {
                            foreach ($_SESSION['phieunhap'] as $id => $value) {
                        ?>
                                <tr>
                                    <td><?php echo $_SESSION['phieunhap'][$id]['sanpham']; ?></td>
                                    <td><?php echo $_SESSION['phieunhap'][$id]['tenncc']; ?></td>
                                    <td><?php echo $_SESSION['phieunhap'][$id]['soluong']; ?></td>
                                    <td><a class="btn btn-danger" href="index.php?id=quanlynhaphang&action=thempn&xoa=<?php echo $id ?>">Xóa</a></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-6-mg" style="margin-top: 10px;">
            <a class="btn btn-primary" href="index.php?id=quanlynhaphang">Trở lại</a>
            <a href="xuli-nhaphang.php?hoantatphieunhap&idphieunhap=<?php echo $new_id; ?>" class="btn btn-warning">Hoàn tất nhập hàng</a>
        </div>
    <?php }
