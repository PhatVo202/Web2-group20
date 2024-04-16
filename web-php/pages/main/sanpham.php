<div class="col-9">
    <h3>Chi tiết sản phẩm</h3>
    <div class="row">
        <?php
            $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
            $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
            while($row_chitiet = mysqli_fetch_array($query_chitiet)){
        ?>

        <div class="col-6">
            <img class="card-img-top" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" alt="" >
        </div>

        <div class="col-6">
            <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
                <h4>Tên sản phẩm: <span class="text-secondary"><?php echo $row_chitiet['tensanpham']?></span></h4>
                <p>Mã sản phẩm: <span class="text-secondary"><?php echo $row_chitiet['masp']?></span></p>
                <p>Giá sản phẩm:  <span class="text-secondary"><?php echo number_format($row_chitiet['giasp'],0,',','.').' vnd'?></span></p>
                <p>Số lượng sản phẩm:<span class="text-secondary"><?php echo $row_chitiet['soluong']?></span></p>
                <p>Danh mục sản phẩm: <span class="text-secondary"><?php echo $row_chitiet['tendanhmuc']?></span></p>
                <input type="submit" name="themgiohang" class="btn btn-primary themgiohang" value="Thêm giỏ hàng"/>
            </form>
        </div>

        <?php
            }
        ?>
    </div>
</div>