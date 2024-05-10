

<div class="col-10">
    <div class="bg-white py-5">
            <div class="arrow-steps clearfix">
                <div class="step done "> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
                <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
                <div class="step current"> <span><a href="index.php?quanly=thontinthanhtoan" >Thanh toán</a><span> </div>
            </div>
    </div>
    <form action="pages/main/xulythanhtoan.php" method="POST">
        <div class="row">
            <h4>Thong tin van chuyen va gio hang</h4>
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
                <div class="col-10">
                    <ul>
                        <li>Họ và tên vận chuyển: <?php echo $name ?></li>
                        <li>Số điện thoại: <?php echo $phone ?></li>
                        <li>Địa chỉ: <?php echo $address ?></li>
                        <li>Ghi chú: <?php echo $note ?></li>
                    </ul>
                    <h4>Giỏ hàng của bạn</h4>
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
                                <td colspan="6" >
                                <h1 class="text-xl">Tổng tiền: <span><?php echo number_format($tongtien,0,',','.').' vnd' ?> </span> </h1>
                                    
                                </td>
                                <?php
                                    if(isset($_SESSION['dangky'])){
                                ?>
                                <td colspan="1"> 
                                    <!-- <a href="pages/main/thanhtoan.php" class="btn btn-primary">Hình thức vận chuyển <i class="fa-solid fa-money-check"></i></a> -->
                                    <a href="pages/main/thanhtoan.php" class="btn btn-primary">Thanh toán <i class="fa-solid fa-money-check"></i></a>
                                </td>
                                <?php
                                    }else{
                                ?>
                                    <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                                <?php
                                    }
                                ?>
                                <td colspan="1"> 
                                    
                                </td>
                            </tr>
                        <?php

                        }else{
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
                <div class="col-2">
                    <h4>Phương thức thanh toán</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"    name="exampleRadios"               
                        id="exampleRadios1" value="tienmat" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Tiền mặt
                        </label>
                    </div> 
                </div>  
            
        </div>
    </form>
   
</div>