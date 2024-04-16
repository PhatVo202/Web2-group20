<?php
    if(isset($_GET['trang'])){
      $page = $_GET['trang'];
    }else{
      $page = "";
    }
    if($page=="" ||$page ==1){
      $begin = 0;
    }else{
      $begin = ($page*3)-3;
    }
     $sql_product = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE  tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,3";
     $query_product = mysqli_query($mysqli,$sql_product);
?>

<div class="col-9">
                    <h3>Sản phẩm mới nhất</h3>
      
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
                        <?php
                          $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
                          $row_count = mysqli_num_rows($sql_trang);
                          $trang = ceil($row_count/3);
                        ?> 
                      <nav aria-label="Page navigation example ">
                          <ul class="pagination d-flex justify-content-center">
                          <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <?php
                            for($i = 1;$i<=$trang;$i++){
                            ?>
                            <li class="page-item"><a class="page-link" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php
                            }
                            ?>
                          <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                      </nav>                
</div>


<!-- <ul class="pagination d-flex justify-content-center">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul> -->