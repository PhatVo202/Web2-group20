<?php
    $sql_sua_danhmucsp = "SELECT * FROM tbL_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp =  mysqli_query($mysqli,  $sql_sua_danhmucsp);
?>


<form class="form-group mt-5" method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
    <h4 class="text-center text-danger">Sửa danh mục sản phẩm</h4>
        <?php
        while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
        ?>
        <div class="row">
            <label for="" class="col-5">Tên danh mục:</label>
            <input type="text"
            class="form-control col-7" name="tendanhmuc" value="<?php echo $dong['tendanhmuc']?>">
        </div>
        <div class="row mt-3">
            <label for="" class="col-5">Thứ tự:</label>
            <input type="text"
            class="form-control col-7" name="thutu" 
            value="<?php echo $dong['thutu'] ?>" >
        </div>
        <?php
        }
        ?>
        <div class="text-right mt-3">
            <input class="btn btn-primary" type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"/>
        </div>
    </form>