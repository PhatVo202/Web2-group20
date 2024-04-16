
<div class="col-9 mt-5">
<?php
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $matkhau_cu = md5($_POST['matkhau_cu']);
        $matkhau_moi = md5($_POST['matkhau_moi']);
        $sql = "SELECT * FROM tbl_dangky WHERE email = '".$taikhoan."' AND matkhau = '".$matkhau_cu."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
     
        if($count>0){
            $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' ");
            echo '<p class="text-success">Mật khẩu đã được thay đổi</p>';
        }else{
            echo '<p class="text-danger">Tài khoản hoặc Password cũ bị sai! Vui lòng nhập lại</p>';
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
                    <label>Mật khẩu cũ: </label>
                </div>
                <div class="col-7 mt-2">
                    <input type="password" name="matkhau_cu"  class="form-control" placeholder="Password cũ...">
                </div>
                <div class="col-5 mt-2">
                    <label>Mật khẩu mới: </label>
                </div>
                <div class="col-7 mt-2">
                    <input type="password" name="matkhau_moi"  class="form-control" placeholder="Password mới...">
                </div>
                
            </div>
            <div class="text-right mt-4">
                <input name="doimatkhau" type="submit" class="btn btn-primary text-center py-2 px-5" value="Đổi mật khẩu">
            </div>
            <div class="text-center">
                <a  href="index.php?quanly=dangky">Đăng ký nếu chưa tài khoản?</a>
            </div>
        </form>
    </div>
</div>