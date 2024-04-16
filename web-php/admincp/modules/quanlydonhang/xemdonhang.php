<p>Xem don hang</p>
<?php
    $code =$_GET['code'];
    $sql_lietke_donhang = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham= tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_donhang =  mysqli_query($mysqli,  $sql_lietke_donhang);
?>
<h4 class="text-center text-danger">Liệt kê danh mục sản phẩm</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                
            </tr>
        </thead>
        <tbody>

        <?php
    $i = 0;
    $tongtien=0;
    while($row = mysqli_fetch_array( $query_lietke_donhang)){
        $i++;
        $tongtien+= $row['giasp']*$row['soluongmua'];
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['soluongmua'] ?></td>
            <td><?php echo number_format($row['giasp'],0,',','.') ?></td>
            <td><?php echo number_format($row['giasp']*$row['soluongmua'],0,',','.').' vnd'  ?></td>
            
        </tr>
    
    <?php
    }
    ?>
        <tr>
            <td colspan="4">
                <p>Tổng tiền: <?php echo number_format($tongtien,0,',','.').' vnd' ?></p>                
            </td>
           
        </tr>
           
        </tbody>
    </table>



