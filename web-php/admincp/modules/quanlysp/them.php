
    <form class="form-group mt-5" method="POST" action="modules/quanlysp/xuly.php"  enctype="multipart/form-data">
    <h4 class="text-center text-danger">Thêm sản phẩm</h4>
        <div class="row">
            <label for="" class="col-5 font-weight-bold">Tên sản phẩm:</label>
            <input type="text"
            class="form-control col-7" name="tensanpham"  placeholder="">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Mã sản phẩm:</label>
            <input type="text"
            class="form-control col-7" name="masp" placeholder="">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Giá sản phẩm:</label>
            <input type="text"
            class="form-control col-7" name="giasp" placeholder="">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Hình ảnh:</label>
            <input type="file"
            class="form-control col-7" name="hinhanh" >
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Số lượng:</label>
            <input type="text"
            class="form-control col-7" name="soluong" placeholder="">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Tóm tắt:</label>
            <textarea name="tomtat" class="form-control col-7 cols="70" rows="10"></textarea>
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Nội dung:</label>
            <textarea name="noidung" class="form-control col-7 cols="70" rows="10"></textarea>
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Danh mục sản phẩm</label>
            <select class="col-7 form-control" name="danhmuc" >
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                }
                ?>
        
            </select>
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Tình trạng:</label>
            <select class="col-7 form-control" name="tinhtrang" >
                <option value="1">Kích hoạt</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <div class="text-right mt-3">
            <input class="btn btn-primary" type="submit" name="themsanpham" value="Thêm sản phẩm"/>
        </div>
    </form>


