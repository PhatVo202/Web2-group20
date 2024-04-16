<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp =  mysqli_query($mysqli,  $sql_sua_sp);
?>

<?php
    while($row = mysqli_fetch_array($query_sua_sp)){
?>

<form class="form-group mt-5" method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['idsanpham'] ?>"  enctype="multipart/form-data">
    <h4 class="text-center text-danger">Sửa sản phẩm</h4>
        <div class="row">
            <label for="" class="col-5 font-weight-bold">Tên sản phẩm:</label>
            <input type="text"
            class="form-control col-7" name="tensanpham"  value="<?php echo $row['tensanpham'] ?>">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Mã sản phẩm:</label>
            <input type="text"
            class="form-control col-7" name="masp" value="<?php echo $row['masp'] ?>">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Giá sản phẩm:</label>
            <input type="text"
            class="form-control col-7" name="giasp" value="<?php echo $row['giasp'] ?>">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Hình ảnh:</label>
            <div>
            <input type="file"
            class="form-control col-7" name="hinhanh" >
            <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
            </div>
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Số lượng:</label>
            <input type="text"
            class="form-control col-7" name="soluong" value="<?php echo $row['soluong'] ?>">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Tóm tắt:</label>
            <textarea name="tomtat" class="form-control col-7 cols="70"  rows="10"><?php echo $row['tomtat'] ?></textarea>
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Nội dung:</label>
            <textarea name="noidung" class="form-control col-7 cols="70" rows="10"><?php echo $row['noidung'] ?></textarea>
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Danh mục sản phẩm</label>
            <select class="col-7 form-control" name="danhmuc" >
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
                ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                    }else{
                ?>
                  <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                    }
                }
                ?>
        
            </select>
        </div>
        <div class="row mt-3">
            <label for="" class="col-5 font-weight-bold">Tình trạng:</label>
            <select class="col-7 form-control" name="tinhtrang" >
                <?php 
                    if($row['tinhtrang']==1){
                ?>
                <option value="1" selected>Kích hoạt</option>
                <option value="0">Ẩn</option>
                <?php
                    }else{
                        ?>
                        <option value="1">Kích hoạt</option>
                        <option value="0" selected>Ẩn</option>
                        <?php
                    }
                 ?>
            </select>
        </div>
        <div class="text-right mt-3">
            <input class="btn btn-primary" type="submit" name="suasanpham" value="Sửa sản phẩm"/>
        </div>
    </form>

    <?php
    }
    ?>
