<?php
     $sql_product = "SELECT * FROM tbl_sanpham WHERE  tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC";
     $query_product = mysqli_query($mysqli,$sql_product);

     $sql_category = "SELECT * FROM tbl_danhmuc WHERE  tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
     $query_category = mysqli_query($mysqli,$sql_category);
     $row_title = mysqli_fetch_array($query_category)
?>

<div class="col-9">
                    <h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc']?></h3>
                    <div class="row">
                      <?php
                      while($row_product = mysqli_fetch_array($query_product)){
                      ?>
                        <div class="col-4"> 
                          <a class='text-decoration-none ' href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                            <div class="card text-left ">
                              <img class="card-img-top" src="admincp/modules/quanlysp/uploads/<?php echo$row_product['hinhanh']?>" alt="">
                              <div class="card-body">
                                <h4 class="card-title text-center"><?php echo$row_product['tensanpham']?></h4>
                                <p class="card-text text-center">Giá: <?php echo number_format($row_product['giasp'],0,',','.').'vnd'?></p>
                              </div>
                            </div>
                          </a>
                           
                        </div>
                        <?php
                      }
                        ?>
                    </div>
</div>
