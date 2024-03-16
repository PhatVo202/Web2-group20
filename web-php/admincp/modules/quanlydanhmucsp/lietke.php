
<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbL_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp =  mysqli_query($mysqli,  $sql_lietke_danhmucsp);
?>


<h4 class="text-center text-danger">Liệt kê danh mục sản phẩm</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>

        <?php
    $i = 0;
    while($row = mysqli_fetch_array( $query_lietke_danhmucsp)){
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td>
                <a class="btn btn-success" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
                <a class="btn btn-danger" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xoá</a>
            </td>
        </tr>
    
    <?php
    }
    ?>
           
        </tbody>
    </table>



