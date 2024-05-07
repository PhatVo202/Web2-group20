
    <div class="col-10">
        <div class="bg-white rounded py-5">
            <p class="px-2">Giỏ hàng <i class="fa-solid fa-cart-shopping"></i></p>
                <?php
                    if(isset($_SESSION['dangky'])){
                        echo 'Xin chào: '.'<span class="text-danger">'.$_SESSION['dangky'].'</span>';
                    
                    }
                ?>
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
                        <td>
                            <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" class="btn btn-danger">Xoá <i class="fa-solid fa-trash"></i></a>
                        </td>
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
                                <a href="pages/main/thanhtoan.php" class="btn btn-primary">Đặt hàng <i class="fa-solid fa-money-check"></i></a>
                            </td>
                            <?php
                                }else{
                            ?>
                                <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                            <?php
                                }
                            ?>
                            <td colspan="1"> 
                                <a href="pages/main/themgiohang.php?xoatatca=1" class="btn btn-danger">Xoá tất cả <i class="fa-solid fa-trash"></i></a>
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
    </div>
    