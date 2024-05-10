<div class="col-10">
    <div class="bg-white py-5">
            <div class="arrow-steps clearfix my-2">
                <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
                <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
                <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
            </div>
            <h4>Thông tin vận chuyển</h4>
            <?php
                if(isset($_POST['themvanchuyen'])){
                    $name= $_POST['name'];
                    $phone= $_POST['phone'];
                    $address= $_POST['address'];
                    $note= $_POST['note'];
                    $id_dangky = $_SESSION['id_khachhang'];
                    $sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
                    if( $sql_them_vanchuyen){
                        echo '<script>alert("Thêm vận chuyển thành công")</script>';
                    }
                }else if(isset($_POST['capnhatvanchuyen'])){
                    $name= $_POST['name'];
                    $phone= $_POST['phone'];
                    $address= $_POST['address'];
                    $note= $_POST['note'];
                    $id_dangky = $_SESSION['id_khachhang'];
                    $sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky=' $id_dangky' WHERE id_dangky='$id_dangky'");
                    if($sql_update_vanchuyen){
                        echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
                    }
                }
            ?>
            <?php
                $name= $_POST['name'];
                $phone= $_POST['phone'];
                $address= $_POST['address'];
                $note= $_POST['note'];
                $id_dangky = $_SESSION['id_khachhang'];
                $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
                $count = mysqli_num_rows($sql_get_vanchuyen);
                if($count>0){
                    $row_get_vanchuyen=mysqli_fetch_array($sql_get_vanchuyen);
                    $name= $row_get_vanchuyen['name'];
                    $phone= $row_get_vanchuyen['phone'];
                    $address= $row_get_vanchuyen['address'];
                    $note= $row_get_vanchuyen['note'];
                }else{
                    $name= '';
                    $phone= '';
                    $address= '';
                    $note= '';
                }
            ?>
            <form action="" method="POST" class="mb-2">
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" name="name" class="form-control" placeholder="..." value="<?php echo $name ?>" >
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="..." value="<?php echo $phone ?>" >
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="..." value="<?php echo $address ?>" >
                </div>
                <div class="form-group">
                    <label for="">Ghi chú</label>
                    <input class="form-control" name="note" value="<?php echo $note ?>" ></input>
                </div>
                <?php
                    if($name ==""&& $phone==""){
                ?>
                <button type="submit" name="themvanchuyen" class="btn btn-primary text-right">Thêm vận chuyển</button>
                <?php
                    }else if($name !=""&& $phone!=""){
                ?>
                 <button type="submit" name="capnhatvanchuyen" class="btn btn-success text-right">Cập nhật vận chuyển</button>
                <?php
                    }
                ?>
            </form>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_SESSION['cart'])){
                        $i = 0;
                        $tongtien=0;
                        foreach($_SESSION['cart'] as $cart_item){
                            $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
                            $tongtien += $thanhtien;
                            $i++
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $cart_item['masp'] ?></td>
                        <td><?php echo $cart_item['tensanpham'] ?></td>
                        <td><img width="60" height="70" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" alt=""></td>
                        <td class="text-center">
                            <a href="pages/main/themgiohang.php?giam=<?php echo $cart_item['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-minus"></i></a>
                            <?php echo $cart_item['soluong'] ?>
                            <a href="pages/main/themgiohang.php?tang=<?php echo $cart_item['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                        </td>
                        <td><?php echo number_format($cart_item['giasp'],0,',','.') ?></td>
                        <td><?php echo number_format($thanhtien,0,',','.') ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                        <tr>
                            <td colspan="7" >
                            <h1 class="text-xl">Tổng tiền: <span><?php echo number_format($tongtien,0,',','.').' vnd' ?> </span> </h1>
                                
                            </td>
                            <?php
                                if(isset($_SESSION['dangky'])){
                            ?>
                            <td colspan="1"> 
                                <a href="index.php?quanly=thongtinthanhtoan" class="btn btn-primary">Hình thức thanh toán </a>
                            </td>
                            <?php
                                }else{
                            ?>
                                <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                    ?>
                    <tr>
                        <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </div>
</div>