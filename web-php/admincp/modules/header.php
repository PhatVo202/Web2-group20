<?php
  if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
    unset($_SESSION['dangnhap']);
    header("Location:login.php");
  }
?>
<p class="text-center">Header Admin</p>
<a class="nav-item nav-link " href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
    echo $_SESSION['dangnhap'];
  } ?></a>