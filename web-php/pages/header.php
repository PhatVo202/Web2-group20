<?php
  
     $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
     $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
?>

<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">
        <img class="rounded-circle" src="https://phuongnamvina.com/img_data/images/design-logo-ban-hang-online.jpg" alt="" width="100" height="100">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Trang chủ</a>
        </li>  
        <?php
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <li class="nav-item active"><a class="nav-link" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                <?php
                    }
                ?>  
        </ul>
        <form action="index.php?quanly=timkiem" method="POST" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm sản phẩm ..." name="tukhoa">
            <input type="submit" name="timkiem" value="🔎" class=" btn btn-outline-primary my-2 my-sm-0">
        <a class="mx-2" href="index.php?quanly=giohang">🛒</a>
        <?php
                    if(isset($_SESSION['dangky'])){
                ?>
            <div class="btn-group ">
                <button class="border-0" style="background-color: #e3f2fd;"  data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbAbRXrkIXcVV1Gafb0s7klcLrFRaKRrZ50dxPNvmUYg&s" alt="" width="50" height="50">
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    <a class="dropdown-item" href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a>
                    <a class="dropdown-item" href="index.php?dangxuat=1">Đăng xuất</a>
                </ul>
            </div>           
                <?php
                    }else{
                ?>
                <li><a class="btn btn-success" href="index.php?quanly=dangky">Đăng ký</a></li>
                <?php
                    }
                ?>
        </form>
    </div>
    </nav>    
</header>