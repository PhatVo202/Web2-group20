<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['matkhau']);
        $diachi = $_POST['diachi'];
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,dienthoai,matkhau,diachi) VALUE('".$tenkhachhang."','".$email."','".$dienthoai."','".$matkhau."','".$diachi."')");

        if($sql_dangky){
            echo '<p class="text-success">Đăng ký thành công</p>';
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            header("Location:index.php?quanly=giohang");
        }
    }
?>
<div class="col-9 mt-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <form class="form-group" action="" method="POST">
            <h3 class="text-center">Register</h3>
            <div class="row">
                <div class="col-5">
                    <label>Họ tên: </label>
                </div>
                <div class="col-7">
                    <input type="text" name="hovaten"  class="form-control" placeholder="">
                </div>
                <div class="col-5 mt-2">
                    <label>Email: </label>
                </div>
                <div class="col-7 mt-2">
                    <input type="text" name="email" class="form-control" placeholder="" a>
                </div>
                <div class="col-5 mt-2">
                    <label>Điện thoại: </label>
                </div>
                <div class="col-7 mt-2">
                    <input type="text" name="dienthoai"  class="form-control" placeholder="">
                </div>
                <div class="col-5 mt-2">
                    <label>Địa chỉ: </label>
                </div>
                <div class="col-7 mt-2">
                    <input type="text" name="diachi"  class="form-control" placeholder="" >
                </div>
                <div class="col-5 mt-2">
                    <label>Mật khẩu: </label>
                </div>
                <div class="col-7 mt-2">
                    <input type="password" name="matkhau"  class="form-control" placeholder="">
                </div>
                
            </div>
            <div class="text-right mt-4">
                <input name="dangky" type="submit" class="btn btn-success text-center py-2 px-5" value="Đăng ký">
            </div>
            <div class="text-center">
                <a  href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản?</a>
            </div>
        </form>
    </div>   
</div>