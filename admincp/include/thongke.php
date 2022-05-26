<?php
include "./config/config.php";
if (isset($_GET['datefrom'])) {
    $datefrom = $_GET['datefrom'];
} else
    $datefrom = '2020-01-01';
if (isset($_GET['dateto']))
    $dateto = $_GET['dateto'];
else
    $dateto = '2022-12-31';
if (isset($_GET['type']))
    $type = $_GET['type'];
else
    $type = 'bar';
$types = array("bar" => "Bar", "pie" => "Pie", "line" => "Line", "doughnut" => "Doughnut");

$sql = "SELECT tbl_sanpham.ten_sanpham, tbl_chitiethoadon.id_sanpham, SUM(tbl_chitiethoadon.soluongsp) as 'so luong sp', SUM(tbl_chitiethoadon.id_sanpham * tbl_sanpham.gia) as 'tong tien' FROM tbl_chitiethoadon, tbl_hoadon, tbl_sanpham WHERE tbl_sanpham.id_sanpham = tbl_chitiethoadon.id_sanpham and tbl_hoadon.id_hoadon = tbl_chitiethoadon.id_hoadon and tbl_hoadon.date BETWEEN '" . $datefrom . "' and '" . $dateto . "' GROUP BY tbl_chitiethoadon.id_sanpham";
$query = mysqli_query($con, $sql);
foreach ($query as $row) {
    $tensanpham[] = $row["ten_sanpham"];
    $labeldoanhthu[] = $row["id_sanpham"];
    $datadoanhthu[] = $row["tong tien"];
    $datadoanhthuf[]=number_format($row["tong tien"]);
}
?>
<script>
    var type = <?php echo json_encode($type); ?>;
    var labelsanpham = <?php echo json_encode($tensanpham); ?>;
    var labeldoanhthu = <?php echo json_encode($labeldoanhthu); ?>;
    var datadoanhthu = <?php echo json_encode($datadoanhthu); ?>;
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <div class="col">

            <div class="row" style="margin-top: 10px;">
                <div class="col-12">
                    <form action="index.php" class="form" method="GET">
                        <input type="input" hidden="true" class="form-control" name="id" value="thongke">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="datefrom">Ngày bắt đầu</label>
                                    <input type="date" class="form-control" name="datefrom" value=<?php echo $datefrom; ?>>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="dateto">Ngày kết thúc</label>
                                    <input type="date" class="form-control" name="dateto" value=<?php echo $dateto; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-8 card shadow mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh thu từ <?php echo $datefrom ?> đến <?php echo $dateto ?></h6>
                    </div>
                    <div class="card-body">
                        <canvas id="doanhthu"></canvas>
                    </div>
                </div>
            </div>





        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Aishop 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>