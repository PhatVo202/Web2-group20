<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
     $sql_product = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE  tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
     $query_product = mysqli_query($mysqli,$sql_product);

?>

<div class="col-9">
                    <h3>Từ khoá tìm kiếm: <?php echo $_POST['tukhoa'] ?></h3>
                    <div class="row">
                    <?php
                      while($row = mysqli_fetch_array($query_product)){

                    ?>
                        <div class="col-4">
                          <a class="text-decoration-none" href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <div class="card text-left">
                              <img class="card-img-top" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" alt="" width="269" height="269" >
                              <div class="card-body">
                                <h4 class="card-title text-center"><?php echo $row['tensanpham']?></h4>
                                <p class="card-text text-center">Giá: <?php echo number_format($row['giasp'],0,',','.').'vnd'?></p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <?php
                      }
                        ?>
                    </div>
                    
                </div>