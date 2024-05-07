<?php
  if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
    unset($_SESSION['dangnhap']);
    header("Location:login.php");
  }
?>
<div class="col-12 bg-secondary py-2">

  <div class="text-right d-flex justify-content-end align-items-center">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXPodEp1Zyixlyx1Rrq6JJlPm0hgg1pFeLNrxgt2bkYw&s" alt="" width="40" height="40" class="rounded-circle">
    <a class="text-white text-decoration-none" class="nav-item nav-link " href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];
      } ?></a>
  </div>
</div>
