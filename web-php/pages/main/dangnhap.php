
<div class="col-9 mt-5">
<?php
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
     
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];
            header("Location:index.php?quanly=giohang");
        }else{
            echo '<p class="text-danger">Email hoặc Password bị sai! Vui lòng nhập lại</p>';
        }
    }
?>
    <div class="shadow p-3 mb-5 bg-white rounded">
        <form class="form-group" action="" method="POST">
            <h3 class="text-center">Login</h3>
            <div class="row">
                <div class="col-5">
                    <label>Tài khoản: </label>
                </div>
                <div class="col-7">
                    <input type="text" name="email"  class="form-control" placeholder="Email...">
                </div>
                <div class="col-5 mt-2">
                    <label>Mật khẩu: </label>
                </div>
                <div class="col-7 mt-2">
                    <input type="password" name="password"  class="form-control" placeholder="Password...">
                </div>
                
            </div>
            <div class="text-right mt-4">
                <input name="dangnhap" type="submit" class="btn btn-primary text-center py-2 px-5" value="Đăng nhập">
            </div>
            <div class="text-center">
                <a  href="index.php?quanly=dangky">Đăng ký nếu chưa tài khoản?</a>
            </div>
        </form>
    </div>
</div>